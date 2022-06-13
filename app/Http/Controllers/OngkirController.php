<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Province;
use App\City;
use App\Courier;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OngkirController extends Controller
{
    public function getCities($id){
    $city = City::where('province_id', $id)->pluck('name', 'city_id');
    return json_encode($city);
    }

    public function submit(Request $request){
        
        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $request->city_origin,
            'destination' => $request->city_destination,
            'weight'  => $request->total_berat,
            'courier' => "jne",
        ])->get();
        $biaya_ongkir = $cost[0]['costs'][0]['cost'][0]['value'];

        $this->validate($request,[
            'alamat_pengiriman' => 'required',
        ]);
        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        $pemesanan->alamat_pengiriman = $request->alamat_pengiriman;
        $pemesanan->biaya_ongkir = $biaya_ongkir;
        $pemesanan->ekspedisi = "JNE";
        $pemesanan->update();

        return redirect(route('checkout'));
    }
}
