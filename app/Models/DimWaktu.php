<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    protected $table = 'dim_waktu';
    protected $fillable = ['tanggal', 'bulan', 'tahun', 'kuartal'];

    public $timestamps = false;

    public function penjualan()
    {
        return $this->hasMany(FactPenjualan::class, 'waktu_id');
    }
}
