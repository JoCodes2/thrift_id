<?php

namespace App\Repositories;

use App\Http\Requests\KategoriRequest;
use App\Http\Requests\ProdukRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\KategoriInterfaces;
use App\Interfaces\ProdukInterfaces;
use App\Interfaces\UserInterfaces;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Hash;

class ProdukRepositories implements ProdukInterfaces
{
    use HttpResponseTraits;
    protected $ProdukModel;

    public function __construct(ProdukModel $ProdukModel)
    {
        $this->ProdukModel = $ProdukModel;
    }

    public function getAllData()
    {
        $data = ProdukModel::with(['kategori', 'toko', 'deskrisp'])->get();
        if (!$data) {
            return $this->dataNotFound();
        }
        return $this->success($data);
    }

    public function getAllForWeb()
    {
        return ProdukModel::with(['kategori', 'toko', 'deskrisp'])->get();
    }

    public function getFilteredForWeb($categoryIds = null)
    {
        $query = ProdukModel::with(['kategori', 'toko', 'deskrisp']);
        if ($categoryIds) {
            $query->whereIn('id_kategori', $categoryIds);
        }
        return $query->get();
    }

    public function getDataByIdForWeb($id)
    {
        return ProdukModel::with(['kategori', 'toko', 'deskrisp'])->find($id);
    }

    public function createData(ProdukRequest $request)
    {
        try {
            $data = new $this->ProdukModel;
            $data->id_kategori = $request->input('id_kategori');
            $data->id_toko = $request->input('id_toko');
            $data->nama_produk = $request->input('nama_produk');
            $data->harga = $request->input('harga');
            $data->status_stok = $request->input('status_stok');
            $data->jumlah_terjual = $request->input('jumlah_terjual');

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->ProdukModel::with(['kategori', 'toko', 'deskrisp'])->find($id);
        if (!$data) {
            return $this->idOrDataNotFound();
        }
        return $this->success($data);
    }

    public function updateData(ProdukRequest $request, $id)
    {
        try {
            $data = $this->ProdukModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->id_kategori = $request->input('id_kategori');
            $data->id_toko = $request->input('id_toko');
            $data->nama_produk = $request->input('nama_produk');
            $data->harga = $request->input('harga');
            $data->status_stok = $request->input('status_stok');
            $data->jumlah_terjual = $request->input('jumlah_terjual');
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->ProdukModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->delete();
            return $this->success(null, "Data deleted successfully");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
