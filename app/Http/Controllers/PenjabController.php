<?php

namespace App\Http\Controllers;

use App\Models\Penjab;
use Illuminate\Http\Request;

class PenjabController extends Controller
{
    function get(Request $request)
    {
        $penjab = Penjab::where(['status' => '1'])
            ->where('png_jawab', 'like', "{$request->penjab}%")->get();
        return response()->json($penjab);
    }
}
