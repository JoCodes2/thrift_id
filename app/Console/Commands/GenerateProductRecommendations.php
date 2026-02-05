<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RecommendationService;

class GenerateProductRecommendations extends Command
{
    // Nama perintah yang akan dipanggil di terminal
    protected $signature = 'recommendation:generate';

    // Deskripsi perintah
    protected $description = 'Menghitung ulang skor Collaborative Filtering dan memperbarui tabel rekomendasi pengguna';

    public function handle(RecommendationService $service)
    {
        $this->info('Memulai perhitungan Collaborative Filtering...');

        $result = $service->runCollaborativeFiltering();

        if ($result === true) {
            $this->info('Sukses: Tabel rekomendasi_pengguna telah diperbarui.');
        } else {
            $this->error('Gagal: ' . $result);
        }
    }
}
