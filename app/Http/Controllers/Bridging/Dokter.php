<?php

namespace App\Http\Controllers\Bridging;

// use PCare\Kesadaran;
use AamDsam\Bpjs\PCare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dokter extends Controller
{
    public function __construct() {
    }

    function dokter(){
         $config = [
         'cons_id' => env('BPJS_PCARE_CONSID'),
         'secret_key' => env('BPJS_PCARE_SCREET_KEY'),
         'username' => env('BPJS_PCARE_USERNAME'),
         'password' => env('BPJS_PCARE_PASSWORD'),
         'app_code' => env('BPJS_PCARE_APP_CODE'),
         'base_url' => env('BPJS_PCARE_BASE_URL'),
         'service_name' => env('BPJS_PCARE_SERVICE_NAME'),
         ];
        //  return $config;
      $bpjs = new Pcare\Kunjungan($config);
      return $bpjs->riwayat('0001306194502')->index();
    }
}
