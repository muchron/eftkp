<?php

namespace App\Http\Controllers\Bridging;

// use PCare\Kesadaran;
use AamDsam\Bpjs\PCare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\PcareConfig;

class Dokter extends Controller
{
  use PcareConfig;
  public function __construct()
  {
  }

  function dokter()
  {

    // return $this->config();
    $bpjs = new Pcare\Kunjungan($this->config());
    return $bpjs->riwayat('0001306194502')->index();
  }
}
