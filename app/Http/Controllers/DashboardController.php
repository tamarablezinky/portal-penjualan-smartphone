<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Grafik 1: Pendapatan per Bulan
        $bulanan = DB::table('fact_penjualan')
            ->join('dim_waktu', 'fact_penjualan.waktu_id', '=', 'dim_waktu.id')
            ->select('dim_waktu.bulan', DB::raw('SUM(fact_penjualan.total_pendapatan) as total'))
            ->groupBy('dim_waktu.bulan')
            ->orderByRaw("STR_TO_DATE(CONCAT('01 ', dim_waktu.bulan, ' 2024'), '%d %M %Y')")
            ->pluck('total', 'bulan');

        // Grafik 2: Jumlah per Merek
        $perMerek = DB::table('fact_penjualan')
            ->join('dim_produk', 'fact_penjualan.produk_id', '=', 'dim_produk.id')
            ->select('dim_produk.merek', DB::raw('SUM(jumlah_terjual) as total'))
            ->groupBy('dim_produk.merek')
            ->pluck('total', 'merek');

        // Grafik 3: Pie chart - Distribusi per Kota
        $perKota = DB::table('fact_penjualan')
            ->join('dim_toko', 'fact_penjualan.toko_id', '=', 'dim_toko.id')
            ->select('dim_toko.kota', DB::raw('SUM(jumlah_terjual) as total'))
            ->groupBy('dim_toko.kota')
            ->pluck('total', 'kota');

        // Grafik 4: Pendapatan per Tahun
        $perTahun = DB::table('fact_penjualan')
            ->join('dim_waktu', 'fact_penjualan.waktu_id', '=', 'dim_waktu.id')
            ->select('dim_waktu.tahun', DB::raw('SUM(total_pendapatan) as total'))
            ->groupBy('dim_waktu.tahun')
            ->pluck('total', 'tahun');

        // Grafik 5: Penjualan per Toko
        $perToko = DB::table('fact_penjualan')
            ->join('dim_toko', 'fact_penjualan.toko_id', '=', 'dim_toko.id')
            ->select('dim_toko.nama_toko', DB::raw('SUM(jumlah_terjual) as total'))
            ->groupBy('dim_toko.nama_toko')
            ->pluck('total', 'nama_toko');

        // Grafik 6: Jumlah Terjual per Tahun
        $jumlahTahun = DB::table('fact_penjualan')
            ->join('dim_waktu', 'fact_penjualan.waktu_id', '=', 'dim_waktu.id')
            ->select('dim_waktu.tahun', DB::raw('SUM(jumlah_terjual) as total'))
            ->groupBy('dim_waktu.tahun')
            ->pluck('total', 'tahun');

        return view('dashboard', [
            'bulanan' => $bulanan,
            'merek' => $perMerek,
            'kota' => $perKota,
            'tahunPendapatan' => $perTahun,
            'toko' => $perToko,
            'tahunJumlah' => $jumlahTahun,
        ]);
    }
}
