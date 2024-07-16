<?php

namespace App\Traits;

use App\Models\BridgingPcareSetting;

trait PcareConfig
{

    public static function config()
    {
        $setting = BridgingPcareSetting::first();
        return $config = [
            'cons_id' => env('PCARE_CONS_ID'),
            'secret_key' => env('PCARE_SECRET_KEY'),
            'user_key' => env('PCARE_USER_KEY'),
            'base_url' => env('PCARE_BASE_URL'),
            'app_code' => env('PCARE_APP_CODE'),
            'icare_url' => env('ICARE_BASE_URL'),
            'username' => $setting->user,
            'password' => $setting->password,
            'user_icare' => $setting->userIcare,
            'password_icare' => $setting->passwordIcare,
        ];
    }
}
