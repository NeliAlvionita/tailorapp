<?php

namespace App\Http\Controllers;
use App\Kategori;
use App\Produk;
use App\Bahan;
use App\Footer;
use Illuminate\Http\Request;


class PelangganProdukController extends Controller
{

    public function produk_all(){
        $footer = Footer::first();
        $kategori = Kategori::all();
        $produk = Produk::paginate(6);
        return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
            'footer' => $footer
        ]);
    }

    public function cari(Request $request){
       // menangkap data pencarian
       $footer = Footer::first();
       $kategori = Kategori::all();
       $cari = $request->cari;

       // mengambil data dari table produk sesuai pencarian data
       $produk = Produk::where('nama_produk','like',"%".$cari."%")
       ->paginate(6);

       // mengirim data produk ke view produk
       return view('pelanggan/produk/produk_all', [
           'produk' => $produk,
           'kategori' => $kategori,
           'footer' => $footer
       ]);
    }

    public function produk_kategori(Request $request){
        $footer = Footer::first();
        $kategori = Kategori::all();
        $produk = Produk::where('id_kategori', $request->id_kategori)->paginate(6);
        return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
            'footer' => $footer
        ]);
    }

    public function produk_detail(Request $request){
        $footer = Footer::first();
        $bahan = Bahan::where('nama_bahan','like',"%".$request->nama_bahan."%")->get();
        $kategori = Kategori::all();
        $produk_detail = Produk::find($request->id_produk);

        if($produk_detail) {
            $this->produk_detail = $produk_detail;
        }
        return view('pelanggan/produk/produk_detail', [
            'produk_detail' => $produk_detail,
            'kategori' => $kategori,
            'bahan' => $bahan,
            'footer' => $footer
        ]);
    }
}
