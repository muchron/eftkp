<?php

namespace App\Http\Controllers;

use AamDsam\Bpjs\PCare\PcareService;
use App\Models\PcareKunjungan;
use App\Models\PcarePendaftaran;
use App\Models\PcareRujukSubspesialis;
use App\Models\Setting;
use App\Traits\Track;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PcareKunjunganController extends Controller
{
    use Track;

    function index()
    {
        return view('content.pcare.kunjungan');
    }
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


        $dataRujuk = new \Illuminate\Http\Request($data);

        try {
            $pcare = PcareKunjungan::create($data);
            if ($data['kdStatusPulang'] == '04') {
                $rujuk = new PcareRujukSubspesialisController();
                $rujuk->create($dataRujuk);
            }
            if ($pcare) {
                $this->insertSql(new PcareKunjungan(), $data);
            }
            return response()->json(['SUKSES'], 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function get(Request $request)
    {
        if ($request->tgl_awal || $request->tgl_akhir) {
            $pcare = PcareKunjungan::with('pasien')->whereBetween('tglDaftar', [$request->tgl_awal, $request->tgl_akhir])->get();
        } else {
            $pcare = PcareKunjungan::with('pasien')->where('tglDaftar', date('Y-m-d'))->get();
        }
        if ($request->datatable) {
            return DataTables::of($pcare)->make(true);
        } else {
            return response()->json($pcare);
        }
    }

    function delete($noKunjungan)
    {
        $kunjungan = PcareKunjungan::where('noKunjungan', $noKunjungan);
        if ($kunjungan) {
            try {
                $delete = $kunjungan->delete();
                if ($delete) {
                    $this->deleteSql(new PcareKunjungan(), ['noKunjungan' => $noKunjungan]);
                    $rujukan = new PcareRujukSubspesialisController();
                    $deleteRujuk = $rujukan->delete($noKunjungan);
                    if($deleteRujuk){
                        $this->deleteSql(new PcareRujukSubspesialis(), ['noKunjungan' => $noKunjungan]);
                    }
                }
                return response()->json('SUKSES', 200);
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
        }
    }

    function print($noKunjungan)
    {
        $key = [
            'noKunjungan' => $noKunjungan,
        ];
        $pcare = PcareKunjungan::where($key)->first();
        $setting = Setting::first();
        $pdf = PDF::loadView('content.print.rujukanVertikal', ['data' => $pcare, 'setting' => $setting])
            ->setPaper("a5", 'landscape')->setOptions(['defaultFont' => 'sherif', 'isRemoteEnabled' => true]);
        return $pdf->stream($pcare->noKunjungan);
    }
}
