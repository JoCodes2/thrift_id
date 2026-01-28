<?php

namespace App\Repositories;

use App\Http\Requests\DeskripsiprodukRequest;
use App\Http\Requests\TokoRequest;
use App\Interfaces\DeskripsiprodukInterfaces;
use App\Interfaces\TokoInterfaces;
use App\Models\DeskripsiprodukModel;
use App\Models\ProdukModel;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeskripsiprodukRepositories implements DeskripsiprodukInterfaces
{
    use HttpResponseTraits;
    protected $DeskripsiprodukModel;

    public function __construct(DeskripsiprodukModel $DeskripsiprodukModel)
    {
        $this->DeskripsiprodukModel = $DeskripsiprodukModel;
    }

    // public function getAllData()
    // {
    //     $data = $this->TokoModel::all();
    //     return $data->isEmpty() ? $this->dataNotFound() : $this->success($data);
    // }

    public function getAllData()
    {
        $data = $this->DeskripsiprodukModel::with('produk:id,nama_produk')->get();

        return $data->isEmpty()
            ? $this->dataNotFound()
            : $this->success($data);
    }


    public function createData(DeskripsiprodukRequest $request)
    {
        try {
            $user = Auth::user();

            $data = new $this->DeskripsiprodukModel;
            $data->produk_id = $request->produk_id;
            $data->deskripsi = $request->deskripsi;

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = 'gambar-' . Str::random(15) . '.' . $file->getClientOriginalExtension();

                if (!file_exists(public_path('uploads/gambar'))) {
                    mkdir(public_path('uploads/gambar'), 0755, true);
                }

                $file->move(public_path('uploads/gambar'), $filename);
                $data->gambar = $filename;
            }

            // 🔥 AUTO SET (tidak dari request)
            $data->bahan = $request->bahan;
            $data->ukuran = $request->ukuran;
            $data->kondisi = $request->kondisi;

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }


    public function getDataById($id)
    {
        $data = $this->DeskripsiprodukModel::find($id);
        if (!$data) {
            return $this->idOrDataNotFound();
        }
        return $this->success($data);
    }

    public function updateData(DeskripsiprodukRequest $request, $id)
    {
        try {
            $data = $this->DeskripsiprodukModel::find($id);
            $user = Auth::user();
            if (!$data) return $this->idOrDataNotFound();

            $data->produk_id = $request->produk_id;
            $data->deskripsi = $request->input('deskripsi');

            // HANDLE FILE FOTO
            if ($request->hasFile('gambar')) {

                // hapus file lama jika ada
                if ($data->gambar && file_exists(public_path('uploads/gambar/' . $data->gambar))) {
                    unlink(public_path('uploads/gambar/' . $data->gambar));
                }

                $file = $request->file('gambar');
                $filename = 'gambar-' . Str::random(15) . '.' . $file->getClientOriginalExtension();
                if (!file_exists(public_path('uploads/gambar'))) {
                    mkdir(public_path('uploads/gambar'), 0755, true);
                }

                $file->move(public_path('uploads/gambar'), $filename);
                $data->gambar = $filename;
            }
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->DeskripsiprodukModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            // Hapus file foto jika ada
            if ($data->gambar && file_exists(public_path('uploads/gambar/' . $data->gambar))) {
                unlink(public_path('uploads/gambar/' . $data->gambar));
            }

            $data->delete();
            return $this->success(null, "Data deleted successfully");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getByProdukId($produkId)
    {
        $data = $this->DeskripsiprodukModel::where('produk_id', $produkId)->get();
        return $this->success($data);
    }
}
