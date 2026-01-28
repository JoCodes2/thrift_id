<?php

namespace App\Interfaces;

use App\Http\Requests\DeskripsiprodukRequest;

interface DeskripsiprodukInterfaces
{
    public function getAllData();
    public function createData(DeskripsiprodukRequest $request);
    public function getDataById($id);
    public function updateData(DeskripsiprodukRequest $request, $id);
    public function deleteData($id);
}
