<?php

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
