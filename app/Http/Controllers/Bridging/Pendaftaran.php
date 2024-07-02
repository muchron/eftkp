<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\PCare;
use App\Traits\PcareConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Database\QueryException;

class Pendaftaran extends Controller
{
    use PcareConfig;
    public $bpjs;

    public function __construct()
    {
        $this->bpjs = new Pcare\Pendaftaran($this->config());
    }
    function get(Request $request)
    {
        $row = $request->start ? $request->start : 0;
        $limit = $request->length ? $request->length : 0;
        $bpjs = $this->bpjs;
        return $bpjs->tanggalDaftar(date('d-m-Y'))->index($row, $limit);
    }

    function getByTanggal($tgl = '', $start = 0, $limit = 15)
    {
        $bpjs = $this->bpjs;
        $tgl = $tgl ? $tgl : date('d-m-Y');
        return $bpjs->tanggalDaftar($tgl)->index($start, $limit);
    }
    function getUrut($noUrut)
    {
        $tanggal = date('d-m-Y');
        $bpjs = $this->bpjs;
        return $bpjs->nomorUrut($noUrut)->tanggalDaftar($tanggal)->index();
    }
    function delete(Request $request)
    {
        $bpjs = $this->bpjs;
        $bpjs->peserta($request->noKartu)
            ->tanggalDaftar($request->tglDaftar)
            ->nomorUrut($request->noUrut)
            ->kodePoli($request->kdPoli);
        try {
            return $bpjs->destroy();
        } catch (QueryException $e) {
            return response()->json($e->errorInfo);
        }
    }
    function post(Request $request)
    {

        $bpjs = $this->bpjs;
        $data = [
            "kdProviderPeserta" => $request->kdProviderPeserta,
            "tglDaftar" => $request->tgl_registrasi,
            "noKartu" => $request->no_peserta,
            "kdPoli" => $request->kd_poli_pcare,
            "keluhan" => $request->keluhan,
            "kunjSakit" => true,
            "sistole" => (int)$request->sistole,
            "diastole" => (int)$request->diastole,
            "beratBadan" => (int)$request->berat,
            "tinggiBadan" => (int)$request->tinggi,
            "respRate" => (int)$request->respirasi,
            "lingkarPerut" => (int)$request->lingkar_perut,
            "heartRate" => (int)$request->nadi,
            "rujukBalik" => 0,
            "kdTkp" => $request->kdTkp,
        ];
        try {
            return $bpjs->store($data);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo);
        }
    }
}
