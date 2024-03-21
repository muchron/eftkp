<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    function get(Request $request)
    {
        if ($request) {
            $barang = DataBarang::where('status', 1)
	            ->where('nama_brng', $request->barang)
	            ->orWhere('nama_brng', 'like', $request->barang."%")
	            ->orWhere('letak_barang', 'like', $request->barang . '%')
                ->whereHas('jenis', function ($query) {
                    return $query->where('nama', 'not like', '%ALKES%')->where('nama', 'not like', 'logistik');
                })->orderBy('nama_brng', 'ASC')
                ->get();
        } else {
            $barang = DataBarang::whereHas('jenis', function ($query) {
                return $query->where('nama', 'not like', '%ALKES%')->where('nama', 'not like', 'logistik');
            })->limit(10)->orderBy('nama_brng', 'ASC')->get();
        }
        return response()->json($barang);
    }
}
