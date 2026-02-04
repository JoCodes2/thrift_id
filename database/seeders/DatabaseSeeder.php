<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        // 1. BUAT 2 PENJUAL & 5 PEMBELI
        $penjualIds = [];
        for ($i = 1; $i <= 2; $i++) {
            $id = Str::uuid();
            $penjualIds[] = $id;
            DB::table('users')->insert([
                'id' => $id,
                'nama' => "Penjual $i",
                'email' => "penjual$i@gmail.com",
                'no_hp' => "08123456789$i",
                'password' => Hash::make('password'),
                'role' => 'penjual',
                'alamat' => "Alamat Penjual $i",
                'created_at' => now(),
            ]);
        }

        $pembeliIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $id = Str::uuid();
            $pembeliIds[] = $id;
            DB::table('users')->insert([
                'id' => $id,
                'nama' => "Pembeli $i",
                'email' => "pembeli$i@gmail.com",
                'no_hp' => "08987654321$i",
                'password' => Hash::make('password'),
                'role' => 'pembeli',
                'alamat' => "Alamat Pembeli $i",
                'created_at' => now(),
            ]);
        }

        // 2. BUAT 2 TOKO
        $tokoIds = [];
        foreach ($penjualIds as $index => $penjualId) {
            $id = Str::uuid();
            $tokoIds[] = $id;
            DB::table('toko')->insert([
                'id' => $id,
                'user_id' => $penjualId,
                'nama_toko' => "Thrift Shop " . ($index + 1),
                'email_toko' => "shop" . ($index + 1) . "@gmail.com",
                'no_hp_toko' => "08555544433$index",
                'alamat_toko' => "Pasar Klontong No $index",
                'foto' => 'default_toko.jpg',
                'tahun_terdaftar' => 2024,
                'created_at' => now(),
            ]);
        }

        // 3. BUAT KATEGORI
        $kategoriId = Str::uuid();
        DB::table('kategori')->insert([
            'id' => $kategoriId,
            'nama_kategori' => 'Pakaian Pria',
            'created_at' => now(),
        ]);

        // 4. BUAT 10 PRODUK (5 per Toko)
        $produkIds = [];
        foreach ($tokoIds as $tIndex => $tokoId) {
            for ($pIndex = 1; $pIndex <= 5; $pIndex++) {
                $id = Str::uuid();
                $produkIds[] = $id;
                DB::table('produk')->insert([
                    'id' => $id,
                    'id_kategori' => $kategoriId,
                    'id_toko' => $tokoId,
                    'nama_produk' => "Produk Thrift " . ($tIndex == 0 ? "A" : "B") . " $pIndex",
                    'harga' => rand(50000, 200000),
                    'status_stok' => 'tersedia',
                    'created_at' => now(),
                ]);

                // Deskripsi Produk
                DB::table('deskripsi_produk')->insert([
                    'id' => Str::uuid(),
                    'produk_id' => $id,
                    'deskripsi' => 'Kondisi mulus like new.',
                    'gambar' => 'default_produk.jpg',
                    'bahan' => 'Katun',
                    'ukuran' => 'L',
                    'kondisi' => '9/10',
                ]);
            }
        }

        // 5. SIMULASI AKTIVITAS UNTUK CF (Metode: Collaborative Filtering)
        // Kita buat pola: Pembeli 1 dan Pembeli 2 punya selera mirip di Produk 0, 1, dan 2.

        $aktivitas = [
            // Pembeli 1: Sangat suka Produk 0, 1, 2
            ['user' => $pembeliIds[0], 'prod' => $produkIds[0], 'tipe' => 'beri_rating', 'skor' => 7],
            ['user' => $pembeliIds[0], 'prod' => $produkIds[1], 'tipe' => 'transaksi', 'skor' => 5],
            ['user' => $pembeliIds[0], 'prod' => $produkIds[2], 'tipe' => 'lihat', 'skor' => 1],

            // Pembeli 2: Mirip dengan Pembeli 1 (Suka Produk 0 dan 1)
            ['user' => $pembeliIds[1], 'prod' => $produkIds[0], 'tipe' => 'beri_rating', 'skor' => 7],
            ['user' => $pembeliIds[1], 'prod' => $produkIds[1], 'tipe' => 'transaksi', 'skor' => 5],
            // Pembeli 2 BELUM interaksi dengan Produk 2 (Ini yang akan direkomendasikan nanti)
            ['user' => $pembeliIds[1], 'prod' => $produkIds[5], 'tipe' => 'lihat', 'skor' => 1],

            // Pembeli 3: Suka Produk 5, 6 (Berbeda selera)
            ['user' => $pembeliIds[2], 'prod' => $produkIds[5], 'tipe' => 'beri_rating', 'skor' => 7],
            ['user' => $pembeliIds[2], 'prod' => $produkIds[6], 'tipe' => 'tambah_keranjang', 'skor' => 3],
        ];

        foreach ($aktivitas as $act) {
            DB::table('log_aktivitas')->insert([
                'id' => Str::uuid(),
                'id_pembeli' => $act['user'],
                'id_produk' => $act['prod'],
                'jenis_aktivitas' => $act['tipe'],
                'skor_minat' => $act['skor'],
                'frekuensi' => 1,
                'created_at' => now(),
            ]);

            // Jika tipenya 'beri_rating', masukkan juga ke tabel penilaian
            if ($act['tipe'] === 'beri_rating') {
                DB::table('penilaian')->insert([
                    'id' => Str::uuid(),
                    'id_pembeli' => $act['user'],
                    'id_produk' => $act['prod'],
                    'nilai_rating' => 5,
                    'ulasan' => 'Kualitas produk sangat bagus!',
                    'created_at' => now(),
                ]);
            }
        }
    }
}
