<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])-> name('landing');
Route::get('/detail/{slug}', [\App\Http\Controllers\LandingController::class, 'detailProduk'])->name('produk.detail');
Route::get('/kategori/{slug}', [\App\Http\Controllers\LandingController::class, 'perKategori'])->name('landing.kategori');
Route::get('/allprodak', [\App\Http\Controllers\LandingController::class, 'allProduk'])->name('allproduk');
Route::get('/cariprodak', [\App\Http\Controllers\LandingController::class, 'cariProduk'])->name('cariProduk');
Route::get('/search-all', [\App\Http\Controllers\LandingController::class, 'searchAllProduk'])->name('searchAllProduk');
Route::post('/tambah-keranjang', [\App\Http\Controllers\LandingController::class, 'tambahKeranjang'])->name('landing.keranjang');
Route::get('/list-keranjang', [\App\Http\Controllers\LandingController::class, 'listKeranjang'])->name('landing.listkeranjang');
Route::delete('/delete-keranjang/{id}', [\App\Http\Controllers\LandingController::class, 'delKeranjang'])->name('landing.delete');
Route::get('/checkout-keranjang/{username}', [\App\Http\Controllers\LandingController::class, 'checkout'])->name('landing.checkout');
Route::put('/checkout-update', [\App\Http\Controllers\LandingController::class, 'updateAddress'])->name('landing.updateAddress');
Route::get('/checkout-history', [\App\Http\Controllers\LandingController::class, 'history'])->name('landing.history');

Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
// (/profile sebagai endpoint)
Route::resource('/profile', UserController::class)->middleware('auth')->except('create');
Route::resource('/produk', ProdukController::class)->middleware('auth')->except('show');
Route::get('/search', [ProdukController::class, 'search'])->name('search');

Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table')->middleware('auth');

Route::get('/ganti', [App\Http\Controllers\ChangePasswordController::class, 'ganti'])->name('ganti')->middleware('auth');
Route::put('/update-pass', [App\Http\Controllers\ChangePasswordController::class, 'UpdatePass'])->name('update-pass')->middleware('auth');

//Kategori Route
Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'index'])-> name('kategori.index')->middleware('auth');
Route::delete('/delete-kategori/{id}', [\App\Http\Controllers\KategoriController::class, 'deleteKategori'])-> name('kategori.delete')->middleware('auth');
Route::put('/update-kategori/{id}', [\App\Http\Controllers\KategoriController::class, 'updateKategori'])-> name('kategori.update')->middleware('auth');
Route::post('/tambah-kategori', [\App\Http\Controllers\KategoriController::class, 'addKategori'])-> name('kategori.add')->middleware('auth');

// Transaksi
Route::get('/pending', [App\Http\Controllers\TransaksiController::class, 'pending'])->name('pending')->middleware('auth');
Route::put('/pending-update', [App\Http\Controllers\TransaksiController::class, 'edtPending'])->name('pending.update')->middleware('auth');
Route::get('/lunas', [App\Http\Controllers\TransaksiController::class, 'lunas'])->name('lunas')->middleware('auth');
Route::put('/lunas-update', [App\Http\Controllers\TransaksiController::class, 'edtLunas'])->name('lunas.update')->middleware('auth');
Route::get('/dikirim', [App\Http\Controllers\TransaksiController::class, 'dikirim'])->name('dikirim')->middleware('auth');