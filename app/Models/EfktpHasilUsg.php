<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EfktpHasilUsg extends Model
{
	use HasFactory, Compoships;

	protected $table = 'efktp_hasil_usg';
	protected $primaryKey = 'no_rawat';
	protected $keyType = 'string';

	protected $guarded = false;


}
