<?php

namespace App\Http\Controllers;

use App\Models\RegPeriksa;
use Illuminate\Http\Request;

class RegPeriksaController extends Controller
{
    protected $regPeriksa;
    protected $relation = [];

    function __construct()
    {
        $this->regPeriksa = new RegPeriksa();
        $this->relation = ['dokter', 'pasien', 'penjab'];
    }

    function get(Request $req)
    {
        $regPeriksa = $this->regPeriksa->with(['pasien', 'dokter', 'penjab']);
        if ($req->stardDate || $req->endDate) {
            // jika ada filter tanggal, ambil tgl registrasi yang ditentukan
            $regPeriksa->whereBetween('tgl_registrasi', [$req->startData, $req->endDate]);
        }
        return response()->json($regPeriksa->get(), 200);
    }
    function show(Request $req)
    {
        $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)
            ->with($this->relation)->first();
        return response()->json($regPeriksa, 200);
    }
}
