<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Kategori;
use App\Bahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('admin/produk/index', ['produk'=> $produk]);
    }

    public function tambah(){
        $listBahan = DB::table('bahan')->select('nama_bahan')->orderBy('nama_bahan')->groupby('nama_bahan')->get();
        $listKategori = Kategori::all();
        return view('admin/produk/tambah', ['listKategori' => $listKategori, 'listBahan' => $listBahan]);
    }

    public function store(Request $request)
    {
        // dd($request->gambar_ukuran);

        $this->validate($request, [
            'id_kategori' => ['required'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'nama_bahan' => ['required', 'string'],
            'foto_produk' => ['mimes:jpeg,png,jpg,gif,svg'],
            'harga' => ['required', 'numeric'],
            'detail_produk' => ['required', 'string', 'max:255'],
            'berat_produk' => ['required', 'numeric'],
        ]);
        

        $input = $request->all();

        if ($foto_produk = $request->file('foto_produk')) {
            $destinationPath = 'foto_produk/';
            $profileImage = date('YmdHis') . "." . $foto_produk->getClientOriginalExtension();
            $foto_produk->move($destinationPath, $profileImage);
            $input['foto_produk'] = "$profileImage";
        }
        
        Produk::create($input);
   
        return redirect('/admin/produk')->with('message','Berhasil Menambah Produk');
    }

    public function show(Request $request)
    {
        $produk = Produk::find($request->id_produk);
        return view('admin/produk/detail', ['produk' => $produk]);
    }

    public function ubah(Request $request)
    {
        $listBahan = DB::table('bahan')->select('nama_bahan')->orderBy('nama_bahan')->groupby('nama_bahan')->get();
        $listKategori = Kategori::all();
        $produk = Produk::find($request->id_produk);
        return view('/admin/produk/ubah',['produk' => $produk, 'listKategori' => $listKategori, 'listBahan' => $listBahan]);
    }

    public function update(Request $request, Produk $produk)
    {
        
        $produk = Produk::find($request->id_produk);
        $this->validate($request, [
            'id_kategori' => ['required'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'nama_bahan' => ['required', 'string', 'max:255'],
            'foto_produk' => ['mimes:jpeg,png,jpg,gif,svg'],
            'harga' => ['required', 'numeric'],
            'detail_produk' => ['required', 'string', 'max:255'],
            'berat_produk' => ['required', 'numeric'],
        ]);

        if ($foto_produk = $request->file('foto_produk')) {
            $destinationPath = 'foto_produk/';
            $profileImage = date('YmdHis') . "." . $foto_produk->getClientOriginalExtension();
            $foto_produk->move($destinationPath, $profileImage);
            $produk->foto_produk=$profileImage;
        }
    
        $produk->id_kategori=$request->id_kategori;
        $produk->nama_produk=$request->nama_produk;
        $produk->nama_bahan=$request->nama_bahan;
        $produk->harga=$request->harga;
        $produk->detail_produk=$request->detail_produk;
        $produk->berat_produk=$request->berat_produk;
        $produk->save(); 
 

        return redirect('/admin/produk')->with('message','Berhasil Mengubah Data Produk');
    }

    public function delete(Request $request)
    {
        $produk = Produk::findOrFail($request->id_produk);

        if (count($produk->detail_pemesanan) == 0) {
            $produk->delete();
                return redirect('/admin/produk')->with('message', 'Berhasil Menghapus Data');
            
        } else {
            return redirect('/admin/produk')->with('message', 'Gagal Menghapus Data, Ada Pemesanan yang terkait dengan produk ini');
        }
    }
}
