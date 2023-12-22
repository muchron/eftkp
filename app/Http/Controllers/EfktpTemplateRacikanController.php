<?php

namespace App\Http\Controllers;

use App\Models\EfktpTemplateRacikan;
use App\Models\EfktpTemplateRacikanDetail;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class EfktpTemplateRacikanController extends Controller
{
    use Track;


    function create(Request $request){
        $data = [
            'kd_dokter' => $request->kd_dokter,
            'nm_racik' => $request->nm_racik,
        ];
            try {
                $create = EfktpTemplateRacikan::create($data);
                if($create){
                    $this->insertSql(new EfktpTemplateRacikan(), $data);
                    $detail = new EfktpTemplateRacikanDetailController();
                    $detail->create($request);
                }
                return response()->json('SUKSES');
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
    }
    function get(Request $request){
        $racik = $request->nm_racik;
        $getTemplate = EfktpTemplateRacikan::where('nm_racik', $racik)->with('detail')->first();
        return response()->json($getTemplate);
    }
    
    function search(Request $request){
        $getTemplate = EfktpTemplateRacikan::where('nm_racik', 'like', '%'.$request->racik.'%')->get();
        return response()->json($getTemplate);
    }
}
