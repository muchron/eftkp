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
            $delete = BridgingPcareSetting::truncate();
            if ($delete) {
                $this->deleteSql(new BridgingPcareSetting(), ['id' => $pcareSetting->id]);
            }
        }
        try {
            $post = BridgingPcareSetting::create($request->except(['_token', 'consIdExisting']));
            if ($post) {
                $this->insertSql(new BridgingPcareSetting(), $request->except(['_token', 'consIdExisting']));
            }
            return redirect('setting/pcare')->with('status', ['title' => 'Berhasil', 'message' => 'Menambahkan profile setting bridging PCARE']);
        } catch (QueryException $e) {
            return response()->json($e->errorInfo, 500);
        }
    }
}
