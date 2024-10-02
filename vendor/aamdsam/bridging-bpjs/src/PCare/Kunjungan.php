<?php namespace AamDsam\Bpjs\PCare;

use AamDsam\Bpjs\PCare\PcareService;

class Kunjungan extends PcareService
{
	/**
	 * @var string
	 */
	protected $feature = 'kunjungan/V1';

	public function rujukan($nomorKunjungan)
	{
		$this->feature = "kunjungan/rujukan/{$nomorKunjungan}";
		return $this;
	}

	public function riwayat($nomorKartu)
	{
		$this->feature = "kunjungan/peserta/{$nomorKartu}";
		return $this;
	}
}
