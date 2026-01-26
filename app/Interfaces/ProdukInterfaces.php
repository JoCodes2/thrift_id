<?php

namespace App\Interfaces;

use App\Http\Requests\ProdukRequest;

interface ProdukInterfaces
{
    public function getAllData();
    public function createData(ProdukRequest $request);
    public function getDataById($id);
    public function updateData(ProdukRequest $request, $id);
    public function deleteData($id);
}
