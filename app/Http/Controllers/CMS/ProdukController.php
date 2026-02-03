<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\LogAktivitasModel;
use App\Repositories\KategoriRepositories;
use App\Repositories\ProdukRepositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    protected $ProdukRepo;
    protected $KategoriRepo;

    public function __construct(ProdukRepositories $ProdukRepo, KategoriRepositories $KategoriRepo)
    {
        $this->ProdukRepo = $ProdukRepo;
        $this->KategoriRepo = $KategoriRepo;
    }

    public function index(Request $request)
    {
        $categoryIds = $request->get('kategori', []);
        $produk = $this->ProdukRepo->getFilteredForWeb($categoryIds ?: null);
        $kategori = $this->KategoriRepo->getAllForWeb();
        return view('pages.produk', compact('produk', 'kategori'));
    }

    public function filter(Request $request)
    {
        $categoryIds = $request->get('kategori', []);
        $produk = $this->ProdukRepo->getFilteredForWeb($categoryIds ?: null);
        return response()->json($produk);
    }

    public function show($id)
    {
        $produk = $this->ProdukRepo->getDataByIdForWeb($id);

        if (!$produk) {
            abort(404);
        }

        $this->simpanLogAktivitas($id);

        return view('pages.detail-produk', compact('produk'));
    }

    private function simpanLogAktivitas($idProduk)
    {
        try {
            // Cek Login
            if (!Auth::check()) {
                return;
            }

            $userId = Auth::id();
            $sessionKey = 'last_view_time_' . $idProduk;
            $currentTime = now();

            // 1. Cek jeda 60 detik lewat Session
            if (session()->has($sessionKey)) {
                $lastViewTime = session()->get($sessionKey);
                if ($currentTime->diffInSeconds($lastViewTime) < 60) {
                    return; // Berhenti jika belum 1 menit
                }
            }

            // 2. Gunakan updateOrCreate agar lebih ringkas dan pasti masuk
            // updateOrCreate akan mencari data, jika ada diupdate, jika tidak ada dibuatkan baru
            $log = LogAktivitasModel::updateOrCreate(
                [
                    'id_pembeli'      => $userId,
                    'id_produk'       => $idProduk,
                    'jenis_aktivitas' => 'lihat_detail',
                ],
                [
                    'skor_minat' => 1,
                    // Kita akan menangani frekuensi secara manual agar tidak konflik
                ]
            );

            // Manual increment frekuensi
            $log->increment('frekuensi');

            // 3. Simpan session dan pastikan session ter-write
            session()->put($sessionKey, $currentTime);
            session()->save(); // Paksa simpan session ke storage

        } catch (\Exception $e) {
            // Log error ini sangat penting untuk melihat kenapa gagal (cek storage/logs/laravel.log)
            Log::error("Gagal simpan log aktivitas Produk ID {$idProduk}: " . $e->getMessage());
        }
    }

    public function getAllData()
    {
        return $this->ProdukRepo->getAllData();
    }
    public function createData(ProdukRequest $request)
    {
        return $this->ProdukRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->ProdukRepo->getDataById($id);
    }
    public function updateData(ProdukRequest $request, $id)
    {
        return $this->ProdukRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->ProdukRepo->deleteData($id);
    }
}
