<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class BerandaController extends Controller
{

    public function beranda()
    {
        return view('pelanggan/index');
    }

}
