<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    function create(Request $request)
    {
        $data = [
            'no_rawat' => $request->no_rawat,
            'status' => $request->status,
        ];
    }
}
