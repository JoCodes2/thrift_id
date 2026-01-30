<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokoRequest;
use App\Repositories\TokoRepositories;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    protected $tokoRepo;

    public function __construct(TokoRepositories $tokoRepo)
    {
        return $this->tokoRepo = $tokoRepo;
    }
    public function getAllData()
    {
        return $this->tokoRepo->getAllData();
    }
    public function createData(TokoRequest $request)
    {
        return $this->tokoRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->tokoRepo->getDataById($id);
    }
    public function updateData(TokoRequest $request, $id)
    {
        return $this->tokoRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->tokoRepo->deleteData($id);
    }
}
