<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::post('/admin/admin', 'AdminController@store')->name('simpan.admin');
    Route::get('/admin/admin/{id}/ubah', 'AdminController@ubah');
    Route::put('/admin/admin/{id}', 'AdminController@update');
    Route::delete('/admin/admin/{id}', 'AdminController@delete');
    /* Route Tabel Pelanggan*/
    Route::get('/admin/pelanggan', 'PelangganController@index');
    Route::get('/admin/pelanggan/{id}/detail', 'PelangganController@detail');
    // Route Tabel Kategori 
    Route::get('/admin/kategori', 'KategoriController@index');
    Route::get('/admin/kategori/tambah', 'KategoriController@tambah');
    Route::post('/admin/kategori', 'KategoriController@store');
    Route::get('/admin/kategori/{id_kategori}/detail', 'KategoriController@show');
    Route::get('/admin/kategori/{id_kategori}/ubah', 'KategoriController@ubah');
    Route::put('/admin/kategori/{id_kategori}', 'KategoriController@update');
    Route::delete('/admin/kategori/{id_kategori}', 'KategoriController@delete');
    // Route Tabel Bahan
    Route::get('/admin/bahan', 'BahanController@index');
    Route::get('/admin/bahan/tambah', 'BahanController@tambah');
    Route::post('/admin/bahan', 'BahanController@store');
    Route::get('/admin/bahan/{id_bahan}/ubah', 'BahanController@ubah');
    Route::put('/admin/bahan/{id_bahan}', 'BahanController@update');
    Route::delete('/admin/bahan/{id_bahan}', 'BahanController@delete');
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
    Route::put('/admin/pemesanan/{id_pemesanan}/tanggal_proses', 'PemesananController@tanggal_proses');
    Route::put('/admin/pemesanan/{id_pemesanan}/resi', 'PemesananController@submitResi');
    Route::get('/admin/pemesanan/{id_pemesanan}/pembayaran', 'PemesananController@detail_bayar');
    Route::put('/admin/pemesanan/{id_pemesanan}/update', 'PemesananController@update_bayar');
    Route::get('/admin/pemesanan/{id_pemesanan}/ukuran', 'PemesananController@detail_ukuran');
    Route::get('/admin/pemesanan/{id_pemesanan}/cetak-ukuran', 'PemesananController@cetak_ukuran')->name('admin.cetak.ukuran');
    // Route Testimoni
    Route::get('/admin/testimoni', 'TestimoniController@admin');
    // Route Footer
    Route::get('/admin/footer', 'FooterController@index');
    Route::get('/admin/footer/{id_footer}/ubah', 'FooterController@ubah');
    Route::put('/admin/footer/{id_footer}', 'FooterController@update');
    // Route FaQ
    Route::get('/admin/faq', 'FaqController@index');
    Route::get('/admin/faq/tambah', 'FaqController@tambah');
    Route::post('/admin/faq', 'FaqController@store');
    Route::get('/admin/faq/{id_faq}/ubah', 'FaqController@ubah');
    Route::put('/admin/faq/{id_faq}', 'FaqController@update');
    Route::delete('/admin/faq/{id_faq}', 'FaqController@delete');

});
Route::group(['middleware' => ['auth', 'ceklevel:admin,pemilik']], function () {
    // Route Pengeluaran
    Route::get('/admin/pengeluaran', 'PengeluaranController@index');
    Route::get('/admin/pengeluaran/tambah', 'PengeluaranController@tambah');
    Route::post('/admin/pengeluaran', 'PengeluaranController@store');
    Route::get('/admin/pengeluaran/{id_pengeluaran}/ubah', 'PengeluaranController@ubah');
    Route::put('/admin/pengeluaran/{id_pengeluaran}', 'PengeluaranController@update');
    Route::delete('/admin/pengeluaran/{id_pengeluaran}', 'PengeluaranController@delete');
    Route::get('/admin/pengeluaran/{id_pengeluaran}/detail', 'PengeluaranController@detail');
    Route::get('/admin/pengeluaran/{id_pengeluaran}/tambahdetail', 'PengeluaranController@tambah_detail');
    Route::post('/admin/detailpengeluaran', 'PengeluaranController@submit_detail');
    Route::get('/admin/detailpengeluaran/{id_detailpengeluaran}/ubah', 'PengeluaranController@ubah_detail');
    Route::put('/admin/detailpengeluaran/{id_detailpengeluaran}', 'PengeluaranController@update_detail');
    Route::delete('/admin/detailpengeluaran/{id_detailpengeluaran}', 'PengeluaranController@delete_detail');
    // Route Laporan
    Route::get('/admin', 'AdminController@admin');
    Route::get('/admin/laporan', 'LaporanController@index');
    Route::get('/admin/laporan/{id_pemesanan}/detail', 'LaporanController@detail');
    Route::get('/cetak-laporan/{tanggal_mulai}/{tanggal_akhir}', 'LaporanController@cetak')->name('cetak-laporan');
});
// Route Pelanggan
Route::get('/', 'BerandaController@beranda');
Route::get('/faq', 'BerandaController@faq');
Route::get('/pelanggan/akun', 'AkunController@lihat')->name('lihat.akun');
Route::get('/pelanggan/akun/{id}/ubah', 'AkunController@ubah')->name('ubah.akun');
Route::put('/pelanggan/akun/{id}', 'AkunController@update');
//produk
Route::get('/pelanggan/produk', 'PelangganProdukController@produk_all')->name('produk');
Route::get('/pelanggan/produk/{id_produk}', 'PelangganProdukController@produk_detail')->name('produk.detail');
Route::get('/pelanggan/produk/kategori/{id_kategori}', 'PelangganProdukController@produk_kategori');
Route::get('/pelanggan/cari/produk', 'PelangganProdukController@cari');
// pemesanan
Route::get('/pelanggan/produk/produk_detail/{id_produk}', 'PelangganPemesananController@index')->name('pemesanan.index');
// keranjang
Route::post('/pelanggan/pemesanan', 'PelangganPemesananController@masukkanKeranjang');
Route::get('/pelanggan/keranjang', 'KeranjangController@index')->name('keranjang');
Route::delete('/pelanggan/keranjang/{id_detailpemesanan}', 'KeranjangController@delete');
Route::get('/pelanggan/keranjang/{id_detailpemesanan}/ubah', 'KeranjangController@ubah');
Route::put('/pelanggan/keranjang/{id_detailpemesanan}', 'KeranjangController@update');
// checkout
Route::get('/pelanggan/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/pelanggan/checkout', 'CheckoutController@checkout')->name('checkoutfix');
//riwayat
Route::get('/pelanggan/riwayat', 'RiwayatController@index')->name('riwayat');
Route::get('/pelanggan/riwayat/{id_pemesanan}', 'RiwayatController@detail');
Route::get('/pelanggan/riwayat/{id_pemesanan}/bayar', 'RiwayatController@pembayaran')->name('riwayat.bayar');
Route::post('/pelanggan/riwayat/konfirm', 'RiwayatController@konfirm_bayar')->name('konfirm_bayar');
Route::get('/pelanggan/riwayat/{id_pemesanan}/cetak-nota', 'RiwayatController@cetak_nota')->name('cetak.nota');
Route::get('/pelanggan/riwayat/detail/{id_detailpemesanan}', 'RiwayatController@detailpemesanan');
//testimoni
Route::get('/pelanggan/riwayat/{id_pemesanan}/testimoni', 'TestimoniController@tambah')->name('tambah.testimoni');
Route::get('/pelanggan/testimoni', 'TestimoniController@index')->name('testi');
Route::post('/pelanggan/riwayat/testimoni', 'TestimoniController@store');

//ongkir
// Route::get('/ongkir', 'OngkirController@index');
Route::get('/ongkir/province/{province_id}/cities', 'OngkirController@getCities');
// Route::post('/ongkir', 'OngkirController@submit');

Auth::routes();

