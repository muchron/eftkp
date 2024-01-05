<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\PCare;
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
    $bpjs = new Pcare\Kunjungan($this->config());
    return $bpjs->riwayat('0001306194502')->index();
  }
}
