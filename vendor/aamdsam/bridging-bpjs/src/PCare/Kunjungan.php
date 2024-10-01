<?php namespace AamDsam\Bpjs\PCare;

use AamDsam\Bpjs\PCare\PcareService;

class Kunjungan extends PcareService
{
    /**
     * @var string
     */
    protected $feature = 'kunjungan';

    public function rujukan($nomorKunjungan)
    {
        $this->feature .= "/V1/rujukan/{$nomorKunjungan}";
        return $this;
    }

    public function riwayat($nomorKartu)
    {
        $this->feature .= "/V1/peserta/{$nomorKartu}";
        return $this;
    }
}
