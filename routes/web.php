<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/admin/admin', 'AdminController@index');
    Route::get('/admin/admin/tambah', 'AdminController@tambah')->name('tambah.admin');;
    Route::post('/admin/admin', 'AdminController@store');
    /* Route Tabel Pelanggan*/
    Route::get('/admin/pelanggan', 'PelangganController@index');
    // Route Tabel Kategori 
    Route::get('/admin/kategori', 'KategoriController@index');
    Route::get('/admin/kategori/tambah', 'KategoriController@tambah');
    Route::post('/admin/kategori', 'KategoriController@store');
    Route::get('/admin/kategori/{id_kategori}/detail', 'KategoriController@show');
    Route::get('/admin/kategori/{id_kategori}/ubah', 'KategoriController@ubah');
    Route::put('/admin/kategori/{id_kategori}', 'KategoriController@update');
    Route::delete('/admin/kategori/{id_kategori}', 'KategoriController@delete');
    // Route Tabel Produk 
    Route::get('/admin/produk', 'ProdukController@index');
    Route::get('/admin/produk/tambah', 'ProdukController@tambah');
    Route::post('/admin/produk', 'ProdukController@store');
    Route::get('/admin/produk/{id_produk}/detail', 'ProdukController@show');
    Route::get('/admin/produk/{id_produk}/ubah', 'ProdukController@ubah');
    Route::put('/admin/produk/{id_produk}', 'ProdukController@update');
    Route::delete('/admin/produk/{id_produk}', 'ProdukController@delete');
    // Route Pemesanan
    Route::get('/admin/pemesanan', 'PemesananController@index');
    Route::get('/admin/pemesanan/{id_pemesanan}/detail', 'PemesananController@detail');
    Route::put('/admin/pemesanan/{id_pemesanan}', 'PemesananController@update_status');
    Route::get('/admin/pemesanan/{id_pemesanan}/pembayaran', 'PemesananController@detail_bayar');
    Route::put('/admin/pemesanan/{id_pemesanan}/update', 'PemesananController@update_bayar');
});
// Route Laporan
Route::group(['middleware' => ['auth', 'ceklevel:admin,pemilik']], function () {
    Route::get('/admin', 'AdminController@admin');
    Route::get('/admin/laporan', 'LaporanController@index');
    Route::post('/admin/laporan/filer', 'LaporanController@filer');
});
// Route Pelanggan
Route::get('/', 'BerandaController@beranda');
Route::get('/pelanggan/produk', 'PelangganProdukController@produk_all')->name('produk');
Route::get('/pelanggan/produk/{id_produk}', 'PelangganProdukController@produk_detail')->name('produk.detail');
Route::get('/pelanggan/produk/{id_kategori}', 'PelangganProdukController@produk_kategori')->name('produk.kategori');
Route::get('/pelanggan/produk/produk_detail/{id_produk}', 'PelangganPemesananController@index')->name('pemesanan.index');
Auth::routes();
