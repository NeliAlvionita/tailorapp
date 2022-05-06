<?php

namespace App\Http\Controllers;
use App\Kategori;
use App\Produk;
use App\User;


class PelangganProdukController extends Controller
{

    public $search;

    protected $updateQueryString = ['search'];

    public function mount($id_kategori)
    {
        $kategoriDetail = Kategori::find($id_kategori);

        if($kategoriDetail) {
            $this->kategori = $kategoriDetail;
        }
    }

    public function produk_kategori($id_kategori)
    {
        $kategori = Kategori::all();
        if($this->search) {
            $produk = Produk::where('id_kategori', $this->kategori->id_kategori)->where('nama_produk', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $produk = Produk::where('id_kategori', $this->kategori->id_kategori)->paginate(8);
        }
        
        return view('pelanggan/produk/produk_kategori', [
            'produk' => $produk,
            'kategori' => $kategori,
            'title' => 'Produk '.$this->kategori->nama_kategori
        ]);
    }

    public function produk_all(){
            $kategori = Kategori::all();
            if($this->search) {
                $produk = Produk::where('nama_produk', 'like', '%'.$this->search.'%')->paginate(8);
            }else {
                $produk = Produk::paginate(8);
            }
        
        return view('pelanggan/produk/produk_all', [
            'produk' => $produk,
            'kategori' => $kategori,
            'title' => 'List Produk'
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

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
