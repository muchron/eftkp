<?php

namespace App\Http\Controllers;

use App\Models\RegPeriksa;
use Illuminate\Http\Request;

class RegPeriksaController extends Controller
{
    protected $regPeriksa;

    function __construct()
    {
        $this->regPeriksa = new RegPeriksa();
    }

    function get(Request $req)
    {
        $regPeriksa = $this->regPeriksa->with(['pasien', 'dokter', 'penjab']);
        if ($req->stardDate || $req->endDate) {
            // jika ada filter tanggal, ambil tgl registrasi yang ditentukan
            $regPeriksa->whereBetween('tgl_registrasi', [$req->startData, $req->endDate]);
        } else {
            // ambil tgl registrasi hari ini
            // $regPeriksa->where('tgl_periksa', date('Y-m-d'));
            // $regPeriksa->get();

        }
        return response()->json($regPeriksa->get(), 200);
    }
}
