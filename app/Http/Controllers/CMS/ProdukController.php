<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $ProdukRepo;

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
}
