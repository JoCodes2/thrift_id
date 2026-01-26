<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TokoModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'toko'; // pastikan nama tabel ini benar

    protected $fillable = [
        'id',
        'user_id',
        'nama_toko',
        'email_toko',
        'no_hp_toko',
        'alamat_toko',
        'foto',
        'tahun_terdaftar',
    ];

    /**
     * Relasi ke user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
