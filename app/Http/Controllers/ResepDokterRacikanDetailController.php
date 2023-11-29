<?php

namespace App\Http\Controllers;

use App\Models\ResepDokterRacikan;
use App\Models\ResepDokterRacikanDetail;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ResepDokterRacikanDetailController extends Controller
{
    use Track;
    public $mdRacikanDetail;

    public function __construct()
    {
        $this->mdRacikanDetail = new ResepDokterRacikanDetail();
    }

    function get(Request $request)
    {
        $keys = [
            'no_resep' =>  $request->no_resep,
            'no_racik' =>  $request->no_racik,
        ];

        $resepDetail = ResepDokterRacikanDetail::where($keys)->with('obat.satuan', 'obat.jenis')->get();
        return response()->json($resepDetail);
    }

    public function create(Request $request)
    {
        $countData = count($request->data);
        $keys = [
            'no_resep' => $request->no_resep,
            'no_racik' => $request->no_racik
        ];
        $cekResep = ResepDokterRacikanDetail::where($keys);

        // return sizeof($cekResep->get());
        if (sizeof($cekResep->get())) {
            $delete = $this->delete($request);
        }
        try {
            for ($i = 0; $i < $countData; $i++) {
                $resep[] = ResepDokterRacikanDetail::create($request->data[$i]);
                if ($resep) {
                    $sql[] = $this->insertSql($this->mdRacikanDetail, $request->data[$i]);
                }
            }
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
    public function delete(Request $request)
    {
        $keys = [
            'no_resep' => $request->no_resep,
            'no_racik' => $request->no_racik,
        ];
        if ($request->obat) {
            $keys['kode_brng'] = $request->obat;
        }
        $delete = ResepDokterRacikanDetail::where($keys)->delete();
        $this->deleteSql($this->mdRacikanDetail, $keys);
        return response()->json('SUKSES');
    }
}
