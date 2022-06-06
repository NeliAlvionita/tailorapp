<?php

namespace App\Http\Controllers;
use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;


class PelangganProdukController extends Controller
{

    public function produk_all(){
        $kategori = Kategori::all();
        $produk = Produk::paginate(6);
        return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function cari(Request $request){
        // menangkap data pencarian
        $kategori = Kategori::all();
		$cari = $request->cari;
        dd($cari);
 
        // mengambil data dari table produk sesuai pencarian data
        $produk = Produk::where('nama_produk','like',"%".$cari."%")
        ->paginate(6);

        // mengirim data pegawai ke view produk
		return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function produk_kategori(Request $request){
        $kategori = Kategori::all();
        $produk = Produk::where('id_kategori', $request->id_kategori)->paginate(6);
        return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function produk_detail($id_produk){
        $kategori = Kategori::all();
        $produk_detail = Produk::find($id_produk);

        if($produk_detail) {
            $this->produk_detail = $produk_detail;
        }
        return view('pelanggan/produk/produk_detail', [
            'produk_detail' => $produk_detail,
            'kategori' => $kategori,
        ]);
    }
}
