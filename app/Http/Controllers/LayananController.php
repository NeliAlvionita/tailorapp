<?php

namespace App\Http\Controllers;
use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();

        return view('admin/layanan/index', ['layanan'=> $layanan]);
    }

    public function tambah(){
        return view('admin/layanan/tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_layanan' => ['required', 'string', 'max:255'],
        ]);

        $layanan = new Layanan();
        $layanan->nama_layanan = $request->nama_layanan;
        if ($layanan->save()) {
            return redirect('/admin/layanan');
        }
    }
    public function ubah(Request $request)
    {
        $layanan = Layanan::find($request->id_layanan);
        return view('/admin/layanan/ubah',  ['layanan' => $layanan]);
    }
    public function update(Request $request)
    {
        $layanan = Layanan::findOrFail($request->id_layanan);
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->save();

        return redirect('/admin/layanan');
    }

    

    public function delete(Request $request)
    {
        $layanan = Layanan::findOrFail($request->id_layanan);

        if ($layanan->delete()) {
            return redirect('/admin/layanan');
        }
    }
}
