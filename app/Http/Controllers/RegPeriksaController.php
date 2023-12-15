<?php

namespace App\Http\Controllers;

use App\Models\RegPeriksa;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegPeriksaController extends Controller
{
    protected $regPeriksa;
    protected $relation = [];

    function __construct()
    {
        $this->regPeriksa = new RegPeriksa();
        $this->relation = ['dokter', 'pasien', 'penjab', 'pemeriksaanRalan', 'poliklinik.maping', 'dokter.maping', 'pcarePendaftaran', 'pasien.alergi'];
    }

    function get(Request $req)
    {

        if ($req->tglAwal || $req->tglAkhir) {
            // jika ada filter tanggal, ambil tgl registrasi yang ditentukan
            $regPeriksa = $this->regPeriksa->with($this->relation)->whereBetween('tgl_registrasi', [$req->tglAwal, $req->tglAkhir])->get();
        } else {
            $regPeriksa = $this->regPeriksa->with($this->relation)->where('tgl_registrasi', date('Y-m-d'))->get();
        }

        // if($req->range == 'month'){
        //     $regPeriksa = $this->regPeriksa->with($this->relation)->whereBetween('tgl_registrasi', [$req->tglAwal, $req->tglAkhir])->get();
        // }

        if ($req->dataTable) {
            return DataTables::of($regPeriksa)->make(true);
        }
        return response()->json($regPeriksa, 200);
    }
    function show(Request $req)
    {
        $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)
            ->with($this->relation)->first();
        return response()->json($regPeriksa, 200);
    }
    function update(Request $req)
    {
        $data = $req->except('_token');
        try {
            $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)->update($data);
            if ($regPeriksa) {
                return response()->json(['Berhasil mengubah data registrasi', $regPeriksa]);
            }
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
