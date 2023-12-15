<?php

namespace App\Http\Controllers;

use App\Models\EfktpPcareAlergi;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EfktpPcareAlergiController extends Controller
{
    use Track;

    function create(Request $request)
    {
        $data = [
            'no_rkm_medis' => $request->no_rkm_medis,
            'alergi' => $request->alergi
        ];

        try {

            $findalergi = EfktpPcareAlergi::where('no_rkm_medis', $request->no_rkm_medis)->get();
            if ($findalergi) {
                $deleted = EfktpPcareAlergi::where('no_rkm_medis', $request->no_rkm_medis)->delete();
                if ($deleted) {
                    $this->deleteSql(new EfktpPcareAlergi(), ['no_rkm_medis' => $request->no_rkm_medis]);
                }
            }
            $alergi = EfktpPcareAlergi::create($data);
            if ($alergi) {
                $this->insertSql(new EfktpPcareAlergi(), $data);
            }
            return response()->json('SUKES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
    function get(Request $request)
    {

        $alergi = EfktpPcareAlergi::where('no_rkm_medis', $request->no_rkm_medis)
            ->orWhere('alergi', 'like', '%' . $request->alergi . '%')->get();
        return response()->json($alergi);
    }
}
