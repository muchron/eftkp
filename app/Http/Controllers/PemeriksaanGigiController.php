<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\PemeriksaanGigi;
use App\Models\RegPeriksa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isEmpty;

class PemeriksaanGigiController extends Controller
{
    function get(Request $request)
    {
        $gigi = PemeriksaanGigi::where('no_rawat', $request->no_rawat)
            ->with('dokter', 'regPeriksa.pasien', 'hasil')
            ->first();

        if ($request->dataTable) {
            return DataTables::of($gigi)->make(true);
        }
        return response()->json($gigi);
    }
    function getRiwayat(Request $request)
    {
        $riwayat = RegPeriksa::where('no_rkm_medis', $request->no_rkm_medis)
            ->with(['gigi' => function ($q) {
                return $q->with(['hasil' => function ($q) {
                    return $q->with('diagnosa', 'tindakan');
                }, 'dokter']);
            }, 'pasien'])
            ->whereHas('gigi')
            ->get();

        if ($request->dataTable) {
            return DataTables::of($riwayat)->make(true);
        }
        return response()->json($riwayat);
    }
}
