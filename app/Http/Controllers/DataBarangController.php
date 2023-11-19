<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    function get(Request $request)
    {
        if ($request) {
            $barang = DataBarang::where('nama_brng', 'like', '%' . $request->barang . '%')
                ->whereHas('jenis', function ($query) {
                    return $query->where('nama', 'not like', '%ALKES%')->where('nama', 'not like', 'logistik');
                })
                ->get();
        } else {
            $barang = DataBarang::whereHas('jenis', function ($query) {
                return $query->where('nama', 'not like', '%ALKES%')->where('nama', 'not like', 'logistik');
            })->limit(10)->get();
        }
        return response()->json($barang);
    }
}
