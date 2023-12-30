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
        $row = $request->start;
        $limit = $request->length;

        // return $request;
        $bpjs = $this->bpjs;
        return $bpjs->tanggalDaftar(date('d-m-Y'))->index($row, $limit);
    }
}
