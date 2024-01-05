<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RujukInternal extends Model
{

    use HasFactory, Compoships;
    protected $table = 'rujukan_internal_poli';
    protected $guarded = [];
    public $timestamps = false;

    function regPeriksa()
    {
        return $this->belongsTo(RegPeriksa::class, 'no_rawat', 'no_rawat');
    }
    function dokter()
    {
        return $this->belongsTo(Dokter::class, 'kd_dokter', 'kd_dokter');
    }
    function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'kd_poli', 'kd_poli');
    }
    function pemeriksaan()
    {
        return $this->hasOne(PemeriksaanRalan::class, ['no_rawat', 'nip'], ['no_rawat', 'kd_dokter']);
    }
}
