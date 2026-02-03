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
        $user = Auth::user();

        $isiKeranjang = $this->keranjangModel::with([
            'produk.toko',
            'produk.deskrisp',
            'produk.kategori'
        ])
            ->where('id_pembeli', $userId)
            ->get();

        $rekomendasi = RekomedasiPenggunaModel::with([
            'produk.toko',
            'produk.deskrisp'
        ])
            ->where('id_pembeli', $userId)
            ->orderBy('prediksi_skor', 'desc')
            ->take(4)
            ->get();

        if ($isiKeranjang->isEmpty()) {
            return $this->success([
                'user' => $user,
                'data' => [],
                'rekomendasi' => $rekomendasi
            ], "Keranjang kosong");
        }

        return $this->success([
            'user' => $user,
            'data' => $isiKeranjang,
            'rekomendasi' => $rekomendasi
        ]);
    }
    public function tambahKeranjang(Request $request)
    {
        try {
            $userId = Auth::id();
            $idProduk = $request->id_produk;
            $qtyInput = $request->qty ?? 1;

            $cekKeranjang = $this->keranjangModel::where('id_pembeli', $userId)
                ->where('id_produk', $idProduk)
                ->first();

            if ($cekKeranjang) {

                if ($request->has('update_mode')) {
                    $cekKeranjang->update(['qty' => $qtyInput]);
                } else {
                    $cekKeranjang->increment('qty', $qtyInput);
                }
                $keranjang = $cekKeranjang;
            } else {
                $keranjang = $this->keranjangModel::create([
                    'id_pembeli' => $userId,
                    'id_produk'  => $idProduk,
                    'qty'        => $qtyInput,
                    'added_at'   => now()
                ]);
            }

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
    public function hapusKeranjang($id)
    {
        try {
            $userId = Auth::id();
            $item = $this->keranjangModel::where('id', $id)
                ->where('id_pembeli', $userId)
                ->first();

            if (!$item) {
                return $this->error("Produk tidak ditemukan di keranjang", 404);
            }

            $item->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
