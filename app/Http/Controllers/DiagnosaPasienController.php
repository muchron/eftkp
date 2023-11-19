<?php

namespace App\Http\Controllers;

use App\Models\DiagnosaPasien;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DiagnosaPasienController extends Controller
{
    function show(Request $request)
    {
        $diagsnosaPasien = DiagnosaPasien::where('no_rawat', $request->no_rawat)->get();
        return $diagsnosaPasien;
    }
    function create(Request $request)
    {
        $data = $request->all();
        $findDiagnosa = DiagnosaPasien::where(['no_rawat' => $request->no_rawat])->count();
        $data['prioritas'] = 1;
        if ($findDiagnosa) {
            $data['prioritas'] = $findDiagnosa + 1;
        }
        try {
            $diagnosa = DiagnosaPasien::create($data);
            return response()->json($diagnosa, 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
