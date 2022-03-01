<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Layanan;
use App\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('admin/produk/index', ['produk'=> $produk]);
    }

    public function tambah(){
        $listLayanan = Layanan::all();
        $listKategori = Kategori::all();
        return view('admin/produk/tambah', ['listLayanan' => $listLayanan], ['listKategori' => $listKategori]);
    }

    public function store(Request $request)
    {
        // dd($request->gambar_ukuran);

        $this->validate($request, [
            'id_layanan' => ['required'],
            'id_kategori' => ['required'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'foto_produk' => ['mimes:jpeg,png,jpg,gif,svg'],
            'harga' => ['required', 'numeric'],
            'detail_produk' => ['required', 'string', 'max:255'],
        ]);
        

        $input = $request->all();

        if ($foto_produk = $request->file('foto_produk')) {
            $destinationPath = 'foto_produk/';
            $profileImage = date('YmdHis') . "." . $foto_produk->getClientOriginalExtension();
            $foto_produk->move($destinationPath, $profileImage);
            $input['foto_produk'] = "$profileImage";
        }
        
        Produk::create($input);
   
        return redirect('/admin/produk')->with('success','Product created successfully.');
    }

    public function show(Request $request)
    {
        $produk = Produk::find($request->id_produk);
        return view('admin/produk/detail', ['produk' => $produk]);
    }

    public function ubah(Request $request)
    {
        $listLayanan = Layanan::all();
        $listKategori = Kategori::all();
        $produk = Produk::find($request->id_produk);
        return view('/admin/produk/ubah',['produk' => $produk, 'listLayanan' => $listLayanan, 'listKategori' => $listKategori]);
    }

    public function update(Request $request, Produk $produk)
    {
        
        $produk = Produk::find($request->id_produk);
        $this->validate($request, [
            'id_layanan' => ['required'],
            'id_kategori' => ['required'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'foto_produk' => ['mimes:jpeg,png,jpg,gif,svg'],
            'harga' => ['required', 'numeric'],
            'detail_produk' => ['required', 'string', 'max:255'],
        ]);

        if ($foto_produk = $request->file('foto_produk')) {
            $destinationPath = 'foto_produk/';
            $profileImage = date('YmdHis') . "." . $foto_produk->getClientOriginalExtension();
            $foto_produk->move($destinationPath, $profileImage);
            // $input['foto_produk'] = "$profileImage";
        }
        
        $produk->id_layanan=$request->id_layanan;
        $produk->id_kategori=$request->id_kategori;
        $produk->nama_produk=$request->nama_produk;
        $produk->harga=$request->harga;
        $produk->detail_produk=$request->detail_produk;
        $produk->save(); 
 

        return redirect('/admin/produk')->with('success','Product created successfully.');
    }

    public function delete(Request $request)
    {
        $produk = Produk::findOrFail($request->id_produk);

        if ($produk->delete()) {
            return redirect('/admin/produk');
        }
    }
}
