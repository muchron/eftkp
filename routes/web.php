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
use App\Http\Controllers\PemeriksaanRalanController;
use App\Http\Controllers\ResepDokterRacikanController;

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

    //Diagnosa Pasien
    Route::post('/diagnosa/pasien/create', [DiagnosaPasienController::class, 'create']);

    // Barang/obat
    Route::get('/barang/get', [DataBarangController::class, 'get']);


    // Resep Obat
    Route::post('/resep/create', [ResepObatController::class, 'create']);
    Route::get('/resep/get', [ResepObatController::class, 'get']);
    Route::post('/resep/delete', [ResepObatController::class, 'delete']);

    // Resep Dokter (NON RACIKAN)
    Route::post('/resep/dokter/create', [ResepDokterController::class, 'create']);
    Route::get('/resep/dokter/get', [ResepDokterController::class, 'get']);
    Route::post('/resep/dokter/delete', [ResepDokterController::class, 'delete']);

    // Resep Racikan
    Route::get('/resep/racikan/get', [ResepDokterRacikanController::class, 'get']);
    Route::post('/resep/racikan/create', [ResepDokterRacikanController::class, 'create']);
    Route::post('/resep/racikan/delete', [ResepDokterRacikanController::class, 'delete']);

    // Metode Racikan
    Route::get('/metode/racik/get', [MetodeRacikController::class, 'get']);
});
