<?php

namespace App\Http\Controllers;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('admin/kategori/index', ['kategori'=> $kategori]);
    }

    public function tambah(){
        return view('admin/kategori/tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => ['required', 'string', 'max:255'],
            'gambar_ukuran' => ['required', 'string', 'max:255'],
        ]);

        $kategori = new Kategori();
        $kategori->gambar_ukuran = $request->gambar_ukuran;
        if ($kategori->save()) {
            return redirect('/admin/kategori');
        }
    }
}
