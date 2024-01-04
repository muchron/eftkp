<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{

    function create(Request $request)
    {
        $resepObat = ResepObat::where(['no_rawat' => $request->no_rawat, 'tgl_peresepan' => date('Y-m-d')])->first();
        $data = [
            'no_rawat' => $request->no_rawat,
            'status' => $request->status,
            'kd_dokter' => $request->kd_dokter,
            'tgl_peresepan' => date('Y-m-d'),
            'jam_peresepan' => date('H:i:s'),
            'tgl_perawatan' => '0000-00-00',
            'jam' => '00:00:00',
            'tgl_penyerahan' => '0000-00-00',
            'jam_penyerahan' => '00:00:00',
            'no_resep' => $resepObat ? $resepObat->no_resep : $this->getNomorResep(),
        ];

        // return $data;
        try {
            $resep = ResepObat::create($data);
            return response()->json($resep);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function get(Request $request)
    {

        if ($request->no_resep) {
            $resepObat = ResepObat::where(['no_resep' => $request->no_resep])->with(
                'resepDokter.obat.satuan',
                'resepRacikan.detail.obat.satuan',
                'resepRacikan.metode'
            )->first();
        } else {
            $resepObat = ResepObat::where(['no_rawat' => $request->no_rawat])->with('resepDokter.obat.satuan', 'resepRacikan.detail.obat.satuan', 'resepRacikan.metode')->get();
        }
        return response()->json($resepObat);
    }
    function getNomorResep(): int
    {
        $resep = ResepObat::select('no_resep')
            ->orderBy('no_resep', 'DESC')
            ->where('tgl_peresepan', date('Y-m-d'))
            ->first();

        if ($resep) {
            $no_resep = $resep->no_resep + 1;
        } else {
            $no_resep = date('Ymd') . '0001';
        }
        return $no_resep;
    }
    function delete(Request $request)
    {
        $no_resep = $request->no_resep;
        $no_rawat = $request->no_rawat;
        if ($no_resep) {
            $resep = ResepObat::where('no_resep', $no_resep)->delete();
        } else {
            $resep = ResepObat::where('no_rawat', $no_rawat)->delete();
        }
        return response()->json($resep);
    }
    function print(Request $request)
    {
        $data = $this->get($request);
        $resepObat = ResepObat::where(['no_rawat' => $request->no_rawat])->with(['regPeriksa.pasien' => function ($query) {
            return $query->with(['kel', 'kec', 'kab', 'prop']);
        }, 'resepDokter.obat', 'resepRacikan.detail.obat.satuan', 'dokter'])->first();
        $setting = Setting::first();
        $pdf = PDF::loadView('content.print.resep', ['data' => $resepObat, 'setting' => $setting])
            ->setPaper(array(0, 0, 283, 567.00))
            ->setOptions(['defaultFont' => 'serif', 'isRemoteEnabled' => true]);
        return $pdf->stream('cetak resep.pdf');
    }
}
