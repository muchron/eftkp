<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use App\Models\Setting;
use App\Traits\Track;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResepObatController extends Controller
{
    use Track;
    function index()
    {
        return view('content.farmasi.resep.resepObat');
    }
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
            $resepObat = ResepObat::where(['no_resep' => $request->no_resep])->with([
                'resepDokter.obat' => function ($q) {
                    return $q->with(['satuan', 'mappingObat']);
                },
                'resepRacikan.detail.obat.satuan',
                'resepRacikan.metode',
            ])->first();
        } else if ($request->no_rawat) {
            $resepObat = ResepObat::where(['no_rawat' => $request->no_rawat])->with('resepDokter.obat.satuan', 'resepRacikan.detail.obat.satuan', 'resepRacikan.metode')->get();
        } else  if ($request->tgl_awal && $request->tgl_akhir) {
            $resepObat = ResepObat::whereBetween('tgl_peresepan', [$request->tgl_awal, $request->tgl_akhir])
                ->with(['regPeriksa' => function ($q) {
                    return $q->with(['pasien', 'poliklinik', 'dokter']);
                }, 'dokter'])
                ->get();
        } else {
            $resepObat = ResepObat::where('tgl_peresepan', date('Y-m-d'))->with(['regPeriksa' => function ($q) {
                return $q->with(['pasien', 'poliklinik', 'dokter']);
            }, 'dokter'])->get();
        }
        if ($request->dataTable) {
            return DataTables::of($resepObat)->make(true);
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
        try {
            $resep = ResepObat::where('no_resep', $no_resep)->orWhere('no_rawat', $no_rawat)->delete();
            if ($resep) {
                $this->deleteSql(new ResepObat(), ['no_resep' => $no_resep, 'no_rawat' => $no_rawat]);
                return response()->json($resep);
            }
            return response()->json('Gagal', 500);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
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
    function setPenyerahan(Request $request)
    {
        $data = [
            'tgl_penyerahan' => date('Y-m-d'),
            'jam_penyerahan' => date('H:i:s'),
        ];
        try {
            $resep = ResepObat::where('no_resep', $request->no_resep)->update($data);
            if ($resep) {
                $this->updateSql(new ResepObat(), $data, ['no_resep' => $request->no_resep]);
            }
            return response()->json('SUKSES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
