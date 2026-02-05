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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_pembeli')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('guest_session_id')->nullable()->index();
            $table->foreignUuid('id_produk')->constrained('produk')->onDelete('cascade');
            $table->enum('jenis_aktivitas', ['beri_rating','lihat', 'tambah_keranjang', 'transaksi']);
            $table->integer('skor_minat');
            $table->integer('frekuensi')->default(1);
            $table->timestamps();

            $table->unique(['id_pembeli', 'id_produk', 'jenis_aktivitas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
