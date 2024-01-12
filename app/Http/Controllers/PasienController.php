<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\setNoRkmMedis;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PasienController extends Controller
{
    use Track;
    function getByNoka($noKartu)
    {
        $pasien = Pasien::where('no_peserta', $noKartu)->with('regPeriksa', function ($q) use ($noKartu) {
            $q->where('tgl_registrasi', date('Y-m-d'));
        })->first();
        return response()->json($pasien);
    }

    function getRiwayat(Request $request)
    {
        $riwayat = Pasien::where(['no_rkm_medis' => $request->no_rkm_medis])->with(['regPeriksa' => function ($query) {
            return $query->whereIn('stts', ['Sudah', 'Dirujuk'])->with(['diagnosa.penyakit', 'prosedur.icd9'])->orderBy('tgl_registrasi', 'DESC');
        }])->first();
        return response()->json($riwayat);
    }
    function get(Request $request)
    {
        $pasien = Pasien::with(['kel', 'kec', 'kab', 'prop', 'penjab', 'regPeriksa']);
        if ($request->no_rkm_medis) {
            $pasien = $pasien->where('no_rkm_medis', $request->no_rkm_medis)->first();
        }
        if ($request->datatable) {
            $pasien = $pasien->orderBy('tgl_daftar', 'ASC')->limit(100)->get();
            return DataTables::of($pasien)->make(true);
        }
        return response()->json($pasien);
    }
    function create(Request $request)
    {
        $data = [
            'no_rkm_medis' => $request->no_rkm_medis,
            'nm_pasien' => $request->nm_pasien,
            'no_ktp' => $request->no_ktp,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
            'nm_ibu' => $request->nm_ibu,
            'alamat' => $request->alamat,
            'gol_darah' => $request->gol_darah,
            'pekerjaan' => $request->pekerjaan,
            'stts_nikah' => $request->stts_nikah,
            'agama' => $request->agama,
            'tgl_daftar' => date('Y-m-d', strtotime($request->tgl_daftar)),
            'no_tlp' => $request->no_tlp,
            'umur' => $request->umur,
            'pnd' => $request->pnd,
            'keluarga' => $request->keluarga,
            'namakeluarga' => $request->namakeluarga,
            'kd_pj' => $request->kd_pj,
            'no_peserta' => $request->no_peserta,
            'kd_kel' => $request->kd_kel,
            'kd_kec' => $request->kd_kec,
            'kd_kab' => $request->kd_kab,
            'pekerjaanpj' => $request->pekerjaanpj,
            'alamatpj' => $request->alamatpj != '-' ? explode(', ', $request->alamatpj)[0] : '-',
            'kelurahanpj' => $request->alamatpj != '-' ? explode(', ', $request->alamatpj)[1] : '-',
            'kecamatanpj' => $request->alamatpj != '-' ? explode(', ', $request->alamatpj)[2] : '-',
            'kabupatenpj' => $request->alamatpj != '-' ? explode(', ', $request->alamatpj)[3] : '-',
            'propinsipj' => $request->alamatpj != '-' ? explode(', ', $request->alamatpj)[3] : '-',
            'perusahaan_pasien' => $request->perusahaan_pasien,
            'suku_bangsa' => $request->suku_bangsa,
            'bahasa_pasien' => $request->bahasa_pasien,
            'cacat_fisik' => $request->cacat_fisik,
            'email' => $request->email,
            'nip' => $request->nip,
            'kd_prop' => $request->kd_prop,
        ];

        try {
            $pasien = Pasien::create($data);
            if ($pasien) {
                $this->insertSql(new Pasien(), $data);
                $setRm = setNoRkmMedis::truncate();
                if ($setRm)
                    $this->deleteSql(new setNoRkmMedis(), ['no_rkm_medis' => $request->no_rkm_medis]);
                $createNoRm = setNoRkmMedis::create(['no_rkm_medis' => $request->no_rkm_medis]);
                if ($createNoRm)
                    $this->insertSql(new setNoRkmMedis(), ['no_rkm_medis' => $request->no_rkm_medis]);
            }
            return response()->json('SUKSES', 200);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
    function updateUmur(Request $request)
    {
        $key  = ['no_rkm_medis', $request->no_rkm_medis];
        $umur = ['umur' => $request->umur];
        try {
            $pasien = Pasien::where($key)->update($umur);
            if ($pasien) {
                $this->updateSql(new Pasien(), $umur, $key);
            }
            return response()->json('SUKSES');
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
