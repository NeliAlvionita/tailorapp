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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@admin');
Route::get('/admin/admin', 'AdminController@index');
Route::get('/admin/admin/tambah', 'AdminController@tambah');
Route::post('/admin/admin', 'AdminController@store');
/* Route Tabel Pelanggan*/
Route::get('/admin/pelanggan', 'PelangganController@index');
// Route Tabel Layanan
Route::get('/admin/layanan', 'LayananController@index');
Route::get('/admin/layanan/tambah', 'LayananController@tambah');
Route::post('/admin/layanan', 'LayananController@store');
Route::get('/admin/layanan/{id_layanan}/ubah', 'LayananController@ubah');
Route::put('/admin/layanan/{id_layanan}', 'LayananController@update');
Route::delete('/admin/layanan/{id_layanan}', 'LayananController@delete');
// Route Tabel Kategori 
Route::get('/admin/kategori', 'KategoriController@index');
Route::get('/admin/kategori/tambah', 'KategoriController@tambah');
Route::post('/admin/kategori', 'KategoriController@store');
Route::get('/admin/kategori/{id_kategori}/detail', 'KategoriController@show');
Route::get('/admin/kategori/{id_kategori}/ubah', 'KategoriController@ubah');
Route::put('/admin/kategori/{id_kategori}', 'KategoriController@update');
Route::delete('/admin/kategori/{id_kategori}', 'KategoriController@delete');
// Route Tabel Produk 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
