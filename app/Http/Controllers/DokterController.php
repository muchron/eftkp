<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    function get(Request $request)
    {
        if ($request->kd_dokter) {
            $dokter = Dokter::where('kd_dokter', $request->kd_dokter)->first();
        } else if ($request->dokter) {
            $dokter = Dokter::where('nm_dokter', 'like', "%{$request->dokter}%")->get();
        } else {
            $dokter = Dokter::all();
        }
        return response()->json($dokter);
    }
}
