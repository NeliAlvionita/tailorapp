<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::all();
        return view('admin/footer/index', ['footer'=> $footer]);
    }

    public function ubah(Request $request){
        $footer = Footer::find($request->id_footer);
        return view('admin/footer/ubah', ['footer' => $footer]);
    }

    public function update(Request $request)
    {
        
        $footer = Footer::find($request->id_footer);
        $this->validate($request, [
            'nama_toko' => ['required', 'string', 'max:255'],
            'alamat_toko' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['required', 'string', 'max:255'],
            'email_toko' => ['required', 'string', 'max:255'],
            'tentang' => ['required', 'string', 'max:255'],
        ]);
        $footer->nama_toko=$request->nama_toko;
        $footer->alamat_toko=$request->alamat_toko;
        $footer->nomor_telepon=$request->nomor_telepon;
        $footer->email_toko=$request->email_toko;
        $footer->tentang=$request->tentang;
        $footer->save(); 
 

        return redirect('/admin/footer')->with('message','Berhasil Mengubah Bahan');
    }
}
