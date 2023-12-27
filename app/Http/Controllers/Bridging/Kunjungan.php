<?php

namespace App\Http\Controllers\Bridging;

use AamDsam\Bpjs\PCare;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function post(Request $request)
    {
        $data = $request->all();
        $data = [
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
            "kdPoliRujukInternal" => $request->kdInnternal ? $request->kdInnternal : null,
        ];

        if ($request->jenisRujukan) {
            if ($request->jenisRujukan == 'spesialis') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => [
                        "kdSubSpesialis1" => $request->kdSubSpesialis,
                        "kdSarana" => $request->kdSarana,
                    ],
                    'khusus' => null,
                ];
                $data['kdTacc'] = -1;
                $data['alasanTacc'] = null;
            } else if ($request->jenisRujukan == 'khusus') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => null,
                    'khusus' => [
                        'kdKhusus' => $request->kdKhusus,
                        'kdSubSpesialis' => $request->kdKhususSub,
                        'catatan' => $request->catatanKhusus
                    ],
                ];
                $data['kdTacc'] = 0;
                $data['alasanTacc'] = null;
            } else if ($request->jenisRujukan == 'internal') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => null,
                ];
                $data['kdTacc'] = $request->kdTacc;
                $data['alasanTacc'] = $request->kalasanTacc;
            }
        }

        try {
            $bpjs = $this->bpjs;
            return $bpjs->store($data);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    function put(Request $request)
    {
        $data = [
            "noKunjungan" => $request->noKunjungan,
            "noKartu" => $request->no_peserta,
            "tglDaftar" => $request->tgl_daftar,
            "kdPoli" => $request->kd_poli_pcare,
            "keluhan" => $request->keluhan,
            "kdSadar" => $request->kesadaran,
            "sistole" => $request->tensi != '-' ? explode('/', $request->tensi)[0] : '',
            "diastole" => $request->tensi != '-' ? explode('/', $request->tensi)[1] : '',
            "beratBadan" => $request->berat,
            "tinggiBadan" => $request->tinggi,
            "respRate" => $request->respirasi,
            "heartRate" => $request->nadi,
            "lingkarPerut" => $request->lingkar_perut,
            "kdStatusPulang" => $request->sttsPulang,
            "tglPulang" => $request->tglPulang,
            "kdDokter" => $request->kd_dokter_pcare,
            "kdDiag1" => $request->kdDiagnosa1,
            "kdDiag2" => $request->kdDiagnosa2,
            "kdDiag3" => $request->kdDiagnosa3,
            "kdPoliRujukInternal" => $request->kdInnternal ? $request->kdInnternal : null,
        ];
        if ($request->jenisRujukan) {
            if ($request->jenisRujukan == 'spesialis') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => [
                        "kdSubSpesialis1" => $request->kdSubSpesialis,
                        "kdSarana" => $request->kdSarana,
                    ],
                    'khusus' => null,
                ];
                $data['kdTacc'] = -1;
                $data['alasanTacc'] = null;
            } else if ($request->jenisRujukan == 'khusus') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => null,
                    'khusus' => [
                        'kdKhusus' => $request->kdKhusus,
                        'kdSubSpesialis' => $request->kdKhususSub,
                        'catatan' => $request->catatanKhusus
                    ],
                ];
                $data['kdTacc'] = 0;
                $data['alasanTacc'] = null;
            } else if ($request->jenisRujukan == 'internal') {
                $data['rujukLanjut'] = [
                    "kdppk" => $request->kdPpkRujukan,
                    "tglEstRujuk" => $request->tglEstRujukan,
                    "subSpesialis" => null,
                ];
                $data['kdTacc'] = $request->kdTacc;
                $data['alasanTacc'] = $request->kalasanTacc;
            }
        }
        try {
            $bpjs = $this->bpjs;
            return $bpjs->update($data);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }

    function delete($noKunjungan)
    {
        try {
            $bpjs = $this->bpjs;
            return $bpjs->destroy($noKunjungan);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    function getRujukan($noKunjungan)
    {
        $bpjs = $this->bpjs;
        $rujukan = $bpjs->rujukan($noKunjungan)->index();

        $encode = json_encode($rujukan['response']);
        $response = json_decode($encode);


        $data = [
            'noKunjungan' => $response->noRujukan,
            'kdPpkAsal' => $response->ppk->kdPPK,
            'nmPpkAsal' => $response->ppk->nmPPK,
            'kdKR' => $response->ppk->kc->kdKR->kdKR,
            'nmKR' => $response->ppk->kc->kdKR->nmKR,
            'kdKC' => $response->ppk->kc->kdKC,
            'nmKC' => $response->ppk->kc->nmKC,
            'tglKunjungan' => date('Y-m-d', strtotime($response->tglKunjungan)),
            'noKartu' => $response->nokaPst,
            'nm_pasien' => $response->nmPst,
            'kdDiag1' => $response->diag1->kdDiag,
            'nmDiag1' => $response->diag1->nmDiag,
            'kdDokter' => $response->dokter->kdDokter,
            'nmDokter' => $response->dokter->nmDokter,
            'tglEstRujuk' => date('Y-m-d', strtotime($response->tglEstRujuk)),
            'tglAkhirRujuk' => date('Y-m-d', strtotime($response->tglAkhirRujuk)),
            'jadwal' => $response->jadwal,
            'kdPPK' => $response->ppkRujuk->kdPPK,
            'nmPPK' => $response->ppkRujuk->nmPPK,
            'kdPoli' => $response->poli->kdPoli,
            'nmPoli' => $response->poli->nmPoli,

        ];

        return $data;

        $pdf = PDF::loadView('content.print.rujukanVertikal', ['data' => $data])
            ->setPaper("a5", 'landscape')->setOptions(['defaultFont' => 'sherif', 'isRemoteEnabled' => true]);
        return $pdf->stream($noKunjungan);
    }
}
