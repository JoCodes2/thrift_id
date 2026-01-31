<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogAktivitasModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'log_aktivitas';
    protected $fillable = [
        'id',
        'id_pembeli',
        'guest_session_id',
        'id_produk',
        'jenis_aktivitas',
        'skor_minat',
        'frekuensi',
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
