<?php

namespace App\Http\Controllers;
use App\Produk;
use Illuminate\Http\Request;

class PelangganPemesananController extends Controller
{
    public function index($id_produk){
        $produk = Produk::find($id_produk);
        return view('pelanggan/pemesanan/index', [
            'produk' => $produk,
        ]);
    }
}
