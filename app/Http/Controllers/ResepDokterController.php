<?php

namespace App\Http\Controllers;

use App\Models\ResepDokter;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ResepDokterController extends Controller
{
    //
    function get(Request $request)
    {
        $resep = ResepDokter::where('no_resep', $request->no_resep)
            ->with('obat')->get();
        return response()->json($resep);
    }

    function create(Request $request)
    {
        $data = count($request->dataObat);

        try {
            for ($i = 0; $i < $data; $i++) {
                $response[] = ResepDokter::create($request->dataObat[$i]);
            }
            return response()->json([$response, $i], 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
