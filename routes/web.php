<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegPeriksaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        return view('content.dashboard');
    });
    Route::get('/registrasi', function () {
        return view('content.registrasi');
    });
    Route::get('/registrasi/get', [RegPeriksaController::class, 'get', 'get']);
});
