<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    function get(Request $request)
    {
        $penyakits = new Penyakit();
        if ($request->penyakit) {
            $penyakit = $penyakits->where('kd_penyakit', $request->penyakit)->orWhere('nm_penyakit', 'like', '%' . $request->penyakit . '%')->get();
        } else {
            $penyakit = $penyakits->limit(10)->get();
        }
        return response()->json($penyakit);
    }
}
