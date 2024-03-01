<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaanRanap;
use Yajra\DataTables\DataTables;

class PemeriksaanRanapController extends Controller
{
    public function __construct()
    {
    }

    function get(Request $request)
    {
        $pemeriksaanRanap = PemeriksaanRanap::with(['regPeriksa' => function ($q) {
            return $q->with('pasien');
        }, 'pegawai'])->where('no_rawat', $request->no_rawat);

        if ($request->tgl_perawatan || $request->jam_rawat) {
            $pemeriksaanRanap = $pemeriksaanRanap
                ->where('tgl_perawatan',  $request->tgl_perawatan)
                ->where('jam_rawat', $request->jam_rawat)
                ->first();
        } else {
            $pemeriksaanRanap = $pemeriksaanRanap->get();
            if ($request->datatable) {
                return DataTables::of($pemeriksaanRanap)->make(true);
            }
        }
        return response()->json($pemeriksaanRanap);
    }
}
