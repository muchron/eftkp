<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use App\Traits\Track;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    use Track;
    function get(Request $request)
    {
        $poli = Poliklinik::limit(10)->get();
        if ($request->poli) {
            $poli = Poliklinik::where('kd_poli', "{$request->poli}")->orWhere('nm_poli', 'like', "%{$request->poli}%")->get();
        }
        return response()->json($poli);
    }
}
