<?php

namespace App\Models;

use App\Models\Penjab;
use App\Models\Propinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RegPeriksa;
use App\Models\EfktpPcareAlergi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    function penjab()
    {
        return $this->hasOne(Penjab::class, 'kd_pj', 'kd_pj');
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
    function instansi()
    {
        return $this->hasOne(PerusahaanPasien::class, 'kode_perusahaan', 'perusahaan_pasien');
    }
}
