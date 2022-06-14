<?php

namespace App\Http\Controllers;
use App\Province;
use App\Courier;
use App\City;
use App\Pemesanan;
use App\Footer;
use App\Detail_Pemesanan;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        $footer = Footer::first();
        $couriers = Courier::pluck('name', 'code');
        $provinces = Province::pluck('name', 'province_id');

        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        return view('pelanggan/pemesanan/checkout',[
            'pemesanan' => $pemesanan,
            
            'couriers' => $couriers,
            'provinces' => $provinces,
            'footer' => $footer
        ]);
    }

    public function checkout(Request $request){
        $this->validate($request,[
            'alamat_pengiriman' => 'required',
        ]);
        $cost = RajaOngkir::ongkosKirim([
            'origin'  => "255",
            'destination' => $request->city_destination,
            'weight'  => $request->total_berat,
            'courier' => "jne",
        ])->get();
        $biaya_ongkir = $cost[0]['costs'][0]['cost'][0]['value'];

        
        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        $pemesanan->alamat_pengiriman = $request->alamat_pengiriman;
        $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
        $pemesanan->biaya_ongkir = $biaya_ongkir;
        $pemesanan->status_pemesanan = 'belum bayar';
        $pemesanan->ekspedisi = "JNE";
        $pemesanan->update();
        return redirect('/')->with('message','Pesanan Masuk, Silahkan Periksa Pada Menu Pesanan untuk melakukan konfirmasi pembayaran');

    }
}
