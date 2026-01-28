<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeskripsiprodukModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'deskripsi_produk';

    protected $fillable = [
        'id',
        'produk_id',
        'deskripsi',
        'gambar',
        'bahan',
        'ukuran',
        'kondisi',
    ];

    /**
     * Relasi ke Kategori
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id');
    }
}
