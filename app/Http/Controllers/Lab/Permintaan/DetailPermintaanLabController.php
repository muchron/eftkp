<?php

namespace App\Http\Controllers\Lab\Permintaan;

use App\Traits\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lab\DetailPemeriksaanLab;
use App\Models\Lab\Permintaan\DetailPermintaanLab;

class DetailPermintaanLabController extends Controller
{
    use Track;
    protected $detail;

    public function __construct()
    {
        $this->detail = new DetailPermintaanLab();
    }

    function create(Request $request)
    {
        foreach ($request->data as $item => $value) {
            $data = [
                'noorder' => $value['noorder'],
                'id_template' => $value['id_template'],
                'kd_jenis_prw' => $value['kd_jenis_prw'],
                'stts_bayar' => 'Belum',
            ];
            try {
                $detail = $this->detail->create($data);
                if ($detail) {
                    $this->insertSql($this->detail, $data);
                }
            } catch (QueryException $e) {
                return response()->json($e->errorInfo, 500);
            }
        }
        return response()->json([
            'status' => 'Sukses',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
