<?php

use App\Models\Poliklinik;
use App\Models\Setting;


$settings = Setting::select()->get();

foreach ($settings as $setting) {
    $setting->logo = 'data:image/jpeg;base64,'.base64_encode($setting->logo);
    $setting->wallpaper = 'data:image/jpeg;base64,'.base64_encode($setting->wallpaper);
}

Route::get('/antrean/poliklinik', function () use ($setting) {

    return view('antrean.poliklinik', ['data' => $setting]);
});

Route::get('/antrean/poliklinik/v2', function () use ($setting) {
    $poliklinik = Poliklinik::where('status', '1')
        ->whereNot('nm_poli', '-')
        ->get();
    return view('antrean.poliklinik2', ['data' => $setting, 'poliklinik' => $poliklinik]);
});