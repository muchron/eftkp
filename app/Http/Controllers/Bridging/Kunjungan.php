<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\Pcare;
use App\Traits\PcareConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiagnosaPasien;
use App\Models\MapingDokterPcare;
use App\Models\MappingPoliklinikPcare;
use App\Models\PcareKunjungan;
use Illuminate\Database\QueryException;

class Kunjungan extends Controller
{
    use PcareConfig;
    
    public $bpjs;
    public function __construct() {
        $this->bpjs = new Pcare\Kunjungan($this->config());
    }

    public function get()
    {
        $bpjs= $this->bpjs ;
        return $bpjs->riwayat('0000078139754')->index();
    }

    public function post(Request $request){
        $diagnosa = DiagnosaPasien::where([
            'no_rawat' => $request->no_rawat,
            'prioritas' => 1
            ])->first();
       $dokter = MapingDokterPcare::where('kd_dokter', $request->nip)->first();
       $poli = MappingPoliklinikPcare::where('kd_poli_rs',$request->kd_poli)->first();
       $data = [
            "noKunjungan"=> null,
            "noKartu"=> $request->no_peserta,
            "tglDaftar"=> date('Y-m-d'),
            "kdPoli"=> 001,
            "keluhan"=> $request->keluhan,
            "kdSadar"=> "01",
            "sistole"=> $request->tensi != '-' ? explode('/', $request->tensi)[0] : '0',
            "diastole"=> $request->tensi != '-' ? explode('/', $request->tensi)[1] : '0',
            "beratBadan"=> $request->berat,
            "tinggiBadan"=> $request->tinggi,
            "respRate"=> $request->respirasi,
            "heartRate"=> $request->heart_rate,
            "terapi"=> $request->instruksi,
            "kdStatusPulang"=> "4",
            "tglPulang"=> date('Y-m-d'),
            "kdDokter"=> $dokter->kd_dokter_pcare,
            "kdDiag1"=> $diagnosa->kd_penyakit,
            "kdDiag2"=> null,
            "kdDiag3"=> null,
            'no_rawat' => $request->no_rawat,
            'no_rkm_medis' => $request->no_rkm_medis,
            'nm_pasien' => $request->nm_pasien,
        ];
        try {
            $result = PcareKunjungan::create($data);
            return $result;
        } catch (QueryException $e) {
            return $e->errorInfo;
        }

    }
}
