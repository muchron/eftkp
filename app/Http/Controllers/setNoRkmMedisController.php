<?php

namespace App\Http\Controllers;

use App\Models\setNoRkmMedis;
use App\Traits\Track;
use Illuminate\Http\Request;

class setNoRkmMedisController extends Controller
{
    use Track;
    function get()
    {
        $noRkmMedis = setNoRkmMedis::first();
        return response()->json($noRkmMedis);
    }
    function delete()
    {
        $noRkmMedis = setNoRkmMedis::first()->delete();
    }
}
