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
        $setNoRm = $noRkmMedis->no_rkm_medis + 1;
        return response()->json(sprintf('%06d', $setNoRm));
    }
    function delete()
    {
        $noRkmMedis = setNoRkmMedis::first()->delete();
    }
}
