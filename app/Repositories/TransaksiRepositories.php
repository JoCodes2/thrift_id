<?php

namespace App\Repositories;

use App\Interfaces\TransaksiInterfaces;
use App\Models\ItemTransaksiModel;
use App\Models\KeranjangModel;
use App\Models\LogAktivitasModel;
use App\Models\PenilaianModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiRepositories implements TransaksiInterfaces
{
    use HttpResponseTraits;
    protected $tansaksiModel;
    protected $itemtransaksiModel;
    protected $keranjangModel;
    protected $produkModel;
    protected $logAktivitasModel;
    protected $penilaianModel;

    public function __construct(LogAktivitasModel $logAktivitasModel, ProdukModel $produkModel, TransaksiModel $transaksiModel, ItemTransaksiModel $itemtransaksiModel, KeranjangModel $keranjangModel, PenilaianModel $penilaianModel)
    {
        $this->itemtransaksiModel = $itemtransaksiModel;
        $this->tansaksiModel = $transaksiModel;
        $this->keranjangModel = $keranjangModel;
        $this->produkModel = $produkModel;
        $this->logAktivitasModel = $logAktivitasModel;
        $this->penilaianModel = $penilaianModel;
    }

    public function getAllData()
    {
        $status = request('status');
        $userId = Auth::id();

        $query = $this->tansaksiModel::with([
            'items.produk.deskrisp',
            'items.produk.toko',
            'items.produk.review' => function ($q) use ($userId) {
                $q->where('id_pembeli', $userId);
            }
        ])
            ->where('id_pembeli', $userId)
            ->latest();

        $query->when($status, function ($q) use ($status) {
            return $q->whereHas('items', function ($itemQuery) use ($status) {
                $itemQuery->where('status_item', $status);
            });
        });

        return $this->success($query->get(), "Berhasil mengambil riwayat transaksi");
    }
    public function createRating(Request $request)
    {
        DB::beginTransaction();
        try {
            $userId = Auth::id();

            $penilaian = $this->penilaianModel->create([
                'id_pembeli'   => $userId,
                'id_produk'    => $request->produk_id,
                'nilai_rating' => $request->rating,
                'ulasan'       => $request->ulasan,
            ]);

            $this->logAktivitasModel->updateOrCreate(
                [
                    'id_pembeli'      => $userId,
                    'id_produk'       => $request->produk_id,
                    'jenis_aktivitas' => 'beri_rating',
                ],
                [
                    'skor_minat'      => 7,
                    'frekuensi'       => DB::raw('COALESCE(frekuensi, 0) + 1'),
                ]
            );

            DB::commit();
            return $this->success($penilaian, "Terima kasih! Ulasan Anda telah berhasil disimpan.");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage(), 400);
        }
    }

    public function getDataById($id)
    {
        $userId = Auth::id();
        $data = $this->tansaksiModel::with([
            'pembeli',
            'items.produk.deskrisp',
            'items.produk.toko'
        ])
            ->where('id_pembeli', $userId)
            ->where('id', $id)
            ->firstOrFail();

        return $this->success($data);
    }

    public function createData(Request $request)
    {
        DB::beginTransaction();

        try {
            $userId = Auth::id();
            $nomorTransaksi = 'TRX-' . date('Ymd') . '-' . Str::random(6);

            $transaksi = $this->tansaksiModel->create([
                'id_pembeli' => $userId,
                'nomor_transaksi' => $nomorTransaksi,
                'total_harga' => $request->total_harga,
                'created_at' => now(),
            ]);

            foreach ($request->items as $item) {
                $produk = $this->produkModel::with('kategori')->findOrFail($item['id_produk']);

                $this->itemtransaksiModel->create([
                    'id' => Str::uuid(),
                    'id_transaksi' => $transaksi->id,
                    'id_produk'    => $produk->id,
                    'status_item'  => 'menunggu',
                    'nama_produk'  => $produk->nama_produk,
                    'nama_kategori' => $produk->kategori->nama_kategori ?? '-',
                    'harga_satuan' => $produk->harga,
                    'qty'          => $item['qty'],
                    'subtotal'     => $produk->harga * $item['qty'],
                ]);

                $this->logAktivitasModel->updateOrCreate(
                    [
                        'id_pembeli'      => $userId,
                        'id_produk'       => $produk->id,
                        'jenis_aktivitas' => 'transaksi',
                    ],
                    [
                        'id'              => Str::uuid(),
                        'skor_minat'      => 5,
                        'frekuensi'       => DB::raw('COALESCE(frekuensi, 0) + 1'),
                    ]
                );

                $produk->increment('jumlah_terjual', $item['qty']);
            }

            if ($request->has('id_keranjangs') && is_array($request->id_keranjangs) && count($request->id_keranjangs) > 0) {
                $this->keranjangModel->whereIn('id', $request->id_keranjangs)
                    ->where('id_pembeli', $userId)
                    ->delete();
            }

            DB::commit();
            $transaksi->load(['items.produk.toko', 'items.produk.deskrisp']);
            return $this->success($transaksi, "Transaksi berhasil dibuat");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }


    public function transaksiAdmin()
    {
        $user = Auth::user();

        // 1. Ambil semua ID toko yang dimiliki user ini
        // pluck('id') mengambil hanya kolom 'id' dari hasil collection toko
        $tokoIdsPenjual = $user->toko->pluck('id')->toArray();

        // Jika user tidak punya toko sama sekali
        if (empty($tokoIdsPenjual)) {
            return $this->success([], "User tidak memiliki toko");
        }

        $data = $this->tansaksiModel::with([
            'pembeli',
            'items' => function ($query) use ($tokoIdsPenjual) {
                $query->whereHas('produk', function ($q) use ($tokoIdsPenjual) {
                    // 2. Gunakan whereIn untuk mengecek apakah id_toko ada di dalam daftar ID toko penjual
                    $q->whereIn('id_toko', $tokoIdsPenjual);
                });
            },
            'items.produk.toko',
            'items.produk.deskrisp' // Pastikan nama fungsi di model ProdukModel sesuai
        ])
            ->whereHas('items.produk', function ($query) use ($tokoIdsPenjual) {
                // 3. Filter transaksi utama dengan whereIn juga
                $query->whereIn('id_toko', $tokoIdsPenjual);
            })
            ->latest()
            ->get()
            ->flatMap(function ($transaksi) {
                return $transaksi->items->map(function ($item) use ($transaksi) {
                    return [
                        'id' => $item->id,
                        'nama_pembeli' => $transaksi->pembeli->nama ?? '-',
                        'kode_transaksi' => $transaksi->nomor_transaksi,
                        'nama_produk' => $item->produk->nama_produk ?? $item->nama_produk,
                        'tanggal_pembelian' => $transaksi->created_at->format('Y-m-d H:i:s'),
                        'harga' => (int) $item->harga_satuan,
                        'jumlah' => (int) $item->qty,
                        'total_harga' => (int) $transaksi->total_harga,
                        'alamat_pembeli' => $transaksi->pembeli->alamat ?? '-',
                        'email_pembeli' => $transaksi->pembeli->email ?? '-',
                        'status_item' => $item->status_item,
                        'nama_toko' => $item->produk->toko->nama_toko ?? '-'
                    ];
                });
            });

        return $this->success($data, "Berhasil mengambil data transaksi produk milik penjual");
    }

    public function updateStatusItem($id, $status)
    {
        try {
            $item = $this->itemtransaksiModel->findOrFail($id);
            $item->update(['status_item' => $status]);
            return $this->success($item, "Status item berhasil diperbarui");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function updateData(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $userId = Auth::id();
            $statusBaru = $request->status;

            $item = $this->itemtransaksiModel->where('id', $id)
                ->whereHas('transaksi', function ($q) use ($userId) {
                    $q->where('id_pembeli', $userId);
                })->firstOrFail();

            $item->update([
                'status_item' => $statusBaru
            ]);

            if ($statusBaru === 'dibatalkan') {
                $produk = $this->produkModel->find($item->id_produk);
                if ($produk) {
                    $produk->decrement('jumlah_terjual', $item->qty);
                }
            }

            DB::commit();
            return $this->success($item, "Status pesanan berhasil diperbarui menjadi $statusBaru");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage(), 400);
        }
    }
    public function deleteData($id) {}
}
