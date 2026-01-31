<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterfaces;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Hash;

class UserRepositories implements UserInterfaces
{
    use HttpResponseTraits;
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllData()
    {
        $data = $this->userModel::all();
        return $data->isEmpty() ? $this->dataNotFound() : $this->success($data);
    }

    public function createData(UserRequest $request)
    {
        try {
            $data = new $this->userModel;
            $data->nama = $request->input('nama');
            $data->email = $request->input('email');
            $data->no_hp = $request->input('no_hp');
            // Menambahkan enkripsi password
            $data->password = Hash::make($request->input('password'));
            $data->role = $request->input('role');
            $data->alamat = $request->input('alamat');
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->userModel::find($id);
        if (!$data) {
            return $this->idOrDataNotFound();
        }
        return $this->success($data);
    }

    public function updateData(UserRequest $request, $id)
    {
        try {
            $data = $this->userModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->nama = $request->input('nama');
            $data->email = $request->input('email');
            $data->no_hp = $request->input('no_hp');

            if ($request->filled('password')) {
                $data->password = Hash::make($request->input('password'));
            }

            $data->role = $request->input('role');
            $data->alamat = $request->input('alamat');
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->userModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            $data->delete();
            return $this->success(null, "Data deleted successfully");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
