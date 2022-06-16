<?php

namespace App\Http\Controllers;
use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Whoops\Run;

class PemesananController extends Controller
{
    public function index(){ 
        $pemesanan = Pemesanan::where('status_pemesanan', '!=', '0')
        ->Where('status_pemesanan', '!=', 'belum bayar')
        ->get();
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
    public function tanggal_proses(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        $pemesanan->tanggal_mulai_jahit=$request->tanggal_mulai_jahit;
        $pemesanan->tanggal_selesai_jahit=$request->tanggal_selesai_jahit;
        $pemesanan->save();
        return redirect('/admin/pemesanan');
    }
    public function submitResi(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        $pemesanan->no_resi=$request->no_resi;
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
    public function detail_ukuran(Request $request){
        $pemesanan = Pemesanan::find($request->id_pemesanan);
        return view('admin/pemesanan/ukuran', ['pemesanan' => $pemesanan]);
    }
    public function cetak_ukuran($id_pemesanan){
        
        $pemesanan =  DB::table('pemesanan')
            ->leftjoin('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->select('pemesanan.*', 'users.name', 'users.nomorhp', 'users.email')
            ->where('pemesanan.id_pemesanan', '=', $id_pemesanan)
            ->first();

        $cetak_ukuran = DB::table('pemesanan')
            ->leftjoin('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->leftjoin('detail_pemesanan', 'detail_pemesanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->leftjoin('ukuran', 'ukuran.id_detailpemesanan', '=', 'detail_pemesanan.id_detailpemesanan')
            ->leftjoin('produk', 'produk.id_produk', '=', 'detail_pemesanan.id_produk')
            ->select('pemesanan.*', 'users.name', 'users.nomorhp', 'users.email', 'ukuran.*', 'detail_pemesanan.*', 'produk.nama_produk')
            ->where('pemesanan.id_pemesanan', '=', $id_pemesanan)
            ->get();
        return view('admin/pemesanan/cetak-ukuran', ['pemesanan' => $pemesanan, 'cetak_ukuran' => $cetak_ukuran]);
    }
}
