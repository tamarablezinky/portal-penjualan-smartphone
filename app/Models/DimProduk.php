<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimProduk extends Model
{
    protected $table = 'dim_produk';
    protected $fillable = ['merek', 'tipe', 'spesifikasi'];

    public $timestamps = true;

    public function penjualan()
    {
        return $this->hasMany(FactPenjualan::class, 'produk_id');
    }
}
