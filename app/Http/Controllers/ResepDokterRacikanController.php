<?php

namespace App\Http\Controllers;

use App\Models\ResepDokterRacikan;
use Illuminate\Database\QueryException;
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

    function create(Request $request)
    {
        $countData = count($request->data);
        try {
            for ($i = 0; $i < $countData; $i++) {
                $response[] = ResepDokterRacikan::create($request->data[$i]);
            }
            return response()->json(['SUKSES', $request->data]);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function delete(Request $request)
    {
        $keys = [
            'no_resep' => $request->no_resep,
            'no_racik' => $request->no_racik,
        ];
        try {
            $resep = ResepDokterRacikan::where($keys)->delete();
            return response()->json(['SUKSES', $resep]);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 200);
        }
    }
}
