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
        Schema::create('rekomendasi_pengguna', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_pembeli')->constrained('users');
            $table->foreignUuid('id_produk')->constrained('produk');
            $table->float('prediksi_skor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_pengguna');
    }
};
