<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pembayaran;
use App\Pelunasan;
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
        $uangmuka = 0.5 * ($pemesanan->total_pemesanan + $pemesanan->biaya_ongkir);
        if($pemesanan->status_pemesanan=="belum bayar"){
            return view('pelanggan/riwayat/konfirm_bayar', [
                'pemesanan' => $pemesanan,
                'footer' => $footer,
                'uangmuka' => $uangmuka
            ]);
        }
        else{
            return view('pelanggan/riwayat/pembayaran', [
                'pemesanan' => $pemesanan,
                'footer' => $footer
            ]);
        }
       
    }

    public function konfirm_bayar(Request $request){ 
        $this->validate($request,[
            'nama' => 'required',
            'bank' => 'required',
            'jumlah' => 'required',
            'tanggal_pembayaran' => 'required',
            'bukti' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('id_pemesanan','=', $request->id_pemesanan)->first();
        $pembayaran = Pembayaran::where('id_pemesanan', '=', $request->id_pemesanan)->first();

        if ($bukti = $request->file('bukti')) {
            $destinationPath = 'bukti/';
            $profileImage = date('YmdHis') . "." . $bukti->getClientOriginalExtension();
            $bukti->move($destinationPath, $profileImage);
            $inputbukti = "$profileImage";
        }
        $pembayaran->nama =  $request->nama;
        $pembayaran->bank = $request->bank;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->bukti = $inputbukti;
        $pembayaran->status_pembayaran = 'belum dicek';
        $pembayaran->update();
        $pemesanan->status_pemesanan = 'pesanan masuk';
        $pemesanan->update();
        

        return redirect(route('riwayat'))->with('message', 'Berhasil Melakukan Pembayaran, Tunggu Pengecekan Data oleh Admin');
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

    public function pelunasan($id_pemesanan){
        $footer = Footer::first();
        $pemesanan = Pemesanan::find($id_pemesanan);
        $total_pelunasan = $pemesanan->total_pemesanan - $pemesanan->pembayaran->jumlah;
        if($pemesanan->pelunasan->status_pelunasan=="belum lunas"){
            return view('pelanggan/riwayat/konfirm_bayarlunas', [
                'pemesanan' => $pemesanan,
                'footer' => $footer,
                'total_pelunasan' => $total_pelunasan,
            ]);
        }
        else{
            return view('pelanggan/riwayat/pelunasan', [
                'pemesanan' => $pemesanan,
                'footer' => $footer
            ]);
        }
    }

    public function konfirm_lunas(Request $request){ 
        $this->validate($request,[
            'nama' => 'required',
            'bank' => 'required',
            'jumlah' => 'required',
            'tanggal_pelunasan' => 'required',
            'bukti' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);
        $pelunasan = Pelunasan::where('id_pemesanan', '=', $request->id_pemesanan)->first();

        if ($bukti = $request->file('bukti')) {
            $destinationPath = 'buktilunas/';
            $profileImage = date('YmdHis') . "." . $bukti->getClientOriginalExtension();
            $bukti->move($destinationPath, $profileImage);
            $inputbukti = "$profileImage";
        }
        $pelunasan->nama =  $request->nama;
        $pelunasan->bank = $request->bank;
        $pelunasan->jumlah = $request->jumlah;
        $pelunasan->tanggal_pelunasan = $request->tanggal_pelunasan;
        $pelunasan->bukti = $inputbukti;
        $pelunasan->status_pelunasan = 'belum dicek';
        $pelunasan->update();
        

        return redirect(route('riwayat'))->with('message', 'Berhasil Melakukan Pembayaran Pelunasan, Tunggu Pengecekan Data oleh Admin');
    }

    public function bukti_return($id_pemesanan){
        $footer = Footer::first();
        $pemesanan = Pemesanan::find($id_pemesanan);
        return view("pelanggan/riwayat/buktireturn", ['pemesanan' => $pemesanan, 'footer' => $footer]);
    }
}
