<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';
    protected $fillable = [
        'id',
        'id_pembeli',
        'nomor_transaksi',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    public function pembeli(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pembeli');
    }

    public function items(): HasMany
    {
        return $this->hasMany(ItemTransaksiModel::class, 'id_transaksi');
    }
}
