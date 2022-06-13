<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Testimoni;
use App\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class BerandaController extends Controller
{
    public function beranda()
    {
        $footer = Footer::first();
        $testimoni = Testimoni::paginate(5);
        return view('pelanggan/index', ['testimoni' => $testimoni], ['footer' => $footer]);
    }
}
