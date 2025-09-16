<?php

namespace App\Http\Controllers;

use App\Models\SetAkunRalan;
use App\Models\TindakanDokter;
use App\Traits\ResponseHandlerTrait;
use DB;
use Exception;
use Illuminate\Http\Request;

class TindakanDokterController extends Controller
{
    use ResponseHandlerTrait;
    function create(Request $request)
    {
        $data = $request->all();

        try {
            $tindakan = (new \App\Action\TindakanDokterAction())->handleCreate($data);
            return $this->success($tindakan['data']);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);

        }
    }

    function delete(Request $request)
    {
        $data = $request->all();
        try {
            $tindakan = (new \App\Action\TindakanDokterAction())->handleDelete($data);
            return $this->success($tindakan);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function get(Request $request)
    {
        $data = TindakanDokter::with(['tindakan', 'dokter', 'pasien', 'regPeriksa'])
            ->where('no_rawat', $request->no_rawat)->get();
        return $this->success($data);
    }






}
