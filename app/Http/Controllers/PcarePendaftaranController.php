<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PcarePendaftaran;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Yajra\DataTables\DataTables;

class PcarePendaftaranController extends Controller
{
    use Track;
    function index()
    {
        return view('content.pcare.pendaftaran');
    }
    function get(Request $request)
    {
        if ($request->tgl_awal || $request->tgl_akhir) {
            $pcare = PcarePendaftaran::with(['pasien', 'regPeriksa', 'kunjungan'])->whereBetween('tglDaftar', [$request->tgl_awal, $request->tgl_akhir])->get();
        } else {
            $pcare = PcarePendaftaran::with(['pasien', 'regPeriksa', 'kunjungan'])->where('tglDaftar', date('Y-m-d'))->get();
        }
        if ($request->datatable) {
            return DataTables::of($pcare)->make(true);
        } else {
            return response()->json($pcare);
        }
    }
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'tglDaftar' => date('Y-m-d', strtotime($request->tgl_registrasi)),
            'no_rkm_medis' => $request->no_rkm_medis,
            'nm_pasien' => $request->nm_pasien,
            'kdProviderPeserta' => $request->nm_pasien,
            'noKartu' => $request->no_peserta,
            'kdPoli' => $request->kd_poli_pcare,
            'nmPoli' => $request->nm_poli_pcare,
            'keluhan' => $request->keluhan,
            'kunjSakit' => $request->kunjunganSakit,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'beratBadan' => $request->berat,
            'tinggiBadan' => $request->tinggi,
            'respRate' => $request->respirasi,
            'lingkar_perut' => $request->lingkar_perut,
            'heartRate' => $request->nadi,
            'rujukBalik' => 0,
            'kdTkp' => "{$request->kdTkp} {$request->tkp}",
            'noUrut' => $request->noUrut,
            'status' => $request->status,
        ];
        try {
            $pcare = PcarePendaftaran::create($data);
            if ($pcare) {
                $this->insertSql(new PcarePendaftaran(), $data);
            }
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
    function delete(Request $request)
    {
        $key = ['no_rawat' => $request->no_rawat];
        $pendaftaran = PcarePendaftaran::where($key);

        if ($pendaftaran->first()) {
            try {
                $delete = $pendaftaran->delete();
                if ($delete) {
                    $this->deleteSql(new PcarePendaftaran(), $key);
                }
                return response()->json('SUKSES', 200);
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
        }
    }
}
