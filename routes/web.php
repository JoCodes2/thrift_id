<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\UserController;
use Illuminate\Support\Facades\Route;



// ui web
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/produk', function () {
    return view('pages.produk');
});
Route::get('/detail-produk', function () {
    return view('pages.detail-produk');
});
Route::get('/keranjang', function () {
    return view('pages.keranjang');
});
Route::get('/pembayaran', function () {
    return view('pages.pembayaran');
});
Route::get('/rating', function () {
    return view('pages.rating');
});
Route::get('/inv', function () {
    return view('pages.invoice');
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
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
