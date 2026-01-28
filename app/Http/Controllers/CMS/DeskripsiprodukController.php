<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskripsiprodukRequest;
use App\Repositories\DeskripsiprodukRepositories;
use Illuminate\Http\Request;

class DeskripsiprodukController extends Controller
{
    protected $deskripsiprodukRepo;

    public function __construct(DeskripsiprodukRepositories $deskripsiprodukRepo)
    {
        return $this->deskripsiprodukRepo = $deskripsiprodukRepo;
    }
    public function getAllData()
    {
        return $this->deskripsiprodukRepo->getAllData();
    }
    public function createData(DeskripsiprodukRequest $request)
    {
        return $this->deskripsiprodukRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->deskripsiprodukRepo->getDataById($id);
    }
    public function updateData(DeskripsiprodukRequest $request, $id)
    {
        return $this->deskripsiprodukRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->deskripsiprodukRepo->deleteData($id);
    }

    public function getByProdukId($produkId)
    {
        return $this->deskripsiprodukRepo->getByProdukId($produkId);
    }
}
