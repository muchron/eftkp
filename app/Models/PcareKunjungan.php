<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcareKunjungan extends Model
{
    use HasFactory;
    protected $table = 'pcare_kunjungan_umum';
    protected $guarded= [];
    public $timestamps = false;
}
