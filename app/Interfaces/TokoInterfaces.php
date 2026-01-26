<?php

namespace App\Interfaces;

use App\Http\Requests\TokoRequest;

interface TokoInterfaces
{
    public function getAllData();
    public function createData(TokoRequest $request);
    public function getDataById($id);
    public function updateData(TokoRequest $request, $id);
    public function deleteData($id);
}
