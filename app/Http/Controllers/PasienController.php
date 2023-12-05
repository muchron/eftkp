<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    function get()
    {
    }

    function getRiwayat(Request $request)
    {
        $riwayat = Pasien::where(['no_rkm_medis' => $request->no_rkm_medis])->with(['regPeriksa' => function ($query) {
            return $query->where(['stts' => 'Sudah'])->with(['diagnosa.penyakit', 'prosedur.icd9'])->orderBy('tgl_registrasi', 'DESC');
        }])->first();
        // $riwayat = Pasien::where('no_rkm_medis', $request->no_rkm_medis)->with(['regPeriksa' => function ($query) {
        //     return $query->with(['resepObat.resepDokter.obat' => function ($query) {
        //         return $query->select(['nama_brng', 'kode_brng', 'kode_sat'])->with(['satuan']);
        //     }, 'resepObat.resepRacikan.detail.obat' => function ($query) {
        //         return $query->select(['nama_brng', 'kode_brng', 'kode_sat'])->with(['satuan']);
        //     }]);
        // }])->get();

        return response()->json($riwayat);
    }
}
