<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Testimoni;
use App\Footer;
use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class BerandaController extends Controller
{
    public function beranda()
    {
        $footer = Footer::first();
        $produk = Produk::paginate(6);
        $testimoni = Testimoni::paginate(5);
        return view('pelanggan/index', compact('produk', 'testimoni', 'footer'));
    }

    public function faq()
    {
        $footer = Footer::first();
        $faq = Faq::paginate(10);
        return view('pelanggan.faq', ['faq' => $faq, 'footer' => $footer]);
    }
}
