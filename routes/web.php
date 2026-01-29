<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\DeskripsiprodukController;
use App\Http\Controllers\CMS\KategoriController;
use App\Http\Controllers\CMS\ProdukController;
use App\Http\Controllers\CMS\TokoController;
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
Route::get('/keranjang', function () {
    return view('pages.keranjang');
});
Route::get('/pembayaran', function () {
    return view('pages.pembayaran');
});
Route::get('/detail-toko', function () {
    $toko = App\Models\TokoModel::first();
    return redirect('/detail-toko/' . $toko->id);
});
Route::get('/detail-toko/{id}', [PageController::class, 'profileToko']);

//admin web
Route::get('/toko', function () {
    return view('admin.toko');
});

Route::get('/kategori', function () {
    return view('admin.kategori');
});

Route::get('/produk-admin', function () {
    return view('admin.produk');
});

// route auth
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('thrif-id/login', [AuthController::class, 'login'])->name('login');

Route::prefix('thrif-id/user')->controller(UserController::class)->group(function () {
    Route::post('/create', 'createData');
});
Route::middleware(['auth', 'web'])->group(function () {
    // route admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // route pembeli
    Route::get('/profile', function () {
        return view('pages.profile-pembeli');
    });
    Route::get('/riwayat-pesanan', function () {
        return view('pages.riwayat-pesanan');
    });
    Route::get('/riwayat-pesanan/menunggu', function () {
        return view('pages.riwayat-pesanan-menunggu');
    });
    Route::get('/riwayat-pesanan/dikirim', function () {
        return view('pages.riwayat-pesanan-dikirim');
    });
    Route::get('/riwayat-pesanan/selesai', function () {
        return view('pages.riwayat-pesanan-selesai');
    });

    // route api
    Route::prefix('thrif-id')->group(function () {
        Route::prefix('user')->controller(UserController::class)->group(function () {
            Route::get('/', 'getAllData');
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
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
