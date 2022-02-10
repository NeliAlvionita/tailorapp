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
        // dd($request->gambar_ukuran);

        $this->validate($request, [
            'nama_kategori' => ['required', 'string', 'max:255'],
            'gambar_ukuran' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);
        

        $input = $request->all();

        if ($gambar_ukuran = $request->file('gambar_ukuran')) {
            $destinationPath = 'gambar_ukuran/';
            $profileImage = date('YmdHis') . "." . $gambar_ukuran->getClientOriginalExtension();
            $gambar_ukuran->move($destinationPath, $profileImage);
            $input['gambar_ukuran'] = "$profileImage";
        }
        
        Kategori::create($input);
   
        return redirect('/admin/kategori')->with('success','Product created successfully.');
    }

    public function show(Request $request)
    {
        $kategori = Kategori::find($request->id_kategori);
        return view('admin/kategori/detail', ['kategori' => $kategori]);
    }
}
