<?php

namespace App\Http\Controllers;

use App\Models\RegPeriksa;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegPeriksaController extends Controller
{
    use Track;
    protected $regPeriksa;
    protected $relation = [];

    function __construct()
    {
        $this->regPeriksa = new RegPeriksa();
        $this->relation = [
            'dokter', 'pasien' => function ($q) {
                return $q->with(['kel', 'kec', 'kab', 'prop']);
            }, 'penjab', 'pemeriksaanRalan', 'diagnosa.penyakit', 'poliklinik.maping', 'dokter.maping', 'pcarePendaftaran', 'pasien.alergi', 'pcareRujukSubspesialis', 'pasien.cacatFisik',
            'kamarInap' => function ($q) {
                return $q->where('stts_pulang', '!=', 'Pindah Kamar')
                    ->with('kamar.bangsal');
            }
        ];
    }


    function setNoReg(Request $request)
    {
        $tgl_registrasi = $request->tgl_registrasi ? $request->tgl_registrasi : date('Y-m-d');
        $kd_dokter = $request->kd_dokter;
        $kd_poli = $request->kd_poli;

        $regPeriksa = $this->regPeriksa->select('no_reg')
            ->where('tgl_registrasi', $tgl_registrasi)
            ->orderBy('no_reg', 'DESC');

        if ($request->kd_dokter) {
            $regPeriksa = $regPeriksa->where('kd_dokter', $kd_dokter);
        }

        if ($request->kd_poli) {
            $regPeriksa = $regPeriksa->where('kd_poli', $kd_poli);
        }

        if (!$regPeriksa->first()) {
            $no = 1;
        } else {
            $urut = $regPeriksa->first();
            $no = (int)$urut->no_reg + 1;
        }
        $no_reg = sprintf('%03d', $no);
        return response()->json($no_reg);
    }

    function setNoRawat(Request $request)
    {
        $tgl_registrasi = $request->tgl_registrasi ? $request->tgl_registrasi : date('Y-m-d');
        $regPeriksa = $this->regPeriksa->select('no_rawat')
            ->where('tgl_registrasi', $tgl_registrasi)
            ->orderBy('no_rawat', 'DESC')->first();
        if (!$regPeriksa) {
            $no = '000001';
        } else {
            $no = explode('/', $regPeriksa->no_rawat)[3];
            $no = (int)$no + 1;
        }
        $no_reg = sprintf('%06d', $no);
        $tglRawat = date('Y/m/d', strtotime($tgl_registrasi));
        return response()->json("{$tglRawat}/{$no_reg}");
    }

    function setStatusPoli(Request $request)
    {
        $poli = RegPeriksa::where(['no_rkm_medis' => $request->no_rkm_medis, 'kd_poli' => $request->kd_poli])->first();
        if (!$poli) {
            return 'Baru';
        }
        return 'Lama';
    }


    function get(Request $req)
    {

        if ($req->tglAwal || $req->tglAkhir) {
            // jika ada filter tanggal, ambil tgl registrasi yang ditentukan
            $regPeriksa = $this->regPeriksa->with($this->relation)->whereBetween('tgl_registrasi', [$req->tglAwal, $req->tglAkhir])->orderBy('no_reg', 'ASC')->get();
        } else {
            $regPeriksa = $this->regPeriksa->with($this->relation)->where('tgl_registrasi', date('Y-m-d'))->orderBy('no_reg', 'ASC')->get();
        }

        if($req->dokter){
            $regPeriksa = $regPeriksa->where('kd_dokter', $req->dokter);
        }

        if ($req->dataTable) {
            return DataTables::of($regPeriksa)->make(true);
        }
        return response()->json($regPeriksa, 200);
    }
    function show(Request $req)
    {
        $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)
            ->with($this->relation)->first();
        return response()->json($regPeriksa, 200);
    }
    function update(Request $req)
    {
        $data = $req->except('_token');
        try {
            $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)->update($data);
            if ($regPeriksa) {
                return response()->json(['Berhasil mengubah data registrasi', $regPeriksa]);
            }
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'no_reg' => $request->no_reg,
            'tgl_registrasi' => date('Y-m-d', strtotime($request->tgl_registrasi)),
            'jam_reg' => $request->jam_reg,
            'kd_dokter' => $request->kd_dokter,
            'kd_poli' => $request->kd_poli,
            'kd_pj' => $request->kd_pj,
            'no_rkm_medis' => $request->no_rkm_medis,
            'umurdaftar' => explode(' ', $request->umurdaftar)[0],
            'sttsumur' => explode(' ', $request->umurdaftar)[1],
            'p_jawab' => $request->namakeluarga,
            'hubunganpj' => $request->keluarga,
            'almt_pj' => $request->alamatpj,
            'stts' => 'Belum',
            'stts_daftar' => $request->status,
            'biaya_reg' => '0',
            'status_lanjut' => 'Ralan',
            'status_bayar' => 'Belum Bayar',
            'status_poli' => $this->setStatusPoli(new \Illuminate\Http\Request([
                'no_rkm_medis' => $request->no_rkm_medis,
                'kd_poli' => $request->kd_poli,
            ])),
        ];


        $regPeriksa = RegPeriksa::where([
            'no_rkm_medis' => $data['no_rkm_medis'],
            'kd_dokter' => $data['kd_dokter'],
            'kd_poli' => $data['kd_poli'],
            'tgl_registrasi' => $data['tgl_registrasi'],
        ])->first();

        if ($regPeriksa) {
            return response()->json("Pasien sudah terdaftar di Poli yang sama dengan dokter yang sama", 409);
        }

        try {
            $regPeriksa = RegPeriksa::create($data);
            $this->insertSql(new RegPeriksa(), $data);
            $pasien = new PasienController();
            $pasien->updateUmur(new \Illuminate\Http\Request([
                'no_rkm_medis' => $request->no_rkm_medis,
                'umur' => $request->umur,
            ]));
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function getPanggil(Request $request)
    {
        $panggil = RegPeriksa::where('tgl_registrasi', date('Y-m-d'))
            ->where('stts', 'Berkas Diterima')
            ->with($this->relation)
            ->first();
        return response()->json($panggil);
    }

    function getKecamatan(Request $request) : object
    {
        $grafikKelurahan = $this->getGrafik($request);
        $grafikKelurahan = json_decode($this->getGrafik($request));
        $regPeriksa = collect($grafikKelurahan)->groupBy(['pasien.kec.nm_kec'])->map->count()->take(10);
        return response()->json($regPeriksa);

    }
    function getKelurahan(Request $request) : object
    {
        $grafikKelurahan = $this->getGrafik($request);
        $regPeriksa = collect($grafikKelurahan)->groupBy(['pasien.kel.nm_kel'])->map->count()->take(10);
        return response()->json($regPeriksa);
    }

    function getGrafik(Request $request):object
    {
        $regPeriksa = $this->regPeriksa->with($this->relation);

        if($request->tgl1 && $request->tgl2){
            $tgl1 = date("Y-m-d", strtotime($request->tgl1));
            $tgl2 = date("Y-m-d", strtotime($request->tgl2));

            $regPeriksa = $regPeriksa->whereBetween('tgl_registrasi', [$tgl1, $tgl2]);
        }else{
            $regPeriksa->whereYear('tgl_registrasi', date('Y'))
                ->whereMonth('tgl_registrasi', date('m'));
        }
        return $regPeriksa->get();

    }
}
