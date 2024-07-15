<?php

namespace App\Models\Lab\Permintaan;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Lab\Permintaan\DetailPermintaanLab;
use App\Models\Lab\Permintaan\PermintaanPemeriksaanLab;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermintaanLab extends Model
{
    use Compoships;
    use HasFactory;

    protected $table = 'permintaan_lab';
    protected $guarded = [];
    public $timestamps = false;

    function pemeriksaan(): HasMany
    {
        return $this->hasMany(PermintaanPemeriksaanLab::class, 'noorder', 'noorder');
    }
    function detail(): HasMany
    {
        return $this->hasMany(DetailPermintaanLab::class, 'kd_jenis_prw', 'kd_jenis_prw');
    }
}
