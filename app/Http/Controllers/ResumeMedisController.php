<?php

namespace App\Http\Controllers;

use App\Models\ResumeMedis;
use Illuminate\Http\Request;

class ResumeMedisController extends Controller
{
    function get(Request $request)
    {
        $resume = ResumeMedis::where('no_rawat', $request->no_rawat)->get();
        return response()->json($resume);
    }
}
