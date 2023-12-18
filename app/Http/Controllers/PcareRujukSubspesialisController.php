<?php

namespace App\Http\Controllers;

use App\Traits\Track;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\PcareRujukSubspesialis;
use Illuminate\Database\QueryException;
use App\Models\EfktpPcareRujukSubspesialis;

class PcareRujukSubspesialisController extends Controller
{
    use Track;
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'noKunjungan' => $request->noKunjungan,
            'tglDaftar' => date('Y-m-d', strtotime($request->tgl_daftar)),
            'no_rkm_medis' => $request->no_rkm_medis,
            'nm_pasien' => $request->nm_pasien,
            'noKartu' => $request->noKartu,
            'kdPoli' => $request->kdSubSpesialis,
            'nmPoli' => $request->nmSubSpesialis,
            'keluhan' => $request->keluhan,
            'kdSadar' => $request->kesadaran,
            'nmSadar' => $request->nmSadar,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'beratBadan' => $request->berat,
            'tinggiBadan' => $request->tinggi,
            'respRate' => $request->respirasi,
            'heartRate' => $request->nadi,
            'lingkarPerut' => $request->lingkar_perut,
            'terapi' => $request->terapi,
            'kdStatusPulang' => $request->kdStatusPulang,
            'nmStatusPulang' => $request->nmStatusPulang,
            'tglPulang' => $request->tglPulang,
            'kdDokter' => $request->kdDokter,
            'nmDokter' => $request->nmDokter,
            'kdDiag1' => $request->kdDiag1,
            'nmDiag1' => $request->nmDiag1,
            'kdDiag2' => $request->kdDiag2,
            'nmDiag2' => $request->nmDiag2,
            'kdDiag3' => $request->kdDiag3,
            'nmDiag3' => $request->nmDiag3,
            'tglEstRujuk' => $request->tglEstRujuk,
            'kdPPK' => $request->kdPPK,
            'nmPPK' => $request->nmPPK,
            'kdSubSpesialis' => $request->kdSubSpesialis,
            'nmSubSpesialis' => $request->nmSubSpesialis,
            'kdSarana' => $request->kdSarana,
            'nmSarana' => $request->nmSarana,
            'kdTACC' => $request->kdTACC,
            'nmTACC' => $request->nmTACC,
            'alasanTACC' => $request->alasanTACC,
        ];

        try {
            $rujuk = PcareRujukSubspesialis::create($data);
            if ($rujuk) {
                $this->insertSql(new PcareRujukSubspesialis(), $data);
                $dataEfktp = [
                    'noKunjungan' => $data['noKunjungan'],
                    'kdPpkAsal' => $request->kdPpkAsal,
                    'nmPpkAsal' => $request->nmPpkAsal,
                    'kdKR' => $request->kdKR,
                    'nmKR' => $request->nmKR,
                    'kdKC' => $request->kdKC,
                    'nmKC' => $request->nmKC,
                    'tglAkhirRujuk' => $request->tglAkhirRujuk,
                    'jadwal' => $request->jadwal,
                    'infoDenda' => $request->infoDenda ? $request->indoDenda : '-',
                ];
                try {
                    $rujukEfktp = EfktpPcareRujukSubspesialis::create($dataEfktp);
                    if ($rujukEfktp) {
                        $this->insertSql(new EfktpPcareRujukSubspesialis(), $dataEfktp);
                    }
                    $response = response()->json('SUKSES', 201);
                } catch (QueryException $e) {
                    return response()->json($e->errorInfo, 500);
                }
            }
            return response()->json(['SUKSES', $response], 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function print($noKunjungan)
    {
        $key = [
            'noKunjungan' => $noKunjungan
        ];
        $pcare = PcareRujukSubspesialis::where($key)->with('detail', 'pasien', 'regPeriksa')->first()->toArray();
        $setting = Setting::first();
        $pdf = PDF::loadView('content.print.rujukanVertikal', ['data' => $pcare, 'setting' => $setting])
            ->setPaper("a5", 'landscape')->setOptions(['defaultFont' => 'sherif', 'isRemoteEnabled' => true]);
        return $pdf->stream($pcare['noKunjungan']);
    }
}
