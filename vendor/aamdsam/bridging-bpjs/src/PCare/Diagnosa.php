<?php namespace AamDsam\Bpjs\PCare;

use AamDsam\Bpjs\PCare\PcareService;

class Diagnosa extends PcareService
{
    /**
     * @var string
     */
    protected $feature = 'diagnosa';

	public function diagnosa($diagnosa)
	{
		$this->feature .= "/{$diagnosa}";
		return $this;
	}

}
