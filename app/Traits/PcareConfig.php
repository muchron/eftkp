<?php

namespace App\Traits;

use App\Models\BridgingPcareSetting;

trait PcareConfig
{

    public static function config()
    {
        $setting = BridgingPcareSetting::first();

        return $config = [
            'cons_id' => $setting->consId,
            'secret_key' => $setting->secretKey,
            'user_key' => $setting->userKey,
            'username' => $setting->user,
            'password' => $setting->password,
            'app_code' => $setting->appCode,
            'base_url' => $setting->baseUrl,
            'service_name' => $setting->service,
        ];
    }
}
