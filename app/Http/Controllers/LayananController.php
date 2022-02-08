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
}
