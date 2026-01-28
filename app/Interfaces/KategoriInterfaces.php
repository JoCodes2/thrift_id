<?php

namespace App\Interfaces;

use App\Http\Requests\KategoriRequest;

interface KategoriInterfaces
{
    public function getAllData();
    public function createData(KategoriRequest $request);
    public function getDataById($id);
    public function updateData(KategoriRequest $request, $id);
    public function deleteData($id);
}
