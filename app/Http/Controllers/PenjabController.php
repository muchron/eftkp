<?php

namespace App\Http\Controllers;

use App\Models\Penjab;
use Illuminate\Http\Request;

class PenjabController extends Controller
{
    function get(Request $request)
    {
        $penjab = Penjab::where('kd_pj', $request->penjab)->orWhere('png_jawab', 'like', "{$request->penjab}%")->get();
        return response()->json($penjab);
    }
}
