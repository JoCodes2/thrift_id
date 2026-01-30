<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenilaianModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'penilaian';
    protected $fillable = [
        'id',
        'id_pembeli',
        'id_produk',
        'nilai_rating',
        'ulasan',
        'created_at',
        'updated_at'
    ];

    public function pembeli(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pembeli');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
