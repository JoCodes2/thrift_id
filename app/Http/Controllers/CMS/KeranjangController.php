<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\KeranjangRepositories;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    protected $keranjang;

    public function __construct(KeranjangRepositories $keranjang)
    {
        $this->keranjang = $keranjang;
    }
    public function getKeranjang()
    {
        return $this->keranjang->getKeranjang();
    }
    public function tambahKeranjang(Request $request)
    {
        return $this->keranjang->tambahKeranjang($request);
    }
    public function hapusKeranjang($id)
    {
        return $this->keranjang->hapusKeranjang($id);
    }
}
