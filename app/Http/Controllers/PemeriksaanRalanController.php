<?php

namespace App\Http\Controllers;

use App\Models\PcareKunjungan;
use App\Models\PemeriksaanRalan;
use App\Models\RegPeriksa;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PemeriksaanRalanController extends Controller
{
    use Track;
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
          $data = [
            'no_rawat'=> $req->no_rawat,
            'tgl_rawat'=> date('Y-m-d'),
            'jam_rawat'=> date('H:i:s'),
            'nip'=> $req->nip,
            'keluhan'=> $req->keluhan,
            'pemeriksaan'=> $req->pemeriksaan,
            'suhu_tubuh'=> $req->suhu_tubuh,
            'tensi'=> $req->tensi,
            'tinggi'=> $req->tinggi,
            'berat'=> $req->berat,
            'respirasi'=> $req->respirasi,
            'nadi'=> $req->nadi,
            'spo2'=> $req->spo2,
            'gcs'=> $req->gcs,
            'kesadaran'=> $req->kesadaran,
            'alergi'=> $req->alergi,
            'lingkar_perut'=> $req->lingkar_perut,
            'rtl'=> $req->rtl,
            'penilaian'=> $req->penilaian,
            'instruksi'=> $req->instruksi,
            'evaluasi'=> '-',
          ];
        if ($this->show($req)) {
            unset($data['tgl_rawat'], $data['jam_rawat']);
            $request = $req->merge($data); //convert array data menjadi object request laravel
            return $update = $this->update($request);
        }
        try {
            $pemeriksaan = $this->pemeriksaan->create($data);
            if($pemeriksaan){
                $this->insertSql(new PemeriksaanRalan(), $data);
                return response()->json('SUKSES', 201);
            }
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 400);
        }
    }

    function update(Request $req)
    {
      $data = [
        'keluhan'=> $req->keluhan,
        'pemeriksaan'=> $req->pemeriksaan,
        'suhu_tubuh'=> $req->suhu_tubuh,
        'tensi'=> $req->tensi,
        'tinggi'=> $req->tinggi,
        'berat'=> $req->berat,
         'respirasi'=> $req->respirasi,
         'nadi'=> $req->nadi,
        'spo2'=> $req->spo2,
        'gcs'=> $req->gcs,
        'kesadaran'=> $req->kesadaran,
        'alergi'=> $req->alergi,
        'lingkar_perut'=> $req->lingkar_perut,
        'rtl'=> $req->rtl,
        'penilaian'=> $req->penilaian,
        'instruksi'=> $req->instruksi,
        'evaluasi'=> '-',
      ];
      $keys = [
        'no_rawat'=>$req->no_rawat
      ];
      try {
            $pemeriksaan = $this->pemeriksaan->where($keys)->update($data);
            if($pemeriksaan){
                $this->updateSql(new PemeriksaanRalan(), $data, $keys);
            }
            return response()->json('SUKSES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 400);
        }
    }
}
