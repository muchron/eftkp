<?php

namespace App\Http\Controllers;

use App\Models\ResepDokterRacikan;
use Illuminate\Http\Request;

class ResepDokterRacikanController extends Controller
{
    //
    function get(Request $request)
    {
        if ($request->no_racik) {
            $resep = ResepDokterRacikan::where([
                'no_resep' => $request->no_resep,
                'no_racik' => $request->no_racik,
            ])->with(['detail' => function ($query) {
                return $query->with(['obat.satuan']);
            }, 'metode'])->first();
            return response()->json($resep);
        }

        $resep = ResepDokterRacikan::where([
            'no_resep' => $request->no_resep,
        ])->with(['detail' => function ($query) {
            return $query->with(['obat.satuan']);
        }, 'metode'])->get();
        return response()->json($resep);
    }
}
