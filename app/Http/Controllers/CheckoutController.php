<?php

namespace App\Http\Controllers;
use App\Province;
use App\Pemesanan;
use App\Footer;
use App\Pembayaran;
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
        $provinces = Province::pluck('name', 'province_id');

        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        return view('pelanggan/pemesanan/checkout',[
            'pemesanan' => $pemesanan,
            'provinces' => $provinces,
            'footer' => $footer
        ]);
    }

    public function checkout(Request $request){
        $this->validate($request,[
            'alamat_pengiriman' => 'required',
            'city_destination' => 'required',
            'province_destination' => 'required'
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
        // $pemesanan->alamat_pengiriman = $request->alamat_pengiriman .',' .$request->city_destination .',' .$request->province_destination;
        // dd($pemesanan->alamat_pengiriman);
        $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
        $pemesanan->biaya_ongkir = $biaya_ongkir;
        $pemesanan->status_pemesanan = 'belum bayar';
        $pemesanan->ekspedisi = "JNE";
        $pemesanan->update();
        Pembayaran::create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'status_pembayaran' => 'belum bayar',
        ]);
        return redirect(route('riwayat'))->with('message','Pesanan Masuk, Silahkan Periksa Pada Menu Pembayaran untuk melakukan konfirmasi pembayaran');

    }
}
