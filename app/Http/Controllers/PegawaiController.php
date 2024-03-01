<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    function get(Request $request)
    {
        $pegawai = Pegawai::where('nama', 'like', "%{$request->pegawai}%")
            ->limit(10)
            ->get();
        return response()->json($pegawai);
    }
}
