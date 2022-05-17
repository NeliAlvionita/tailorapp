<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pemesanan;
use App\Detail_Pemesanan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        if(Auth::user())
        {
            $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan', '!=', '0')->get();
        }
        
        return view('pelanggan/riwayat/index',[
            'pemesanan' => $pemesanan,
        ]);
    }

    public function detail($id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);

        return view('pelanggan/riwayat/detail', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function pembayaran($id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);

        return view('pelanggan/riwayat/pembayaran', [
            'pemesanan' => $pemesanan
        ]);
    }
}
