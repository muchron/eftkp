<?php

namespace App\Http\Controllers;

use App\Models\RujukInternal;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use Yajra\DataTables\DataTables;

class RujukInternalController extends Controller
{
    use Track;
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'kd_dokter' => $request->kd_dokter,
            'kd_poli' => $request->kd_poli,
        ];
        try {
            $rujuk = RujukInternal::create($data);
            if ($rujuk) {
                $this->insertSql(new RujukInternal(), $data);
            }
            return response()->json('SUKSES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo);
        }
    }
    function get(Request $request)
    {
        $rujuk = RujukInternal::with(['regPeriksa.pasien', 'dokter', 'poliklinik', 'pemeriksaan']);
        if ($request->tglAwal || $request->tglAkhir) {
            $get = $rujuk->whereHas('regPeriksa', function ($query) use ($request) {
                return $query->whereBetween('tgl_registrasi', [$request->tglAwal, $request->tglAkhir]);
            })->get();
        } else {
            $get = $rujuk->whereHas('regPeriksa', function ($query) use ($request) {
                return $query->where('tgl_registrasi', date('Y-m-d'));
            })->get();
        }
        if ($request->dataTable) {
            return DataTables::of($get)->make(true);
        }
        return response()->json($get);
    }
    function show(Request $request)
    {
        $rujuk = RujukInternal::where('no_rawat', $request->no_rawat)
            ->with(['poliklinik', 'pemeriksaan', 'dokter', 'regPeriksa' => function ($query) {
                return $query->with(['pasien.alergi', 'penjab', 'pemeriksaanDokter']);
            }])->first();
        return response()->json($rujuk);
    }
    function delete(Request $request)
    {
        try {
            $delete = RujukInternal::where('no_rawat', $request->no_rawat)->delete();
            if ($delete) {
                $this->deleteSql(new RujukInternal(), ['no_rawat' => $request->no_rawat]);
            }
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo);
        }
    }
}
