<?php

namespace App\Http\Controllers;
use App\Province;
use App\Courier;
use App\Pembayaran;
use App\Pemesanan;
use App\Footer;
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
            'nama' => 'required',
            'bank' => 'required',
            'jumlah' => 'required',
            'tanggal_pembayaran' => 'required',
            'bukti' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);

        //update data pemesanan
        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
        $pemesanan->status_pemesanan = 'belum diproses';
        $pemesanan->update();

        //simpan data pembayaran
        if ($bukti = $request->file('bukti')) {
            $destinationPath = 'bukti/';
            $profileImage = date('YmdHis') . "." . $bukti->getClientOriginalExtension();
            $bukti->move($destinationPath, $profileImage);
            $inputbukti = "$profileImage";
        }

        Pembayaran::create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'nama' =>  $request->nama,
            'bank' => $request->bank,
            'jumlah' => $request->jumlah,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'bukti' => $inputbukti,
            'status_pembayaran' => 'belum dicek',
        ]);

        return redirect('/');

    }
}
