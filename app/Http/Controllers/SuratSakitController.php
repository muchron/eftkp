<?php

namespace App\Http\Controllers;

use App\Traits\Track;
use App\Models\Setting;
use App\Models\SuratSakit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\QueryException;
use Riskihajar\Terbilang\Facades\Terbilang;

class SuratSakitController extends Controller
{
    use Track;
    function get(Request $request)
    {
        $suratSakit = SuratSakit::where('tanggalawal', date('Y-m-d'))
            ->with(['regPeriksa' => function ($q) {
                return $q->with('pasien', 'pemeriksaanRalan', 'diagnosa');
            }])
            ->get();
        if ($request->tgl_pertama && $request->tgl_kedua) {
            $suratSakit = SuratSakit::whereBetween('tanggalawal', [$request->tgl_pertama, $request->tgl_kedua])
                ->with(['regPeriksa' => function ($q) {
                    return $q->with('pasien', 'pemeriksaanRalan', 'diagnosa');
                }])
                ->get();
        }

        if ($request->no_rawat) {
            $suratSakit = SuratSakit::where('no_rawat', $request->no_rawat)->with(['regPeriksa' => function ($q) {
                return $q->with('pasien', 'pemeriksaanRalan', 'diagnosa', 'prosedur');
            }])->first();
        }
        if ($request->dataTable) {
            return DataTables::of($suratSakit)->make(true);
        }

        return response()->json($suratSakit);
    }
    function setNoSurat(Request $request)
    {
        $tgl_surat = $request->tgl_surat ? $request->tgl_surat :  date('Y-m-d');
        $surat = SuratSakit::select('no_surat')->where('tanggalawal', $tgl_surat)->orderBy('no_surat', 'DESC')->first();
        $strTanggal = date('Ymd');
        if (!$surat) {
            $no = '001';
        } else {
            $noAkhir = substr($surat->no_surat, -3);
            $no = (int)$noAkhir + 1;
            $no = sprintf('%03d', $no);
        }
        $no = "SKS{$strTanggal}{$no}";

        return response()->json($no);
    }
    function create(Request $request)
    {
        $terbilang = ucwords(Terbilang::make($request->lama));
        $data = [
            'no_surat' => $request->no_surat,
            'no_rawat' => $request->no_rawat,
            'tanggalawal' => date('Y-m-d', strtotime($request->tanggalawal)),
            'tanggalakhir' => date('Y-m-d', strtotime($request->tanggalakhir)),
            'lamasakit' => "{$request->lama} ({$terbilang})"
        ];

        try {
            $surat = SuratSakit::create($data);
            $this->insertSql(new SuratSakit(), $data);
            return response()->json('SUKES', 201);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function delete($noSurat)
    {
        try {
            $surat = SuratSakit::where('no_surat', $noSurat)->delete();
            if ($surat) {
                $this->deleteSql(new SuratSakit(), ['no_surat' => $noSurat]);
            }
            return response()->json('SUKSES', 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo);
        }
    }

    function print($noSurat)
    {
        return $surat = SuratSakit::with(['regPeriksa' => function ($q) {
            return $q->with(['dokter', 'pasien.kel', 'pasien.kec', 'pasien.kab', 'pasien.perusahaanPasien']);
        }, 'pemeriksaanRalan', 'diagnosa.penyakit'])->where('no_surat', $noSurat)->first();
        $setting = Setting::first();

        if ($surat->diagnosa) {
            $diagnosa =  collect($surat->diagnosa)->map(function ($dx) {
                return $dx->penyakit->nm_penyakit;
            })->join(';');
        } else {
            $diagnosa = '-';
        }

        $data = [
            'no_surat' => $surat->no_surat,
            'nm_pasien' => $surat->regPeriksa->pasien->nm_pasien,
            'umur' => "{$surat->regPeriksa->umurdaftar} {$surat->regPeriksa->sttsumur}",
            'jk' => $surat->regPeriksa->pasien->jk == 'L' ? 'Laki-laki' : 'Perempuan',
            'pekerjaan' => $surat->regPeriksa->pasien->pekerjaan,
            'instansi' => $surat->regPeriksa->pasien->perusahaanPasien->nama_perusahaan,
            'alamat' => "{$surat->regPeriksa->pasien->alamat}, {$surat->regPeriksa->pasien->kel->nm_kel}, {$surat->regPeriksa->pasien->kec->nm_kec}, {$surat->regPeriksa->pasien->kab->nm_kab}",
            'lama' => $surat->lamasakit,
            'diagnosa' => $diagnosa,
            'tgl_awal' => $surat->tanggalawal,
            'tgl_akhir' => $surat->tanggalakhir,
            'dokter' => $surat->regPeriksa->dokter->nm_dokter,
            'sip' => $surat->regPeriksa->dokter->no_ijn_praktek,
            'nama_instansi' => $setting->nama_instansi,
            'alamat_instansi' => "{$setting->alamat_instansi}, {$setting->kabupaten}, {$setting->propinsi}",
            'kontak' => $setting->kontak,
            'email' => $setting->email,
            'logo' => base64_encode($setting->logo),
        ];
        $pdf = Pdf::loadView('content.print.suratSakit', ['data' => $data])
            ->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'sherif', 'isRemoteEnabled' => true]);

        return $pdf->stream("{$data['no_surat']}.pdf");
    }
}
