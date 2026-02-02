<?php

namespace App\Repositories;

use App\Interfaces\TransaksiInterfaces;
use Illuminate\Http\Request;

class TransaksiRepositories implements TransaksiInterfaces
{
    public function getAllData()
    {
        throw new \Exception('Not implemented');
    }
    public function getDataById($id)
    {
        throw new \Exception('Not implemented');
    }
    public function createData(Request $request)
    {
        throw new \Exception('Not implemented');
    }
    public function updateData(Request $request, $id)
    {
        throw new \Exception('Not implemented');
    }
    public function deleteData($id)
    {
        throw new \Exception('Not implemented');
    }
}
