<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface TransaksiInterfaces
{
    public function getAllData();
    public function createData(Request $request);
    public function getDataById($id);
    public function updateData(Request $request, $id);
    public function deleteData($id);
    public function transaksiAdmin();
}
