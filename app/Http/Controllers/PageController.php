<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\TokoModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function detailToko($id)
    {
        $toko = TokoModel::with('user')->findOrFail($id);
        $produk = ProdukModel::where('id_toko', $id)->with('kategori')->get();

        return view('pages.detail-toko', compact('toko', 'produk'));
    }
}
