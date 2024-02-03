<?php

namespace App\Http\Controllers;

use App\Models\PenilaianAwalKeperawatanRalan;
use Illuminate\Http\Request;

class PenilaianAwalKeperawatanRalanController extends Controller
{
    function get(Request $request)
    {
        $penilaian = PenilaianAwalKeperawatanRalan::where('no_rawat', $request->no_rawat)
            ->with('regPeriksa', 'pegawai')->first();
        return response()->json($penilaian);
    }
}
