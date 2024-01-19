<?php

namespace App\Http\Controllers;

use App\Traits\Track;
use Illuminate\Http\Request;
use App\Models\PemeriksaanGigiHasil;
use Illuminate\Database\QueryException;

class PemeriksaanGigiHasilController extends Controller
{
    use Track;
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'posisi_gigi' => $request->posisi_gigi,
            'hasil' => $request->hasil,
            'keterangan' => $request->keterangan,
            'dokter' => $request->dokter,
        ];

        try {
            $gigi = PemeriksaanGigiHasil::create($data);
            if ($gigi) {
                $this->insertSql(new PemeriksaanGigiHasil(), $data);
            }
            return response()->json('SUKSES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
