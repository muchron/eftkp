<?php

namespace App\Http\Controllers;

use App\Models\MappingPoliklinikPcare;
use Illuminate\Http\Request;

class MappingPoliklinikPcareController extends Controller
{
    function get(Request $request)
    {
        $mapping = MappingPoliklinikPcare::where('kd_poli_pcare', $request->kdPoliPcare)
            ->with('poliklinik')->first();
        return response()->json($mapping);
    }
}
