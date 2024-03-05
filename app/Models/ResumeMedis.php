<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeMedis extends Model
{
    use HasFactory;
    protected $table = 'resume_pasien';
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

}
