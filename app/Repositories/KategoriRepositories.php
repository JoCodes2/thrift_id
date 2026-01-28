<?php

namespace App\Repositories;

use App\Http\Requests\KategoriRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\KategoriInterfaces;
use App\Interfaces\UserInterfaces;
use App\Models\KategoriModel;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Hash;

class KategoriRepositories implements KategoriInterfaces
{
    use HttpResponseTraits;
    protected $KategoriModel;

    public function __construct(KategoriModel $KategoriModel)
    {
        $this->KategoriModel = $KategoriModel;
    }

    public function getAllData()
    {
        $data = $this->KategoriModel::all();
        return $data->isEmpty() ? $this->dataNotFound() : $this->success($data);
    }

    public function getAllForWeb()
    {
        return $this->KategoriModel::all();
    }

    public function createData(KategoriRequest $request)
    {
        try {
            $data = new $this->KategoriModel;
            $data->nama_kategori = $request->input('nama_kategori');

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->KategoriModel::find($id);
        if (!$data) {
            return $this->idOrDataNotFound();
        }
        return $this->success($data);
    }

    public function updateData(KategoriRequest $request, $id)
    {
        try {
            $data = $this->KategoriModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->nama_kategori = $request->input('nama_kategori');
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->KategoriModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->delete();
            return $this->success(null, "Data deleted successfully");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
