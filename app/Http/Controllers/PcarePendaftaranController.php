<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PcarePendaftaran;
use App\Traits\Track;
use Illuminate\Database\QueryException;
use Yajra\DataTables\DataTables;

class PcarePendaftaranController extends Controller
{
    use Track;
    function index()
    {
        return view('content.pcare.pendaftaran');
    }
    function get(Request $request)
    {
        if ($request->tgl_awal || $request->tgl_akhir) {
            $pcare = PcarePendaftaran::with(['pasien','regPeriksa'])->whereBetween('tglDaftar', [$request->tgl_awal, $request->tgl_akhir])->get();
        } else {
            $pcare = PcarePendaftaran::with(['pasien','regPeriksa'])->where('tglDaftar', date('Y-m-d'))->get();
        }
        if ($request->datatable) {
            return DataTables::of($pcare)->make(true);
        } else {
            return response()->json($pcare);
        }
    }
    function delete(Request $request){
        $key = ['no_rawat'=>$request->no_rawat];
        $pendaftaran = PcarePendaftaran::where($key);

        if($pendaftaran->first()){
            try {
                $delete = $pendaftaran->delete();
                if($delete){
                    $this->deleteSql(new PcarePendaftaran(), $key);
                }
                return response()->json('SUKSES', 200);
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
        }
    }
}
