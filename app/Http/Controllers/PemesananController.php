<?php

namespace App\Http\Controllers;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index(){ 
        $pemesanan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_pemesanan')
            ->select('pemesanan.*', 'users.name')
            ->get();
        return view('admin/pemesanan/index', ['pemesanan' => $pemesanan]);
    }
}
