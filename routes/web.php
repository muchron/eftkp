<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaPasienController;
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
use App\Http\Controllers\Bridging as Bridging;
use App\Http\Controllers\BridgingPcareSettingController;
use App\Http\Controllers\CacatFisikController;
use App\Http\Controllers\EfktpPcareAlergiController;
use App\Http\Controllers\EfktpTemplateRacikanController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PcareKunjunganController;
use App\Http\Controllers\PcarePendaftaranController;
use App\Http\Controllers\PcareRujukSubspesialisController;
use App\Http\Controllers\PenjabController;
use App\Http\Controllers\PerusahaanPasienController;
use App\Http\Controllers\PropinsiController;
use App\Http\Controllers\setNoRkmMedisController;
use App\Http\Controllers\SukuBangsaController;
use App\Models\SukuBangsa;

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
    Route::post('/pasien', [PasienController::class, 'create']);
    Route::get('/pasien/get/nokartu/{noKartu}', [PasienController::class, 'getByNoka']);

    // SUKU BANGSA
    Route::get('suku', [SukuBangsaController::class, 'get']);
    Route::post('suku', [SukuBangsaController::class, 'create']);
    // SUKU BAHASAS
    Route::get('bahasa', [BahasaPasienController::class, 'get']);
    Route::post('bahasa', [BahasaPasienController::class, 'create']);
    // CACAT FISIK
    Route::get('cacat', [CacatFisikController::class, 'get']);
    Route::post('cacat', [CacatFisikController::class, 'create']);
    // PENJAB
    Route::get('penjab', [PenjabController::class, 'get']);
    // KELURAHAN
    Route::get('kelurahan', [KelurahanController::class, 'get']);
    Route::post('kelurahan', [KelurahanController::class, 'create']);
    // KECAMATAN
    Route::get('kecamatan', [KecamatanController::class, 'get']);
    Route::post('kecamatan', [KecamatanController::class, 'create']);
    // KABUPATEN
    Route::get('kabupaten', [KabupatenController::class, 'get']);
    Route::post('kabupaten', [KabupatenController::class, 'create']);
    // PROPINSI
    Route::get('propinsi', [PropinsiController::class, 'get']);
    Route::post('propinsi', [PropinsiController::class, 'create']);
    // PERUSAHAAN
    Route::get('perusahaan', [PerusahaanPasienController::class, 'get']);
    Route::post('perusahaan', [PerusahaanPasienController::class, 'create']);
    // SET NO RKM MEDIS
    Route::get('/set/norm', [setNoRkmMedisController::class, 'get']);
    Route::post('/set/norm/delete', [setNoRkmMedisController::class, 'delete']);

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

    // Template Racikan
    Route::get('resep/racikan/template/get', [EfktpTemplateRacikanController::class, 'get']);
    Route::get('resep/racikan/template/search', [EfktpTemplateRacikanController::class, 'search']);
    Route::post('resep/racikan/template/create', [EfktpTemplateRacikanController::class, 'create']);


    Route::get('/pcare/pendaftaran', [PcarePendaftaranController::class, 'index']);
    Route::get('/pcare/pendaftaran/get', [PcarePendaftaranController::class, 'get']);
    Route::post('/pcare/pendaftaran/delete', [PcarePendaftaranController::class, 'delete']);

    // PCARE KUNJUNGAN
    Route::get('/pcare/kunjungan', [PcareKunjunganController::class, 'index']);
    Route::post('/pcare/kunjungan', [PcareKunjunganController::class, 'create']);
    Route::post('/pcare/kunjungan/update', [PcareKunjunganController::class, 'update']);
    Route::get('/pcare/kunjungan/get', [PcareKunjunganController::class, 'get']);
    Route::post('/pcare/kunjungan/delete/{noKunjungan}', [PcareKunjunganController::class, 'delete']);
    Route::post('/pcare/kunjungan/print/{noKunjungan}', [PcareKunjunganController::class, 'print']);

    // PCARE KUNJUNGAN RUJUK SUBSPESIALIS
    Route::post('/pcare/kunjungan/rujuk/subspesialis/', [PcareRujukSubspesialisController::class, 'create']);
    Route::post('/pcare/kunjungan/rujuk/subspesialis/update', [PcareRujukSubspesialisController::class, 'update']);
    Route::post('/pcare/kunjungan/rujuk/subspesialis/delete/{noKunjungan}', [PcareRujukSubspesialisController::class, 'delete']);
    Route::get('/pcare/kunjungan/rujuk/subspesialis/print/{noKunjungan}', [PcareRujukSubspesialisController::class, 'print']);
    Route::get('/pcare/kunjungan/rujuk/subspesialis/riwayat/{no_rkm_medis}', [PcareRujukSubspesialisController::class, 'getAll']);


    // SETTING
    Route::get('/setting/pcare', [BridgingPcareSettingController::class, 'index']);
    Route::post('/setting/pcare/post', [BridgingPcareSettingController::class, 'create']);

    // EFKTP
    Route::post('pasien/alergi', [EfktpPcareAlergiController::class, 'create']);
    Route::get('pasien/alergi', [EfktpPcareAlergiController::class, 'get']);

    // BRIDGING
    Route::get('/bridging/pcare/dokter', [\App\Http\Controllers\Bridging\Dokter::class, 'dokter']);

    // PENDAFTARAN 
    Route::get('/bridging/pcare/pendaftaran', [Bridging\Pendaftaran::class, 'get']);

    // KUNJUNGAN
    Route::get('/bridging/pcare/kunjungan/{nokartu}', [Bridging\Kunjungan::class, 'get']);
    Route::delete('/bridging/pcare/kunjungan/{nokartu}', [Bridging\Kunjungan::class, 'get']);
    Route::post('/bridging/pcare/kunjungan/post', [Bridging\Kunjungan::class, 'post']);
    Route::post('/bridging/pcare/kunjungan/update', [Bridging\Kunjungan::class, 'put']);
    Route::post('/bridging/pcare/kunjungan/delete/{noKunjungan}', [Bridging\Kunjungan::class, 'delete']);
    Route::get('/bridging/pcare/kunjungan/delete/{noKunjungan}', [Bridging\Kunjungan::class, 'delete']);
    Route::get('/bridging/pcare/kunjungan/rujukan/{noKunjungan}', [Bridging\Kunjungan::class, 'getRujukan']);

    // SPESIALIS
    Route::get('/bridging/pcare/spesialis', [Bridging\Spesialis::class, 'get']);
    Route::get('/bridging/pcare/spesialis/{kdSpesialis}/subspesialis', [Bridging\Spesialis::class, 'getSubspesialis']);
    Route::get('/bridging/pcare/spesialis/sarana', [Bridging\Spesialis::class, 'getsarana']);
    Route::get('/bridging/pcare/spesialis/rujukan', [Bridging\Spesialis::class, 'getFaskes']);

    // POLI FKTP
    Route::get('/bridging/pcare/fktp/poli', [Bridging\Poli::class, 'index']);
    Route::get('/bridging/pcare/tacc', [Bridging\Poli::class, 'tacc']);

    //REFERENSI SPESIALIS KHUSUS
    Route::get('/bridging/pcare/spesialis/khusus', [Bridging\Spesialis::class, 'getKhusus']);
    Route::get('/bridging/pcare/spesialis/rujuk/khusus', [Bridging\Spesialis::class, 'getFaskesKhusus']);


    // STATUS PULANG
    Route::get('/bridging/pcare/status/pulang/{status}', [Bridging\StatusPulang::class, 'get']);

    // PESERTA
    Route::get('/bridging/pcare/peserta/{noKartu}', [Bridging\Peserta::class, 'index']);
});
