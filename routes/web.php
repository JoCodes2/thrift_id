<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\DeskripsiprodukController;
use App\Http\Controllers\CMS\KategoriController;
use App\Http\Controllers\CMS\KeranjangController;
use App\Http\Controllers\CMS\ProdukController;
use App\Http\Controllers\CMS\TokoController;
use App\Http\Controllers\CMS\TransaksiControllers;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;



// ui web
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/produk', [App\Http\Controllers\CMS\ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/filter', [App\Http\Controllers\CMS\ProdukController::class, 'filter'])->name('produk.filter');
Route::get('/detail-produk/{id}', [App\Http\Controllers\CMS\ProdukController::class, 'show'])->name('produk.show');

Route::get('/detail-toko', function () {
    $toko = App\Models\TokoModel::first();
    return redirect('/detail-toko/' . $toko->id);
});
Route::get('/detail-toko/{id}', [PageController::class, 'detailToko']);





Route::get('/produk-unggulan', [ProdukController::class, 'getProdukUnggulan'])->name('produk.unggulan');
// route auth
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('thrif-id/login', [AuthController::class, 'login']);

Route::prefix('thrif-id/user')->controller(UserController::class)->group(function () {
    Route::post('/create', 'createData');
});
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/setting-user', function () {
        return view('admin.setting-user');
    })->middleware('role:penjual,super-admin');
    Route::get('/user', function () {
        return view('admin.user');
    })->middleware('role:super-admin');

    Route::get('/kategori', function () {
        return view('admin.kategori');
    })->middleware('role:super-admin');

    Route::get('/produk-admin', function () {
        return view('admin.produk');
    })->middleware('role:penjual');

    Route::get('/transaksi-admin', function () {
        return view('admin.transaksiadmin');
    })->middleware('role:penjual');
    //admin web
    Route::get('/dashboard', function () {
        return view('admin.toko');
    })->middleware('role:penjual');

    // route pembeli
    Route::get('/profile', function () {
        return view('pages.profile-pembeli');
    })->middleware('role:pembeli');
    Route::get('/riwayat-pesanan/menunggu', function () {
        return view('pages.riwayat-pesanan-menunggu');
    })->middleware('role:pembeli');
    Route::get('/riwayat-pesanan/dikirim', function () {
        return view('pages.riwayat-pesanan-dikirim');
    })->middleware('role:pembeli');
    Route::get('/riwayat-pesanan/selesai', function () {
        return view('pages.riwayat-pesanan-selesai');
    })->middleware('role:pembeli');
    Route::get('/riwayat-pesanan/dibatalkan', function () {
        return view('pages.riwayat-pesanan-dibatalkan');
    })->middleware('role:pembeli');
    Route::get('/keranjang', function () {
        return view('pages.keranjang');
    })->middleware('role:pembeli');
    Route::get('/pembayaran', function () {
        return view('pages.pembayaran');
    })->middleware('role:pembeli');

    // route api
    Route::prefix('thrif-id')->group(function () {
        Route::prefix('user')->controller(UserController::class)->group(function () {
            Route::get('/', 'getAllData');
            // Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('toko')->controller(TokoController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('kategori')->controller(KategoriController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('produk-admin')->controller(ProdukController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('deskripsi-produk')->controller(DeskripsiprodukController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::get('/get-by-produk/{produkId}', 'getByProdukId');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        Route::prefix('keranjang')->controller(KeranjangController::class)->group(function () {
            Route::get('/', 'getKeranjang');
            Route::post('/create', 'tambahKeranjang');
            Route::delete('/delete/{id}', 'hapusKeranjang');
        });
        Route::prefix('transaksi')->controller(TransaksiControllers::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::post('/riview', 'storeRating');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
            Route::get('/admin', 'transaksiAdmin');
            Route::post('/update-status/{id}', 'updateStatusItem');
        });
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
