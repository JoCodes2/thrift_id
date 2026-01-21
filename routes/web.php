<?php

use App\Http\Controllers\CMS\UserController;
use Illuminate\Support\Facades\Route;

// route auth
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

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

// route admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// route api
Route::prefix('thrif-id')->group(function () {
    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });
});
Route::middleware(['auth', 'web'])->group(function () {});
