<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MappingObatPcare;

class MappingObatPcareController extends Controller
{
    function get(Request $request)
    {
        $obat = MappingObatPcare::with('obat');
        if ($request->kode) {
            $obat = $obat->where('kode_brng',  $request->kode)->first();
        } else {
            $obat = $obat->get();
        }
        return response()->json($obat);
    }
}
