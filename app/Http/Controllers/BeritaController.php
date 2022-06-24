<?php

namespace App\Http\Controllers;
use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::all();
        return view('admin/berita', ['berita' => $berita]);
    }

    public function tambah(){
        return view('admin/berita/tambah');
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:255'],
            'gambar_berita' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);
        

        $input = $request->all();

        if ($gambar_berita = $request->file('gambar_berita')) {
            $destinationPath = 'gambar_berita/';
            $profileImage = date('YmdHis') . "." . $gambar_berita->getClientOriginalExtension();
            $gambar_berita->move($destinationPath, $profileImage);
            $input['gambar_berita'] = "$profileImage";
        }
        
        Berita::create($input);
   
        return redirect('/admin/berita')->with('message','Berhasil Menambahkan Berita');
    }

    public function detail(Request $request){
        $berita = Berita::find($request->id_berita);
        return view('admin/berita/detail', ['berita' => $berita]);
    }

    public function ubah(Request $request){
        $berita = Berita::find($request->id_berita);
        return view('admin/berita/ubah', ['berita' => $berita]);
    }

    public function update(Request $request){

        $berita = Berita::find($request->id_kategori);
        $this->validate($request, [
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:255'],
            'gambar_berita' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($gambar_berita = $request->file('gambar_berita')) {
            $destinationPath = 'gambar_berita/';
            $profileImage = date('YmdHis') . "." . $gambar_berita->getClientOriginalExtension();
            $gambar_berita->move($destinationPath, $profileImage);
            $berita->gambar_berita=$profileImage;
        }
        
        $berita->judul=$request->judul;
        $berita->isi=$request->isi;
        $berita->detail=$request->detail;
        $berita->save();
        return redirect('/admin/berita')->with('message','Berhasil Mengupdate Berita');
    }

    public function delete(Request $request)
    {
        $berita = Berita::findOrFail($request->id_berita);
        if ($berita->delete()) {
            return redirect('/admin/berita')->with('message', 'Berhasil Menghapus Data');
        }
        
    }
}
