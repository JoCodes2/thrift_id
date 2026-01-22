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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_pembeli')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('id_produk')->constrained('produk')->onDelete('cascade');
            $table->integer('qty')->default(1);

            $table->timestamp('added_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
