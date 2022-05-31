<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class BerandaController extends Controller
{
    public function beranda()
    {
        $testimoni = Testimoni::paginate(5);
        return view('pelanggan/index', ['testimoni' => $testimoni]);
    }
}
