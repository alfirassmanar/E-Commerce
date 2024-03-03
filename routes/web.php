<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LapTransaksiController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;

// untuk front end aja
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi-proses', [LoginController::class, 'registrasi_proses'])->name('registrasi-proses');

//ROUTE ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/home', [HomeController::class, 'admin'])->name('home');
    // ROUTE UNTUK DATA TRANSAKSI ADMIN
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/kasir/{id}', [TransaksiController::class, 'kasir'])->name('transaksi.kasir');
    // ROUTE UNTUK DATA DISKON ADMIN
    Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon.index');
    Route::post('/diskon/update/{id}', [DiskonController::class, 'update'])->name('diskon.update');
    // DATA LAPORAN PEMBELIAN
    Route::get('/laporan', [LapTransaksiController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/destroy/{id}', [LapTransaksiController::class, 'destroy'])->name('laporan.destroy');
    // Route::get('/laporan/exportlaporan', [LapTransaksiController::class, 'export'])->name('laporan.exporlaporan');

    // Route::post('/diskon/update/{id}', [DiskonController::class, 'update'])->name('diskon.update');


});

// ROUTE KASIR
Route::group(['prefix' => 'kasir', 'middleware' => ['auth'], 'as' => 'kasir.'], function () {
    Route::get('/home', [HomeController::class, 'kasir'])->name('home');
    
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/kasir/{id}', [TransaksiController::class, 'kasir'])->name('transaksi.kasir');
});

// ROUTE PELANGGAN (USER)
Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
    Route::get('/home', [HomeController::class, 'user'])->name('home');

   // ROUTE DATA TRANSAKSI UNTUK PELANGGAN
    Route::get('/transaksi/cart', [TransaksiController::class, 'cart'])->name('transaksi.cart');
    Route::get('/transaksi/produk', [TransaksiController::class, 'basket'])->name('transaksi.produk');
    Route::get('/transaksi/basket/{namaJenis}', [TransaksiController::class, 'basket'])->name('transaksi.basket');
    // ROUTE KERANJANG UNTUK PELANGGAN
    Route::get('/keranjang', [BasketController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah_barang/{idBarang}', [BasketController::class, 'tambah_barang'])->name('keranjang.tambah_barang');
    Route::post('/keranjang/removeFromCart/{idBarang}', [BasketController::class, 'removeFromCart'])->name('cart.remove');
    // ROUTE CHECKOUT UNTUK PELANGGAN
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/checkout/removeFromCart/{idBarang}', [CheckoutController::class, 'removeFromCart'])->name('cart.destroy');

});

// CRUD DATA USER
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

// CRUD DATA JENIS BARANG
Route::get('/jenisBarang', [JBarangController::class, 'index']);
Route::post('/jenisBarang/store', [JBarangController::class, 'store']);
Route::post('/jenisBarang/update/{idJenis}', [JBarangController::class, 'update']);
Route::get('/jenisBarang/destroy/{idJenis}', [JBarangController::class, 'destroy']);

// CRUD DATA BARANG
Route::get('/dataBarang', [BarangController::class, 'index']);
Route::post('/dataBarang/store', [BarangController::class, 'store']);
Route::post('/dataBarang/update/{idBarang}', [BarangController::class, 'update']);
Route::get('/dataBarang/destroy/{idBarang}', [BarangController::class, 'destroy']);

// SETTING DISKON


// SETTING PROFILE
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/update_profile/{id}', [UserController::class, 'update_profile']);

// DATA TRANSAKSI
// Route::get('/transaksi/create', [TransaksiController::class, 'create']);

//DATA KERANJANG CHECKOUT
// Route::get('/keranjang/tambah_barang/{idBarang}', [BasketController::class, 'tambah_barang']);


// DATA LAPORAN PEMBELIAN