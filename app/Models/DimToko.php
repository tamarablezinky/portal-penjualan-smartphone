<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimToko extends Model
{
    protected $table = 'dim_toko';
    protected $fillable = ['nama_toko', 'kota'];

    public $timestamps = false;

    public function penjualan()
    {
        return $this->hasMany(FactPenjualan::class, 'toko_id');
    }
}
