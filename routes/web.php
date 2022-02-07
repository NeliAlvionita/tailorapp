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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
