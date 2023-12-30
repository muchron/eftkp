<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    function getByNoka($noKartu)
    {
        $pasien = Pasien::where('no_peserta', $noKartu)->first();
        return response()->json($pasien);
    }

    function getRiwayat(Request $request)
    {
        $riwayat = Pasien::where(['no_rkm_medis' => $request->no_rkm_medis])->with(['regPeriksa' => function ($query) {
            return $query->whereIn('stts', ['Sudah', 'Dirujuk'])->with(['diagnosa.penyakit', 'prosedur.icd9'])->orderBy('tgl_registrasi', 'DESC');
        }])->first();
        return response()->json($riwayat);
    }
}
