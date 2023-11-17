<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Penjab;
use App\Models\PemeriksaanRalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegPeriksa extends Model
{
    use HasFactory;
    protected $table = 'reg_periksa';
    protected $guarded = [];
    public $timestamps = false;

    function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rkm_medis', 'no_rkm_medis');
    }

    function dokter()
    {
        return $this->belongsTo(Dokter::class, 'kd_dokter', 'kd_dokter');
    }
    function penjab()
    {
        return $this->belongsTo(Penjab::class, 'kd_pj', 'kd_pj');
    }
    function pemeriksaanRalan()
    {
        return $this->hasOne(PemeriksaanRalan::class, 'no_rawat', 'no_rawat');
    }
}
