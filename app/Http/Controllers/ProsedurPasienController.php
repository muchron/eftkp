<?php

namespace App\Http\Controllers;

use App\Models\Icd9;
use App\Models\ProsedurPasien;
use App\Traits\Track;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProsedurPasienController extends Controller
{
    use Track;

    function get(Request $request)
    {
        $tindakan = ProsedurPasien::where('no_rawat', $request->no_rawat)->orderBy('prioritas', 'ASC')->with('icd9')->get();
        return response()->json($tindakan);
    }
    function create(Request $request)
    {

        $data = $request->data;
        for ($i = 0; $i < count($data); $i++) {
            try {
                $prosedur = ProsedurPasien::create($data[$i]);
                if ($prosedur) {
                    $this->insertSql(new ProsedurPasien(), $data[$i]);
                }
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
        }
        return response()->json('SUKSES', 201);
    }

    function delete(Request $request)
    {
        $key = [
            'no_rawat' => $request->no_rawat,
            'kode' => $request->kode,
        ];

        try {
            $prosedur = ProsedurPasien::where($key)->delete();
            if ($prosedur) {
                $this->deleteSql(new ProsedurPasien(), $key);
            }
            return response()->json('SUKSES', 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
