<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_kategori')->constrained('kategori')->onDelete('cascade');
            $table->foreignUuid('id_toko')->constrained('toko')->onDelete('cascade');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->enum('status_stok', ['tersedia', 'kosong'])->default('tersedia');
            $table->integer('jumlah_terjual')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
