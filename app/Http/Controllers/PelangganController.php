<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan = User::where('level', '=', 'pelanggan')->get();

        return view('admin/pelanggan/index', ['pelanggan'=> $pelanggan]);
    }
}
