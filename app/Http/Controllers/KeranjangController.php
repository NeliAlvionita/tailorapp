<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Pemesanan;
use App\Detail_Pemesanan;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        $detail_pemesanan = [];
        if(Auth::user()) {
            $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
            if($pemesanan)
            {
                $detail_pemesanan = Detail_Pemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
            }
        }
        return view('pelanggan/pemesanan/keranjang',[
            'pemesanan' => $pemesanan,
            'detail_pemesanan' => $detail_pemesanan
        ]);
    }
}
