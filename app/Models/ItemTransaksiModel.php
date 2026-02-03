<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemTransaksiModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'item_transaksi';
    protected $fillable = [
        'id',
        'id_transaksi',
        'id_produk',
        'status_item',
        'nama_produk',
        'nama_kategori',
        'harga_satuan',
        'qty',
        'subtotal',
        'created_at',
        'updated_at'
    ];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(TransaksiModel::class, 'id_transaksi');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
