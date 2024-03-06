<?php

namespace App\Http\Controllers;

//use App\Models\ResumeMedis;
use App\Traits\Track;
use App\Models\ResumeMedis;
use Illuminate\Http\Request;
use App\Models\ResumePasienRanap;
use Illuminate\Database\QueryException;

class ResumeMedisController extends Controller
{
        function get(Request $request)
        {
                $resume = ResumeMedis::where('no_rawat', $request->no_rawat)->get();
                return response()->json($resume);
        }
}
