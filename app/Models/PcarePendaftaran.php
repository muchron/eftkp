<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcarePendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pcare_pendaftaran';
    protected $guard = [];
    public $timestamps = false;
}
