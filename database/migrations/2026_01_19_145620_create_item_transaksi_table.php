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
        Schema::create('item_transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_transaksi')->constrained('transaksi')->onDelete('cascade');
            $table->foreignUuid('id_produk')->constrained('produk');

            $table->enum('status_item', ['menunggu', 'dikirim', 'selesai'])->default('menunggu');

            $table->string('nama_produk');
            $table->string('nama_kategori');
            $table->integer('harga_satuan');
            $table->integer('qty')->default(1);
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_transaksi');
    }
};
