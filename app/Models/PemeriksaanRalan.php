<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanRalan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan_ralan';
    protected $guarded = [];
    public $timestamps = false;

    function regPeriksa()
    {
        return $this->belongsTo(RegPeriksa::class, 'no_rawat', 'no_rawat');
    }
    function diagnosa()
    {
        return $this->hasMany(DiagnosaPasien::class, 'no_rawat', 'no_rawat');
    }
    function prosedur()
    {
        return $this->hasMany(ProsedurPasien::class, 'no_rawat', 'no_rawat');
    }
}
