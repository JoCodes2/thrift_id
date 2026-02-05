<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\LogAktivitasModel;
use App\Models\ProdukModel;
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
            if (!Auth::check()) {
                return;
            }

            $userId = Auth::id();
            $sessionKey = 'last_view_time_' . $idProduk;
            $currentTime = now();

            if (session()->has($sessionKey)) {
                $lastViewTime = session()->get($sessionKey);
                if ($currentTime->diffInSeconds($lastViewTime) < 60) {
                    return;
                }
            }

            $log = LogAktivitasModel::updateOrCreate(
                [
                    'id_pembeli'      => $userId,
                    'id_produk'       => $idProduk,
                    'jenis_aktivitas' => 'lihat',
                ],
                [
                    'skor_minat' => 1,
                ]
            );

            $log->increment('frekuensi');

            session()->put($sessionKey, $currentTime);
            session()->save();
        } catch (\Exception $e) {
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



    // filter beranda
    public function getProdukUnggulan(Request $request)
    {
        try {
            $filter = $request->query('filter');

            $query = ProdukModel::select('produk.*')
                ->with(['deskrisp', 'toko', 'kategori'])
                ->withAvg('review as rating', 'nilai_rating')
                ->where('status_stok', 'tersedia');

            if ($filter === 'terlaris') {
                $query->orderBy('produk.jumlah_terjual', 'desc');
            } elseif ($filter === 'terbaik') {
                $query->orderBy('rating', 'desc');
            } else {
                $query->orderBy('produk.created_at', 'desc');
            }

            $data = $query->limit(4)->get();

            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
