<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface KeranjangInterfaces
{
    public function getKeranjang();
    public function tambahKeranjang(Request $request);
    public function hapusKeranjang($id);
}
