<?php

namespace App\Http\Controllers;

use App\Models\MapingDokterPcare;
use Illuminate\Http\Request;

class MapingDokterController extends Controller
{
    function get(Request $request)
    {
        $dokter = MapingDokterPcare::where('kd_dokter_pcare', $request->kdDokterPcare)->with('dokter')->first();
        return response()->json($dokter);
    }
}
