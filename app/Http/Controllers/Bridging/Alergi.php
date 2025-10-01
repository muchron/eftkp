<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\PCare;
use App\Http\Controllers\Controller;
use App\Traits\PcareConfig;

class Alergi extends Controller
{
	use PcareConfig;

	public $bpjs;

	public function __construct()
	{
		echo 'dsdsdsd';
		$this->bpjs = new Pcare\Alergi($this->config());
	}

	public function get($keyword)
	{
		$bpjs = $this->bpjs;
		return $bpjs->jenis($keyword)->index();
	}

	public function prognosa($keyword)
	{
		$bpjs = $this->bpjs;
		return $bpjs->prognosa($keyword)->index();
	}
}
