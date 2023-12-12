<?php

namespace App\Http\Controllers;

use App\Models\PcareKunjungan;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PcareKunjunganController extends Controller
{
    use Track;
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'no_rkm_medis' => $request->no_rkm_medis,
            'nm_pasien' => $request->nm_pasien,
            'tglDaftar' => date('Y-m-d', strtotime($request->tgl_daftar)),
            "noKunjungan" => $request->noKunjungan,
            "noKartu" => $request->no_peserta,
            "kdPoli" => $request->kd_poli_pcare,
            "nmPoli" => $request->nm_poli_pcare,
            "keluhan" => $request->keluhan,
            "kdSadar" => $request->kesadaran,
            "nmSadar" => $request->nmSadar,
            "sistole" => $request->tensi != '-' ? explode('/', $request->tensi)[0] : '0',
            "diastole" => $request->tensi != '-' ? explode('/', $request->tensi)[1] : '0',
            "beratBadan" => $request->berat,
            "tinggiBadan" => $request->tinggi,
            "respRate" => $request->respirasi,
            "heartRate" => $request->nadi,
            "lingkarPerut" => $request->lingkar_perut,
            "terapi" => $request->instruksi,
            "kdStatusPulang" => $request->sttsPulang,
            "nmStatusPulang" => $request->nmStatusPulang,
            "tglPulang" => date('Y-m-d', strtotime($request->tglPulang)),
            "kdDokter" => $request->kd_dokter_pcare,
            "nmDokter" => $request->nm_dokter,
            "kdDiag1" => $request->kdDiagnosa1,
            "nmDiag1" => $request->diagnosa1,
            "kdDiag2" => $request->kdDiagnosa2,
            "nmDiag2" => $request->diagnosa2,
            "kdDiag3" => $request->kdDiagnosa3,
            "nmDiag3" => $request->diagnosa3,
        ];

        try {
            $pcare = PcareKunjungan::create($data);
            if ($pcare) {
                $this->insertSql(new PcareKunjungan(), $data);
            }
            return response()->json(['SUKSES'], 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
