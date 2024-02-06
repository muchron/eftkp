<?php

namespace App\Http\Controllers;

use App\Models\PenilaianAwalKeperawatanRalan;
use App\Traits\Track;
use Illuminate\Http\Request;

class PenilaianAwalKeperawatanRalanController extends Controller
{
    use Track;
    function get(Request $request)
    {
        $penilaian = PenilaianAwalKeperawatanRalan::where('no_rawat', $request->no_rawat)
            ->with('regPeriksa', 'pegawai')->first();
        return response()->json($penilaian);
    }

    function createPenilaian(Request $request)
    {
        $penilaian = PenilaianAwalKeperawatanRalan::where('no_rawat', $request->no_rawat)->first();
        if ($penilaian) {
            return $this->updatePenilaian($request);
        }

        try {
            $data = [
                'no_rawat' => $request->no_rawat,
                'tanggal' => date('Y-m-d H:i:s'),
                'td' => $request->td,
                'nadi' => $request->nadi,
                'rr' => $request->rr,
                'suhu' => $request->suhu,
                'gcs' => '-',
                'bb' => $request->bb,
                'tb' => $request->tb,
                'bmi' => $request->bmi,
                'keluhan_utama' => $request->keluhan,
                'rpd' => '-',
                'rpk' => '-',
                'rpo' => $request->rpo,
                'alergi' => $request->alergi,
                'alat_bantu' => $request->alat_bantu,
                'ket_bantu' => $request->ket_bantu,
                'prothesa' => '-',
                'ket_pro' => '-',
                'adl' => $request->adl,
                'status_psiko' => $request->status_psiko,
                'ket_psiko' => '-',
                'hub_keluarga' => $request->hub_keluarga,
                'tinggal_dengan' => $request->tinggal_dengan,
                'ekonomi' => $request->ekonomi,
                'budaya' => '-',
                'ket_budaya' => $request->ket_buaday,


            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function updatePenilaian(Request $request)
    {
    }
}
