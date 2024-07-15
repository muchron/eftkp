<?php

namespace App\Http\Controllers;

use App\Models\MapingDokterPcare;
use Illuminate\Http\Request;

class MapingDokterController extends Controller
{
    function get(Request $request)
    {
        $dokter = new MapingDokterPcare();
        if ($request->dokter) {
            $dokter = $dokter->where('nm_dokter_pcare', 'like', "%{$request->dokter}%")->get();
        } else if ($request->kdDokterPcare) {
            $dokter = $dokter->where('kd_dokter_pcare', $request->kdDokterPcare)->first();
        } else {
            $dokter = $dokter->limit(10)->get();
        }
        return response()->json($dokter);
    }
}
