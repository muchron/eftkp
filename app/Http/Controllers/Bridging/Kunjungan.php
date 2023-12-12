<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\Pcare;
use App\Traits\PcareConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class Kunjungan extends Controller
{
    use PcareConfig;

    public $bpjs;
    public function __construct()
    {
        $this->bpjs = new Pcare\Kunjungan($this->config());
    }

    public function get($nokartu)
    {
        $bpjs = $this->bpjs;
        return $bpjs->riwayat($nokartu)->index();
    }
    public function delete($nokartu)
    {
        $bpjs = $this->bpjs;
        return $bpjs->destroy($nokartu);
    }

    public function post(Request $request)
    {
        $data = $request->all();
        $parameter = [
            "noKunjungan" => null,
            "noKartu" => $data['no_peserta'],
            "tglDaftar" => $data['tgl_daftar'],
            "kdPoli" => $data['kd_poli_pcare'],
            "keluhan" => $data['keluhan'],
            "kdSadar" => $data['kesadaran'],
            "sistole" => $data['tensi'] != '-' ? explode('/', $data['tensi'])[0] : '0',
            "diastole" => $data['tensi'] != '-' ? explode('/', $data['tensi'])[1] : '0',
            "beratBadan" => $data['berat'],
            "tinggiBadan" => $data['tinggi'],
            "respRate" => $data['respirasi'],
            "heartRate" => $data['nadi'],
            "lingkarPerut" => $data['lingkar_perut'],
            "kdStatusPulang" => $data['sttsPulang'],
            "tglPulang" => $data['tglPulang'],
            "kdDokter" => $data['kd_dokter_pcare'],
            "kdDiag1" => $data['kdDiagnosa1'],
            "kdDiag2" => $data['kdDiagnosa2'],
            "kdDiag3" => $data['kdDiagnosa3'],
            "kdPoliRujukInternal" => null,
        ];

        if ($request->jenisRujukan) {
            if ($data['jenisRujukan'] == 'spesialis') {
                $parameter['rujukLanjut'] = [
                    "kdppk" => $data['kdPpkRujukan'],
                    "tglEstRujuk" => $data['tglEstRujukan'],
                    "subSpesialis" => [
                        "kdSubSpesialis1" => $data['kdSubSpesialis'],
                        "kdSarana" => $data['kdSarana'],
                    ],
                    'khusus' => null,
                ];
                $parameter['kdTacc'] = -1;
                $parameter['alasanTacc'] = null;
            } else if ($data['jenisRujukan'] == 'khusus') {
                $parameter['rujukLanjut'] = [
                    "kdppk" => $data['kdPpkRujukan'],
                    "tglEstRujuk" => $data['tglEstRujukan'],
                    "subSpesialis" => null,
                    'khusus' => [
                        'kdKhusus' => $data['kdKhusus'],
                        'kdSubSpesialis' => $data['kdSubPesialisKhusus'],
                        'catatan' => $data['catatanKhusus']
                    ],
                ];
                $parameter['kdTacc'] = 0;
                $parameter['alasanTacc'] = null;
            }
        }
        try {
            $bpjs = $this->bpjs;
            return $bpjs->store($parameter);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
