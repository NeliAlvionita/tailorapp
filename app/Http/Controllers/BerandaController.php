<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Testimoni;
use App\Footer;
use App\Faq;
use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class BerandaController extends Controller
{
    public function beranda()
    {
        $footer = Footer::first();
        $berita = Berita::all();
        $produk = Produk::paginate(6);
        $testimoni = Testimoni::paginate(5);
        return view('pelanggan/index', compact('produk', 'testimoni', 'footer', 'berita'));
    }

    public function faq()
    {
        $footer = Footer::first();
        $faq = Faq::paginate(10);
        return view('pelanggan.faq', ['faq' => $faq, 'footer' => $footer]);
    }

    public function detail_berita(Request $request){
        $footer = Footer::first();
        $berita = Berita::find($request->id_berita);
        return view('pelanggan.berita', ['berita' => $berita, 'footer' => $footer]);
    }
}
