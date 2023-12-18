<?php

namespace App\Http\Controllers;

use App\Models\BridgingPcareSetting;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BridgingPcareSettingController extends Controller
{
    use Track;
    function index()
    {
        $pcareSetting = BridgingPcareSetting::first();
        return view('content.setting', ['data' => $pcareSetting]);
    }
    function create(Request $request)
    {
        $pcareSetting = BridgingPcareSetting::first();
        if ($pcareSetting) {
            return $this->update($request);
        }
        try {
            $post = BridgingPcareSetting::create($request->all());
            if ($post) {
                $this->insertSql(new BridgingPcareSetting(), $request->all());
            }
            return redirect('setting/pcare')->with('status', ['title'=> 'Berhasil', 'message'=>'Menambahkan profile setting bridging PCARE']);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }

    function update(Request $request)
    {
        $key = ['consId' => $request->consId];
        try {
            $post = BridgingPcareSetting::where($key)->update($request->all());
            if ($post) {
                $this->updateSql(new BridgingPcareSetting(), $request->all(), $key);
            }
            return redirect('setting/pcare')->with('status', ['title'=> 'Berhasil', 'message' => 'Mengubah profile setting bridging PCARE']);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}