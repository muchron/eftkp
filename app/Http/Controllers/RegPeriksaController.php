<?php

namespace App\Http\Controllers;

use App\Traits\Track;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RegPeriksa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class RegPeriksaController extends Controller
{
    use Track;
    protected $regPeriksa;
    protected $poliklinik;
    protected $relation = [];

    function __construct()
    {
        $this->regPeriksa = new RegPeriksa();
        $this->poliklinik = new PoliklinikController();
        $this->relation = [
            'dokter', 'pasien' => function ($q) {
                return $q->with(['kel', 'kec', 'kab', 'prop']);
            }, 'penjab', 'pemeriksaanRalan', 'diagnosa' => function ($query) {
                return $query->orderBy('prioritas', 'ASC')->with('penyakit');
            }, 'prosedur' => function ($query) {
                return $query->orderBy('prioritas', 'ASC')->with('icd9');
            }, 'poliklinik.maping', 'dokter.maping', 'pcarePendaftaran', 'pasien.alergi', 'pcareRujukSubspesialis', 'pasien.cacatFisik',
            'kamarInap' => function ($q) {
                return $q->where('stts_pulang', '!=', 'Pindah Kamar')
                    ->with('kamar.bangsal');
            }
        ];
    }

    function setNoReg(Request $request): string
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
        return $no_reg;
    }

    function setNoRawat(Request $request): string
    {
        $tgl_registrasi = $request->tgl_registrasi ? date('Y-m-d', strtotime($request->tgl_registrasi)) : date('Y-m-d');
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
        return "{$tglRawat}/{$no_reg}";
    }

    function setStatusPoli(Request $request): string
    {
        $poli = RegPeriksa::where(['no_rkm_medis' => $request->no_rkm_medis, 'kd_poli' => $request->kd_poli])->first();
        if (!$poli) {
            return 'Baru';
        }
        return 'Lama';
    }

    function setStatusLayanan(Request $request): JsonResponse
    {
        $data = [
            'stts' => $request->stts,
            'no_rawat' => $request->no_rawat,
        ];

        $isValidated = $request->validate([
            'stts' => 'required',
            'no_rawat' => 'required',
        ]);

        try {
            $poli = RegPeriksa::where('no_rawat', $request->no_rawat)->update($data);
            if ($poli) {
                $this->updateSql(new RegPeriksa(), $data, ['no_rawat' => $request->no_rawat]);
            }
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
        return response()->json('SUKSES', 201);
    }


    function get(Request $req): JsonResponse
    {

        if ($req->tglAwal || $req->tglAkhir) {
            // jika ada filter tanggal, ambil tgl registrasi yang ditentukan
            $regPeriksa = $this->regPeriksa->with($this->relation)
                ->whereBetween('tgl_registrasi', [
                    date('Y-m-d', strtotime($req->tglAwal)),
                    date('Y-m-d', strtotime($req->tglAkhir))
                ])
                ->orderBy('no_reg', 'ASC')->get();
        } else {
            $regPeriksa = $this->regPeriksa->with($this->relation)->where('tgl_registrasi', date('Y-m-d'))->orderBy('no_reg', 'ASC')->get();
        }

        if ($req->dokter) {
            $regPeriksa = $regPeriksa->where('kd_dokter', $req->dokter);
        }
        if ($req->stts) {
            $regPeriksa = $regPeriksa->where('stts', $req->stts);
        }

        if ($req->dataTable) {
            return DataTables::of($regPeriksa)->make(true);
        }
        return response()->json($regPeriksa, 200);
    }
    function show(Request $req): JsonResponse
    {
        $regPeriksa = $this->regPeriksa->where('no_rawat', $req->no_rawat)
            ->with($this->relation)
            ->with('riwayatPemeriksaan.pegawai.dokter', 'pemeriksaanRanap.pegawai.dokter')
            ->first();
        return response()->json($regPeriksa, 200);
    }
    function update(Request $request): JsonResponse
    {
        $data = $request->except('token');

        $isValidate = $request->validate([
            'kd_poli' => 'required',
            'kd_dokter' => 'required',
            'no_rawat' => 'required',
            'kd_pj' => 'required',
        ]);

        try {
            $regPeriksa = $this->regPeriksa->where('no_rawat', $request->no_rawat)->update($data);
            if ($regPeriksa) {
                $this->updateSql(new RegPeriksa(), $data, [
                    'no_rawat' => $request->no_rawat,
                ]);
            }
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
        return response()->json(['Berhasil mengubah data registrasi', $request->no_rawat]);
    }


    function create(Request $request): JsonResponse
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
            'biaya_reg' => $this->poliklinik->getTarifPoliklinik($request->kd_poli),
            'status_lanjut' => 'Ralan',
            'status_bayar' => 'Belum Bayar',
            'status_poli' => $this->setStatusPoli(new \Illuminate\Http\Request([
                'no_rkm_medis' => $request->no_rkm_medis,
                'kd_poli' => $request->kd_poli,
            ])),
        ];


        $isValidate = $request->validate([
            'kd_poli' => 'required',
            'kd_dokter' => 'required',
            'no_rawat' => 'required',
            'kd_pj' => 'required',
        ]);

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

    function getPanggil(Request $request): JsonResponse
    {
        $panggil = RegPeriksa::where('tgl_registrasi', date('Y-m-d'))
            ->where('stts', 'Berkas Diterima')
            ->with($this->relation)
            ->with(['pcarePendaftaran' => function ($q) {
                return $q->select(['no_rawat', 'noUrut']);
            }])
            ->first();
        return response()->json($panggil);
    }

    function getKecamatan(Request $request): JsonResponse
    {
        $grafikKelurahan = $this->getGrafik($request);
        $regPeriksa = collect($grafikKelurahan)->groupBy(['pasien.kec.nm_kec'])->map->count()->sortDesc()->take(10);
        return response()->json($regPeriksa);
    }
    function getKelurahan(Request $request): JsonResponse
    {
        $grafikKelurahan = $this->getGrafik($request);
        $regPeriksa = collect($grafikKelurahan)->groupBy(['pasien.kel.nm_kel'])->map->count()->sortDesc()->take(10);
        return response()->json($regPeriksa);
    }

    function getGrafik(Request $request): Object
    {
        $regPeriksa = $this->regPeriksa->with($this->relation);

        if ($request->tgl1 && $request->tgl2) {
            $tgl1 = date("Y-m-d", strtotime($request->tgl1));
            $tgl2 = date("Y-m-d", strtotime($request->tgl2));

            $regPeriksa = $regPeriksa->whereBetween('tgl_registrasi', [$tgl1, $tgl2]);
        } else {
            $regPeriksa->whereYear('tgl_registrasi', date('Y'))
                ->whereMonth('tgl_registrasi', date('m'));
        }
        return $regPeriksa->get();
    }

    function getAllRegPasien($no_rkm_medis): JsonResponse
    {
        $regPeriksa = $this->regPeriksa->where('no_rkm_medis', $no_rkm_medis)
            ->whereNotIn('stts', ['Belum', 'Batal'])
            ->orderBy('tgl_registrasi', 'DESC')
            ->get();

        if ($regPeriksa->count()) {
            return response()->json($regPeriksa, 200);
        }
        return response()->json([''], 204);
    }
    function getGrafikTahunan(Request $request): JsonResponse
    {
        if ($request->tahun) {
            $tahun = $request->tahun;
        } else {
            $tahun = date('Y');
        }
        $regPeriksa = $this->regPeriksa
            ->select([DB::raw('YEAR(tgl_registrasi) as tahun, MONTH(tgl_registrasi) as bulan, count(*) as jumlah')])
            ->whereYear('tgl_registrasi', $tahun)
            ->with($this->relation)
            ->groupBy('bulan')
            ->get();
        return response()->json($regPeriksa, 200);
    }
    function print(Request $request)
    {
        $regPeriksa = RegPeriksa::select(['tgl_registrasi', 'jam_reg', 'kd_poli', 'kd_dokter', 'no_rkm_medis', 'no_reg', 'no_rawat', 'umurdaftar', 'sttsumur', 'kd_pj'])
            ->where('no_rawat', $request->no_rawat)
            ->with(['pasien' => function ($q) {
                return $q->select(['nm_pasien', 'alamat', 'kd_kel', 'no_rkm_medis', 'alamatpj', 'jk', 'tgl_lahir', 'no_peserta'])
                    ->with(['kel', 'kec', 'kab']);
            }, 'poliklinik', 'dokter', 'penjab', 'pcarePendaftaran'])->first();
        $setting = Setting::first();

        if ($request->width == '4') {
            $pdf = PDF::loadView('content.print.buktiRegister4', ['data' => $regPeriksa, 'setting' => $setting]);
            $pdf->setPaper([0, 0, $request->width * 28.3465, 300])->setOptions(['defaultFont' =>    'sherif', 'isRemoteEnabled' => true]);
        } else {
            $pdf = PDF::loadView('content.print.buktiRegister', ['data' => $regPeriksa, 'setting' => $setting]);
            $pdf->setPaper([0, 0, 8 * 28.3465, 400])->setOptions(['defaultFont' =>    'sherif', 'isRemoteEnabled' => true]);
        }
        return $pdf->stream('Bukti-Registrasi-' . date('Ymd') . $regPeriksa->no_rkm_medis . '.pdf');
    }
}
