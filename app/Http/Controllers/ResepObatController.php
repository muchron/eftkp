<?php

namespace App\Http\Controllers;

use App\Action\GenerateNoResep;
use App\Models\ResepObat;
use App\Models\Setting;
use App\Traits\Track;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResepObatController extends Controller
{
    use Track;

    public function index()
    {
        return view('content.farmasi.resep.resepObat');
    }

    public function create(Request $request)
    {
        $resepObat = ResepObat::where(['no_rawat' => $request->no_rawat, 'tgl_peresepan' => date('Y-m-d')])->first();
        $generateNoResep = new GenerateNoResep();
        $no_resep = $resepObat ? $resepObat->no_resep : $generateNoResep->__invoke(new ResepObat());

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
            'no_resep' => $resepObat ? $resepObat->no_resep : $no_resep,
        ];

        try {
            $resep = ResepObat::create($data);
            if ($resep) {
                $this->insertSql(new ResepObat(), $data);
            }
            return response()->json($resep, 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    public function get(Request $request)
    {
        $resepObat = new ResepObat();
        if ($request->no_resep) {
            $resepObat = $resepObat->byNoResep($request->no_resep)->first();
        } else if ($request->no_rawat) {
            $resepObat = $resepObat->byNoRawat($request->no_rawat)->get();
        } else if ($request->tgl_awal && $request->tgl_akhir) {
            $resepObat = ResepObat::whereBetween('tgl_peresepan', [
                date('Y-m-d', strtotime($request->tgl_awal)),
                date('Y-m-d', strtotime($request->tgl_akhir)),
            ])->get();
        } else {
            $resepObat = ResepObat::where('tgl_peresepan', now())->get();
        }

        if ($request->dataTable) {
            return DataTables::of($resepObat)->make(true);
        }
        return response()->json($resepObat);
    }

    public function delete(Request $request)
    {
        $no_resep = $request->no_resep;
        $no_rawat = $request->no_rawat;
        try {
            $deleted = ResepObat::where(function ($query) use ($no_resep, $no_rawat) {
                if ($no_resep) {
                    $query->where('no_resep', $no_resep);
                }
                if ($no_rawat) {
                    $query->where('no_rawat', $no_rawat);
                }
            })->delete();

            if ($deleted) {
                $this->deleteSql(new ResepObat(), ['no_resep' => $no_resep, 'no_rawat' => $no_rawat]);
                return response()->json('Berhasil');
            } else {
                return response()->json('Tidak ada resep yang dihapus', 201);
            }
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }

    }

    public function print(Request $request)
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

    public function setPenyerahan(Request $request)
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
