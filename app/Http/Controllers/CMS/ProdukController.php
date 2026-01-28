<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Repositories\KategoriRepositories;
use App\Repositories\ProdukRepositories;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $ProdukRepo;
    protected $KategoriRepo;

    public function __construct(ProdukRepositories $ProdukRepo, KategoriRepositories $KategoriRepo)
    {
        $this->ProdukRepo = $ProdukRepo;
        $this->KategoriRepo = $KategoriRepo;
    }

    public function index(Request $request)
    {
        $categoryIds = $request->get('kategori', []);
        $produk = $this->ProdukRepo->getFilteredForWeb($categoryIds ?: null);
        $kategori = $this->KategoriRepo->getAllForWeb();
        return view('pages.produk', compact('produk', 'kategori'));
    }

    public function filter(Request $request)
    {
        $categoryIds = $request->get('kategori', []);
        $produk = $this->ProdukRepo->getFilteredForWeb($categoryIds ?: null);
        return response()->json($produk);
    }

    public function getAllData()
    {
        return $this->ProdukRepo->getAllData();
    }
    public function createData(ProdukRequest $request)
    {
        return $this->ProdukRepo->createData($request);
    }
    public function getDataById($id)
    {
        return $this->ProdukRepo->getDataById($id);
    }
    public function updateData(ProdukRequest $request, $id)
    {
        return $this->ProdukRepo->updateData($request, $id);
    }
    public function deleteData($id)
    {
        return $this->ProdukRepo->deleteData($id);
    }
}
