<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;

class BahanController extends Controller
{
    public function index()
    {
        $bahan = Bahan::all();

        return view('admin/bahan/index', ['bahan'=> $bahan]);
    }

    public function tambah(){
        return view('admin/bahan/tambah');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_bahan' => ['required', 'string', 'max:255'],
            'ukuran' => ['required', 'string', 'max:255'],
            'harga_tambah' => ['required', 'numeric'],
        ]);
        

        $input = $request->all();
        Bahan::create($input);
   
        return redirect('/admin/bahan')->with('message','Berhasil Menambahkan Bahan');
    }

    public function ubah(Request $request){
        $bahan = Bahan::find($request->id_bahan);
        return view('admin/bahan/ubah', ['bahan' => $bahan]);
    }

    public function update(Request $request)
    {
        
        $bahan = Bahan::find($request->id_bahan);
        $this->validate($request, [
            'nama_bahan' => ['required', 'string', 'max:255'],
            'ukuran' => ['required', 'string', 'max:255'],
            'harga_tambah' => ['required', 'numeric'],
        ]);
        $bahan->nama_bahan=$request->nama_bahan;
        $bahan->ukuran=$request->ukuran;
        $bahan->harga_tambah=$request->harga_tambah;
        $bahan->save(); 
 

        return redirect('/admin/bahan')->with('message','Berhasil Mengubah Bahan');
    }

    public function delete(Request $request)
    {
        $bahan = Bahan::findOrFail($request->id_bahan);
        if ($bahan->delete()) {
            return redirect('/admin/bahan')->with('message', 'Berhasil Menghapus Data');
        }
        
    }
}
