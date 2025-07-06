<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fact_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('dim_produk')->onDelete('cascade');
            $table->foreignId('waktu_id')->constrained('dim_waktu')->onDelete('cascade');
            $table->foreignId('toko_id')->constrained('dim_toko')->onDelete('cascade');
            $table->integer('jumlah_terjual');
            $table->bigInteger('total_pendapatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fact_penjualan');
    }
};
