<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactPenjualan extends Model
{
    protected $table = 'fact_penjualan';
    protected $fillable = ['produk_id', 'waktu_id', 'toko_id', 'jumlah_terjual', 'total_pendapatan'];

    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(DimProduk::class, 'produk_id');
    }

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class, 'waktu_id');
    }

    public function toko()
    {
        return $this->belongsTo(DimToko::class, 'toko_id');
    }
}
