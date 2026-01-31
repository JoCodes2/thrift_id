<?php

namespace App\Repositories;

use App\Interfaces\KeranjangInterfaces;
use App\Models\KeranjangModel;
use App\Models\LogAktivitasModel;
use App\Models\RekomedasiPenggunaModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangRepositories implements KeranjangInterfaces
{
    use HttpResponseTraits;
    protected $keranjangModel;
    protected $logModel;
    public function __construct(KeranjangModel $keranjangModel, LogAktivitasModel $logModel)
    {
        $this->keranjangModel = $keranjangModel;
        $this->logModel = $logModel;
    }
    public function getKeranjang()
    {
        $userId = Auth::id();

        $isiKeranjang = $this->keranjangModel::with('produk')->where('id_pembeli', $userId)->get();

        $rekomendasi = RekomedasiPenggunaModel::with('produk')
            ->where('id_pembeli', $userId)
            ->orderBy('prediksi_skor', 'desc')
            ->take(4)
            ->get();

        return $this->success([
            'data' => $isiKeranjang,
            'rekomendasi' => $rekomendasi
        ]);
    }
    public function tambahKeranjang(Request $request)
    {
        try {
            $userId = Auth::id();
            $idProduk = $request->id_produk;

            $keranjang = $this->keranjangModel::updateOrCreate(
                ['id_pembeli' => $userId, 'id_produk' => $idProduk],
                ['qty' => $request->qty ?? 1, 'added_at' => now()]
            );

            $log = $this->logModel::where('id_pembeli', $userId)
                ->where('id_produk', $idProduk)
                ->where('jenis_aktivitas', 'tambah_keranjang')
                ->first();

            if ($log) {
                $log->increment('frekuensi');
            } else {
                $this->logModel::create([
                    'id_pembeli' => $userId,
                    'id_produk'  => $idProduk,
                    'jenis_aktivitas' => 'tambah_keranjang',
                    'skor_minat' => 3,
                    'frekuensi'  => 1
                ]);
            }
            return $this->success($keranjang);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
