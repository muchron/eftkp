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
		if(!$request->data){
			return false;
		}
        $countData = count($request->data);
        try {
            for ($i = 0; $i < $countData; $i++) {
                $response[] = ResepDokterRacikan::create([
	                'no_resep' => $request->data[$i]['no_resep'],
	                'no_racik' => $request->data[$i]['no_racik'],
	                'jml_dr' => $request->data[$i]['jml_dr'],
					'kd_racik' => $request->data[$i]['kd_racik'],
	                'keterangan' => $request->data[$i]['keterangan'],
	                'aturan_pakai' => $request->data[$i]['aturan_pakai'],
                ]);

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
