<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\PCare;
use App\Http\Controllers\Controller;
use App\Traits\PcareConfig;
use Illuminate\Http\Request;

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
    function getUrut($noUrut)
    {
        $tanggal = date('d-m-Y');
        $bpjs = $this->bpjs;
        return $bpjs->nomorUrut($noUrut)->tanggalDaftar($tanggal)->index();
    }
    function delete(Request $request)
    {
        $bpjs = $this->bpjs;
        return $bpjs->peserta($request->noKartu)->tanggalDaftar($request->tglDaftar)->nomorUrut($request->no);
    }
}
