<?php

namespace App\Http\Controllers;

use App\Models\SetAkunRalan;
use DB;
use Illuminate\Http\Request;

class TindakanDokterController extends Controller
{
    function create(Request $request)
    {
        $data = $request->all();

        // $setAkunRalan = SetAkunRalan::first();

        $setAkunRalan = DB::table('set_akun_ralan')
            ->first();


        return response()->json([
            'status' => 'success',
            'akun' => $setAkunRalan,
            'data' => $data
        ]);
    }

    function getRekeningMapping()
    {
        $rekening = DB::table('set_akun_ralan')
            ->first();
        return [
            'Suspen_Piutang_Tindakan_Ralan' => $rekening->Suspen_Piutang_Tindakan_Ralan,
            'Tindakan_Ralan' => $rekening->Tindakan_Ralan,
            'Beban_Jasa_Medik_Dokter_Tindakan_Ralan' => $rekening->Beban_Jasa_Medik_Dokter_Tindakan_Ralan,
            'Utang_Jasa_Medik_Dokter_Tindakan_Ralan' => $rekening->Utang_Jasa_Medik_Dokter_Tindakan_Ralan,
            'Beban_KSO_Tindakan_Ralan' => $rekening->Beban_KSO_Tindakan_Ralan,
            'Utang_KSO_Tindakan_Ralan' => $rekening->Utang_KSO_Tindakan_Ralan,
            'Beban_Jasa_Sarana_Tindakan_Ralan' => $rekening->Beban_Jasa_Sarana_Tindakan_Ralan,
            'Utang_Jasa_Sarana_Tindakan_Ralan' => $rekening->Utang_Jasa_Sarana_Tindakan_Ralan,
            'Beban_Jasa_Menejemen_Tindakan_Ralan' => $rekening->Beban_Jasa_Menejemen_Tindakan_Ralan,
            'Utang_Jasa_Menejemen_Tindakan_Ralan' => $rekening->Utang_Jasa_Menejemen_Tindakan_Ralan,
            'HPP_BHP_Tindakan_Ralan' => $rekening->HPP_BHP_Tindakan_Ralan,
            'Persediaan_BHP_Tindakan_Ralan' => $rekening->Persediaan_BHP_Tindakan_Ralan,
        ];

    }

    function createTampJurnal(array $rekening, int $totals)
    {
        DB::table('tampjurnal')->delete();
    }

}
