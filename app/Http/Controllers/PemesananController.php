<?php

namespace App\Http\Controllers;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index(){ 
        $pemesanan = Pemesanan::all();
        // $pemesanan = DB::table('pemesanan')
        //     ->join('users', 'users.id', '=', 'pemesanan.id_pemesanan')
        //     ->select('pemesanan.*', 'users.name')
        //     ->get();
        return view('admin/pemesanan/index', ['pemesanan' => $pemesanan]);
    }

    public function detail(Request $request){
        $pemesanan = Pemesanan::find($request->id_pemesanan);
        return view('admin/pemesanan/detail', ['pemesanan' => $pemesanan]);
    } 

    public function update_status(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        $pemesanan->status_pemesanan=$request->status_pemesanan;
        $pemesanan->save();
        return redirect('/admin/pemesanan');
    }
    public function detail_bayar(Request $request){
        $pemesanan = Pemesanan::find($request->id_pemesanan);
        return view('admin/pemesanan/pembayaran', ['pemesanan' => $pemesanan]);
    }

    public function update_bayar(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        $pemesanan->pembayaran->status_pembayaran=$request->status_pembayaran;
        $pemesanan->pembayaran->save();
        return redirect('/admin/pemesanan');
    }
}
