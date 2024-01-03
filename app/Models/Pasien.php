<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $guarded = [];
    public $timestamps = false;

    function regPeriksa()
    {
        return $this->hasMany(RegPeriksa::class, 'no_rkm_medis', 'no_rkm_medis');
    }
    function alergi()
    {
        return $this->hasMany(EfktpPcareAlergi::class, 'no_rkm_medis', 'no_rkm_medis');
    }
    function kel()
    {
        return $this->hasOne(Kelurahan::class, 'kd_kel', 'kd_kel');
    }
    function kec()
    {
        return $this->hasOne(Kecamatan::class, 'kd_kec', 'kd_kec');
    }
    function kab()
    {
        return $this->hasOne(Kabupaten::class, 'kd_kab', 'kd_kab');
    }
    function prop()
    {
        return $this->hasOne(Propinsi::class, 'kd_prop', 'kd_prop');
    }
}
