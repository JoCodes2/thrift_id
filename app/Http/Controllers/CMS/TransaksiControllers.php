<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\TransaksiRepositories;
use Illuminate\Http\Request;

class TransaksiControllers extends Controller
{
    protected $transaksiRepo;
    public function __construct(TransaksiRepositories $transaksiRepo)
    {
        $this->transaksiRepo = $transaksiRepo;
    }
    public function getAllData()
    {
        return $this->transaksiRepo->getAllData();
    }
    public function createData(Request $request)
    {
        return $this->transaksiRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->transaksiRepo->getDataById($id);
    }
    public function updateData(Request $request, $id)
    {
        return $this->transaksiRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->transaksiRepo->deleteData($id);
    }

    public function transaksiAdmin()
    {
        return $this->transaksiRepo->transaksiAdmin();
    }

    public function updateStatusItem($id)
    {
        $request = request();
        $status = $request->input('status', 'dikirim');
        return $this->transaksiRepo->updateStatusItem($id, $status);
    }
    public function storeRating(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'rating'    => 'required|integer|min:1|max:5',
        ]);

        return $this->transaksiRepo->createRating($request);
    }
}
