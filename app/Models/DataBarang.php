<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'databarang';
    protected $guarded = [];
    public $timestamps;

    function satuan()
    {
        return $this->belongsTo(Satuan::class, 'kode_sat', 'kode_sat');
    }
    function satuanBesar()
    {
        return $this->belongsTo(SatuanBesar::class, 'kode_satbesar', 'kode_sat');
    }
    function jenis()
    {
        return $this->belongsTo(Jenis::class, 'kdjns', 'kdjns');
    }
    function mappingObat()
    {
        return $this->belongsTo(MappingObatPcare::class, 'kode_brng', 'kode_brng');
    }
}
