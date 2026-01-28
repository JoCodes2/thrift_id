<?php

namespace App\Repositories;

use App\Http\Requests\TokoRequest;
use App\Interfaces\TokoInterfaces;
use App\Models\TokoModel;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TokoRepositories implements TokoInterfaces
{
    use HttpResponseTraits;
    protected $TokoModel;

    public function __construct(TokoModel $TokoModel)
    {
        $this->TokoModel = $TokoModel;
    }

    // public function getAllData()
    // {
    //     $data = $this->TokoModel::all();
    //     return $data->isEmpty() ? $this->dataNotFound() : $this->success($data);
    // }

    public function getAllData()
    {
        $data = $this->TokoModel::with('user:id,nama')->get();

        return $data->isEmpty()
            ? $this->dataNotFound()
            : $this->success($data);
    }


    public function createData(TokoRequest $request)
    {
        try {
            $user = Auth::user();

            $data = new $this->TokoModel;
            $data->user_id = $user->id;
            $data->nama_toko = $request->nama_toko;
            $data->email_toko = $request->email_toko;
            $data->no_hp_toko = $request->no_hp_toko;
            $data->alamat_toko = $request->alamat_toko;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = 'foto-' . Str::random(15) . '.' . $file->getClientOriginalExtension();

                if (!file_exists(public_path('uploads/foto'))) {
                    mkdir(public_path('uploads/foto'), 0755, true);
                }

                $file->move(public_path('uploads/foto'), $filename);
                $data->foto = $filename;
            }

            // 🔥 AUTO SET (tidak dari request)
            $data->tahun_terdaftar = now()->year;

            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }


    public function getDataById($id)
    {
        $data = $this->TokoModel::find($id);
        if (!$data) {
            return $this->idOrDataNotFound();
        }
        return $this->success($data);
    }

    public function updateData(TokoRequest $request, $id)
    {
        try {
            $data = $this->TokoModel::find($id);
            $user = Auth::user();
            if (!$data) return $this->idOrDataNotFound();

            $data->user_id = $user->id;
            $data->nama_toko = $request->input('nama_toko');
            $data->email_toko = $request->input('email_toko');
            $data->no_hp_toko = $request->input('no_hp_toko');
            $data->alamat_toko = $request->input('alamat_toko');
            // HANDLE FILE FOTO
            if ($request->hasFile('foto')) {

                // hapus file lama jika ada
                if ($data->foto && file_exists(public_path('uploads/foto/' . $data->foto))) {
                    unlink(public_path('uploads/foto/' . $data->foto));
                }

                $file = $request->file('foto');
                $filename = 'foto-' . Str::random(15) . '.' . $file->getClientOriginalExtension();
                if (!file_exists(public_path('uploads/foto'))) {
                    mkdir(public_path('uploads/foto'), 0755, true);
                }

                $file->move(public_path('uploads/foto'), $filename);
                $data->foto = $filename;
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
            $data = $this->TokoModel::find($id);
            if (!$data) return $this->idOrDataNotFound();

            // Hapus file foto jika ada
            if ($data->foto && file_exists(public_path('uploads/foto/' . $data->foto))) {
                unlink(public_path('uploads/foto/' . $data->foto));
            }

            $data->delete();
            return $this->success(null, "Data deleted successfully");
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }
}
