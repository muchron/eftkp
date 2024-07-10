<?php

namespace App\Http\Controllers;

use App\Models\MapingDokterPcare;
use Illuminate\Http\Request;

class MapingDokterController extends Controller
{
    function get(Request $request)
    {
        $dokter = MapingDokterPcare::with('dokter');
        if ($request->kdDokterPcare) {
            $dokter =  $dokter->where('kd_dokter_pcare', $request->kdDokterPcare)->first();
        } else if ($request->dokter) {
            $dokter = $dokter->where('nm_dokter_pcare', 'like', "%$request->dokter%")->get();
        } else {
            $dokter = $dokter->get();
        }
        return response()->json($dokter);
    }
}
