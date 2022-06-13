<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pemesanan;
use App\Footer;
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
        $footer = Footer::first();
        
        return view('pelanggan/riwayat/index',[
            'pemesanan' => $pemesanan,
            'footer' => $footer
        ]);
    }

    public function detail(Request $request){
       $footer = Footer::first();
        $pemesanan = Pemesanan::find($request->id_pemesanan);

        return view('pelanggan/riwayat/detail', [
            'pemesanan' => $pemesanan,
            'footer' => $footer
        ]);
    }

    public function pembayaran($id_pemesanan){
        $footer = Footer::first();
        $pemesanan = Pemesanan::find($id_pemesanan);

        return view('pelanggan/riwayat/pembayaran', [
            'pemesanan' => $pemesanan,
            'footer' => $footer
        ]);
    }

    public function detailpemesanan(Request $request)
    {
        $footer = Footer::first();
        $detail = Detail_Pemesanan::find($request->id_detailpemesanan);
        return view('pelanggan/riwayat/detailpemesanan', ['detail' => $detail,  'footer' => $footer]);
    }

    public function cetak_nota($id_pemesanan){
        
        $pemesanan =  Pemesanan::leftjoin('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->leftjoin('pembayaran', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->select('pemesanan.*', 'pembayaran.*', 'users.name', 'users.nomorhp', 'users.email')
            ->where('pemesanan.id_pemesanan', '=', $id_pemesanan)
            ->first();

        $cetak_nota = Pemesanan::leftjoin('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->leftjoin('detail_pemesanan', 'detail_pemesanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->leftjoin('produk', 'produk.id_produk', '=', 'detail_pemesanan.id_produk')
            ->select('pemesanan.*', 'users.name', 'users.nomorhp', 'users.email', 'detail_pemesanan.*', 'produk.*')
            ->where('pemesanan.id_pemesanan', '=', $id_pemesanan)
            ->get();
        return view('pelanggan/riwayat/cetak_nota', ['pemesanan' => $pemesanan, 'cetak_nota' => $cetak_nota]);
    }
}
