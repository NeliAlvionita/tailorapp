<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Footer;
use App\Testimoni;

class TestimoniController extends Controller
{
    public function tambah(Request $request){
        $footer = Footer::first();
        $pemesanan = Pemesanan::find($request->id_pemesanan);
        return view('pelanggan/riwayat/tambah-testimoni', ['pemesanan' => $pemesanan, 'footer' => $footer]);
    }

    public function store(Request $request){
        $testimoni = Testimoni::create([
            'id_pemesanan' => $request->id_pemesanan,
            'isi_testimoni' => $request->isi_testimoni
        ]);
        $testimoni->save();

        return redirect(route('riwayat'))->with('message', 'Berhasil Menambahkan Testimoni');
    }

    public function admin(){
        $testimoni = Testimoni::all();
        return view('admin/testimoni/index', ['testimoni' => $testimoni]);
    }

    public function index()
    {
        $testimoni = Testimoni::paginate(5);
        return view('pelanggan.testimoni', ['testimoni' => $testimoni]);
    }
}
