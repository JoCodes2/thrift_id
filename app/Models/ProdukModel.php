<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'produk';

    protected $fillable = [
        'id',
        'id_kategori',
        'id_toko',
        'nama_produk',
        'harga',
        'status_stok',
        'jumlah_terjual',
    ];

    /**
     * Relasi ke Kategori
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(TokoModel::class, 'id_toko');
    }
}
