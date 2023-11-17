<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanRalan;
use App\Models\RegPeriksa;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDO;

class PemeriksaanRalanController extends Controller
{
    public $pemeriksaan;
    function __construct()
    {
        $this->pemeriksaan = new PemeriksaanRalan();
    }

    function show(Request $req)
    {
        $pemeriksaan = $this->pemeriksaan->where('no_rawat', $req->no_rawat)->first();
        return $pemeriksaan;
    }
    function get(Request $req)
    {
        $pemeriksaan = $this->pemeriksaan->where('no_rawat', $req->no_rawat)->first();
        return $pemeriksaan;
    }

    function create(Request $req)
    {
        $data = $req->except('_token');
        if ($this->show($req)) {
            return $this->update($req);
        }
        $data['tgl_perawatan'] = date('Y-m-d');
        $data['jam_rawat'] = date('H:i:s');
        $data['evaluasi'] = '-';
        $data['nip'] = session()->get('pegawai')->nik;
        try {
            $pemeriksaan = $this->pemeriksaan->create($data);
            return response()->json('Berhasil menambah data pemeriksaan');
        } catch (QueryException $e) {
            return [$e->errorInfo, $data];
        }
    }

    function update(Request $req)
    {
        $data = $req->except('_token');
        $pemeriksaan = $this->pemeriksaan->where('no_rawat', $req->no_rawat);
        try {
            $pemeriksaan->update($data);
            return response()->json('Berhasil mengubah data pemeriksaan');
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
