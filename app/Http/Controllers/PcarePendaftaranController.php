<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PcarePendaftaran;
use Yajra\DataTables\DataTables;

class PcarePendaftaranController extends Controller
{
    function index()
    {
        return view('content.pcare.pendaftaran');
    }
    function get(Request $request)
    {
        if ($request->tgl_awal || $request->tgl_akhir) {
            $pcare = PcarePendaftaran::with('pasien')->whereBetween('tglDaftar', [$request->tgl_awal, $request->tgl_akhir])->get();
        } else {
            $pcare = PcarePendaftaran::with('pasien')->where('tglDaftar', date('Y-m-d'))->get();
        }
        if ($request->datatable) {
            return DataTables::of($pcare)->make(true);
        } else {
            return response()->json($pcare);
        }
    }
}
