<?php

namespace App\Services;

use App\Models\LogAktivitasModel;
use App\Models\RekomedasiPenggunaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecommendationService
{
    /**
     * Fungsi Utama untuk menjalankan proses Collaborative Filtering
     */
    public function runCollaborativeFiltering()
    {
        // 1. Ambil semua log aktivitas untuk membangun Utility Matrix
        $logs = LogAktivitasModel::all();

        if ($logs->isEmpty()) {
            return false;
        }

        $matrix = [];
        $userIds = [];

        // 2. Bangun Matrix (User x Produk)
        // Nilai sel adalah skor_minat (1, 3, 5, atau 7) dikali frekuensi
        foreach ($logs as $log) {
            $matrix[$log->id_pembeli][$log->id_produk] = $log->skor_minat * $log->frekuensi;
            $userIds[$log->id_pembeli] = true;
        }

        $userIds = array_keys($userIds);
        $finalRecommendations = [];

        // 3. Bandingkan setiap user dengan user lainnya
        foreach ($userIds as $userA) {
            $similarities = [];

            foreach ($userIds as $userB) {
                if ($userA === $userB) continue;

                // Hitung seberapa mirip User A dan User B
                $simScore = $this->calculateCosineSimilarity($matrix[$userA], $matrix[$userB]);

                if ($simScore > 0) {
                    $similarities[$userB] = $simScore;
                }
            }

            // Urutkan user lain berdasarkan kemiripan tertinggi (K-Nearest Neighbors)
            arsort($similarities);

            // 4. Prediksi skor untuk produk yang belum pernah disentuh User A
            foreach ($similarities as $userB => $similarity) {
                foreach ($matrix[$userB] as $idProduk => $ratingB) {
                    // Jika User A belum pernah berinteraksi dengan produk ini
                    if (!isset($matrix[$userA][$idProduk])) {
                        if (!isset($finalRecommendations[$userA][$idProduk])) {
                            $finalRecommendations[$userA][$idProduk] = 0;
                        }
                        // Rumus Prediksi: Sim(A,B) * Rating(B)
                        $finalRecommendations[$userA][$idProduk] += $similarity * $ratingB;
                    }
                }
            }
        }

        // 5. Simpan hasil ke tabel rekomendasi_pengguna
        return $this->saveToDatabase($finalRecommendations);
    }

    /**
     * Menghitung Cosine Similarity antara dua vektor user
     */
    private function calculateCosineSimilarity($vec1, $vec2)
    {
        $dotProduct = 0;
        $normA = 0;
        $normB = 0;

        // Cari produk yang sama-sama pernah berinteraksi
        $intersect = array_intersect_key($vec1, $vec2);

        foreach ($intersect as $idProd => $val) {
            $dotProduct += $vec1[$idProd] * $vec2[$idProd];
        }

        // Hitung Magnitudo Vektor A
        foreach ($vec1 as $val) {
            $normA += pow($val, 2);
        }

        // Hitung Magnitudo Vektor B
        foreach ($vec2 as $val) {
            $normB += pow($val, 2);
        }

        if ($normA == 0 || $normB == 0) return 0;

        return $dotProduct / (sqrt($normA) * sqrt($normB));
    }

    /**
     * Menyimpan hasil prediksi ke tabel database
     */
    private function saveToDatabase($recommendations)
    {
        try {
            // 1. Truncate dilakukan di luar DB::beginTransaction()
            // karena truncate menyebabkan implicit commit di MySQL
            DB::table('rekomendasi_pengguna')->truncate();

            DB::beginTransaction();

            foreach ($recommendations as $idPembeli => $produks) {
                arsort($produks);
                $topItems = array_slice($produks, 0, 10, true);

                foreach ($topItems as $idProduk => $skor) {
                    // Gunakan DB::table atau Model untuk insert
                    DB::table('rekomendasi_pengguna')->insert([
                        'id' => Str::uuid(),
                        'id_pembeli' => $idPembeli,
                        'id_produk' => $idProduk,
                        'prediksi_skor' => $skor,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
