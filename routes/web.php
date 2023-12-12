<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\RegPeriksaController;
use App\Http\Controllers\MetodeRacikController;
use App\Http\Controllers\ResepDokterController;
use App\Http\Controllers\DiagnosaPasienController;
use App\Http\Controllers\Icd9Controller;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanRalanController;
use App\Http\Controllers\ProsedurPasienController;
use App\Http\Controllers\ResepDokterRacikanController;
use App\Http\Controllers\ResepDokterRacikanDetailController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Bridging as Bridging;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/', function () {
        return view('content.dashboard', ['data' => Setting::first()]);
    });

    // pasien
    Route::get('/pasien/riwayat', [PasienController::class, 'getRiwayat']);

    Route::get('/registrasi', function () {
        return view('content.registrasi');
    });
    Route::get('/registrasi/get', [RegPeriksaController::class, 'get']);
    Route::get('/registrasi/get/detail', [RegPeriksaController::class, 'show']);
    Route::post('/registrasi/update', [RegPeriksaController::class, 'update']);

    // Pemeriksaan
    Route::get('/pemeriksaan/ralan/get', [PemeriksaanRalanController::class, 'get']);
    Route::get('/pemeriksaan/ralan/show', [PemeriksaanRalanController::class, 'show']);
    Route::post('/pemeriksaan/ralan/create', [PemeriksaanRalanController::class, 'create']);


    // Dignosa/Penyakit
    Route::get('/penyakit/get', [PenyakitController::class, 'get']);

    // Prosedur/tindakan ata ic9
    Route::get('/tindakan/get', [Icd9Controller::class, 'get']);


    //Diagnosa Pasien
    Route::post('/diagnosa/pasien/create', [DiagnosaPasienController::class, 'create']);
    Route::post('/diagnosa/pasien/delete', [DiagnosaPasienController::class, 'delete']);
    Route::get('/diagnosa/pasien/get', [DiagnosaPasienController::class, 'get']);

    // Prosedur/tindakan
    Route::get('/prosedur/pasien/get', [ProsedurPasienController::class, 'get']);
    Route::post('/prosedur/pasien/create', [ProsedurPasienController::class, 'create']);
    Route::post('/prosedur/pasien/delete', [ProsedurPasienController::class, 'delete']);

    // Barang/obat
    Route::get('/barang/get', [DataBarangController::class, 'get']);


    // Resep Obat
    Route::post('/resep/create', [ResepObatController::class, 'create']);
    Route::get('/resep/get', [ResepObatController::class, 'get']);
    Route::post('/resep/delete', [ResepObatController::class, 'delete']);
    Route::get('/resep/print', [ResepObatController::class, 'print']);

    // Resep Dokter (NON RACIKAN)
    Route::post('/resep/dokter/create', [ResepDokterController::class, 'create']);
    Route::get('/resep/dokter/get', [ResepDokterController::class, 'get']);
    Route::post('/resep/dokter/delete', [ResepDokterController::class, 'delete']);
    Route::post('/resep/dokter/update', [ResepDokterController::class, 'update']);

    // Resep Racikan
    Route::get('/resep/racikan/get', [ResepDokterRacikanController::class, 'get']);
    Route::post('/resep/racikan/create', [ResepDokterRacikanController::class, 'create']);
    Route::post('/resep/racikan/delete', [ResepDokterRacikanController::class, 'delete']);

    // Detail resep racikam
    Route::get('resep/racikan/detail/get', [ResepDokterRacikanDetailController::class, 'get']);
    Route::post('resep/racikan/detail/create', [ResepDokterRacikanDetailController::class, 'create']);
    Route::post('resep/racikan/detail/delete', [ResepDokterRacikanDetailController::class, 'delete']);

    // Metode Racikan
    Route::get('/metode/racik/get', [MetodeRacikController::class, 'get']);
});
Route::get('/bridging/pcare/dokter', [\App\Http\Controllers\Bridging\Dokter::class, 'dokter']);
Route::get('/bridging/pcare/kunjungan', [Bridging\Kunjungan::class, 'get']);
Route::post('/bridging/pcare/kunjungan/post', [Bridging\Kunjungan::class, 'post']);
Route::get('/bridging/pcare/spesialis', [Bridging\Spesialis::class, 'get']);
Route::get('/bridging/pcare/spesialis/{kdSpesialis}/subspesialis', [Bridging\Spesialis::class, 'getSubspesialis']);
Route::get('/bridging/pcare/spesialis/sarana', [Bridging\Spesialis::class, 'getsarana']);
Route::get('/bridging/pcare/spesialis/rujukan', [Bridging\Spesialis::class, 'getFaskes']);
