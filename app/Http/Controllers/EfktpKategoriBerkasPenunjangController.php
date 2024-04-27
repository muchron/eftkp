<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\EfktpKategoriBerkasPenunjang;

class EfktpKategoriBerkasPenunjangController extends Controller
{
    function get(Request $request): JsonResponse
    {
        $kategoris = EfktpKategoriBerkasPenunjang::where('kategori', 'like', "%$request->kategori%")->get();
        return response()->json($kategoris);
    }
}
