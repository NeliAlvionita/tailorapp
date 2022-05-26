<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Kategori;
use App\Pemesanan;
use App\Detail_Pemesanan;
use App\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganPemesananController extends Controller
{
    public function index($id_produk){
        $kategori=Kategori::all();
        $produk = Produk::find($id_produk);
        return view('pelanggan/pemesanan/index', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    public function masukkanKeranjang(Request $request){
        $this->validate($request,[
            'jumlah' => 'required'
        ]);

        //Validasi Jika Belum Login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        //Menghitung Total harga
        $total_harga = $request->jumlah*$request->harga;

        //Apakah user punya data pesanan utama yg status nya 0
        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        //Menyimpan / Update Data Pesanan Utama
        if(empty($pemesanan))
        {
            $pemesanan = Pemesanan::create([
                'id_pelanggan' => Auth::user()->id,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'total_pemesanan' => $total_harga,
                'status_pemesanan' => 0,
                'alamat_pengiriman' => 'belum ada',
            ]);
            $pemesanan->save();
 
        }else {
            $pemesanan->total_pemesanan = $pemesanan->total_pemesanan+$total_harga;
            $pemesanan->update();
        }
        

        //Meyimpanan Detail Pemesanan
        $detail_pemesanan = Detail_Pemesanan::create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'id_produk' =>  $request->id_produk,
            'jumlah' => $request->jumlah,
            'subtotal'=> $total_harga
        ]);
        $detail_pemesanan->save();

        //Menyimpan Data Ukuran
        if ($foto_model = $request->file('foto_model')) {
            $destinationPath = 'foto_model/';
            $profileImage = date('YmdHis') . "." . $foto_model->getClientOriginalExtension();
            $foto_model->move($destinationPath, $profileImage);
            $inputfoto = "$profileImage";
        } else {
            $inputfoto = '-';
        }
        Ukuran::create([
            'id_detailpemesanan' => $detail_pemesanan->id_detailpemesanan,
            'catatan' => $request->catatan,
            'foto_model' => $inputfoto,
            'panjang_bahu' => $request->panjang_bahu,
            'panjang_lengan' => $request->panjang_lengan,
            'panjang_baju' => $request->panjang_baju,
            'lingkar_dada' => $request->lingkar_dada,
            'lingkar_lengan' => $request->lingkar_lengan,
            'lingkar_ketiak' => $request->lingkar_ketiak,
            'lingkar_leher' => $request->lingkar_leher,
            'lingkar_pinggang' => $request->lingkar_pinggang,
            'lingkar_keris' => $request->lingkar_keris,
            'lingkar_perut'=> $request->lingkar_perut,
            'lingkar_lutut' => $request->lingkar_lutut,
            'lingkar_paha' => $request->lingkar_paha,
            'panjang_celana' => $request->panjang_celana,
            'lebar_bawah' => $request->lebar_bawah,
            
        ]);

        return redirect('/');


    }
}
///
