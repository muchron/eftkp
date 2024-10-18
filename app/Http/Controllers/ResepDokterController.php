<?php

namespace App\Http\Controllers;

use App\Models\ResepDokter;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ResepDokterController extends Controller
{
    use Track;
    //
    public function get(Request $request)
    {
        $resep = ResepDokter::where('no_resep', $request->no_resep)
            ->with('obat.satuan')->get();
        return response()->json($resep);
    }

    public function create(Request $request)
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
    public function delete(Request $request)
    {
        $key = [
            'no_resep' => $request->no_resep,
            'kode_brng' => $request->kode_brng,
        ];
        try {
            $resep = ResepDokter::where($key)->delete();
            if ($resep) {
                $this->deleteSql(new ResepDokter(), $key);
            }
            return response()->json($resep);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    public function update(Request $request)
    {
        $key = [
            'no_resep' => $request->no_resep,
            'kode_brng' => $request->kode_brng,
        ];

        try {
            $resep = ResepDokter::where($key)->update($request->all());
            if ($resep) {
                $this->updateSql(new ResepDokter(), $request->all(), $key);
            }
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 400);
        }
    }
}
