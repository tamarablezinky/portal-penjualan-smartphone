<?php

namespace App\Http\Controllers;

use App\Models\DimProduk;
use App\Models\DimToko;
use App\Models\DimWaktu;
use App\Models\FactPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = FactPenjualan::with('produk', 'waktu', 'toko')->get();

        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        return view('penjualans.create', [
            'produks' => DimProduk::all(),
            'waktus' => DimWaktu::all(),
            'tokos' => DimToko::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'waktu_id' => 'required',
            'toko_id' => 'required',
            'jumlah_terjual' => 'required|integer',
            'total_pendapatan' => 'required|integer',
        ]);

        // Cek duplikasi berdasarkan produk + waktu
        $produkId = $request->produk_id;
        $waktuId = $request->waktu_id;

        $sudahAda = FactPenjualan::where('produk_id', $produkId)
            ->where('waktu_id', $waktuId)
            ->exists();

        if ($sudahAda) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['produk_id' => 'Data untuk produk dan bulan-tahun tersebut sudah ada. Tidak boleh diisi lagi.']);
        }

        FactPenjualan::create($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = FactPenjualan::findOrFail($id);

        return view('penjualans.edit', [
            'penjualan' => $penjualan,
            'produks' => DimProduk::all(),
            'waktus' => DimWaktu::all(),
            'tokos' => DimToko::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required',
            'waktu_id' => 'required',
            'toko_id' => 'required',
            'jumlah_terjual' => 'required|integer',
            'total_pendapatan' => 'required|integer',
        ]);

        // Cek duplikasi saat update (kecuali id sekarang)
        $produkId = $request->produk_id;
        $waktuId = $request->waktu_id;

        $sudahAda = FactPenjualan::where('produk_id', $produkId)
            ->where('waktu_id', $waktuId)
            ->where('id', '!=', $id)
            ->exists();

        if ($sudahAda) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['produk_id' => 'Data untuk produk dan bulan-tahun tersebut sudah ada. Tidak boleh duplikat.']);
        }

        $penjualan = FactPenjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }
}
