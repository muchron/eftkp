<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function create(Request $request)
    {


        foreach ($request->file('file') as $key => $value) {
            $file[] = uniqid() . time() . $value->getClientOriginalExtension();
        }
        return $file;
    }
}
