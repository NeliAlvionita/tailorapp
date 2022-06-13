<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Kategori;
use App\Pemesanan;
use App\Detail_Pemesanan;
use App\Bahan;
use App\Ukuran;
use App\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganPemesananController extends Controller
{
    public function index($id_produk){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        $footer = Footer::first();
        $kategori=Kategori::all();
        $produk = Produk::find($id_produk);
        return view('pelanggan/pemesanan/index', [
            'produk' => $produk,
            'kategori' => $kategori,
            'footer' => $footer
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
        //menghitung harga tambahan ukuran S, M, L, XL
        if(($request->lingkar_lengan > 32 and $request->lingkar_lengan < 35)
        or ($request->lingkar_leher > 34 and $request->lingkar_leher < 37)
        or ($request->lingkar_pinggang > 66 and $request->lingkar_pinggang < 73)
        or ($request->lingkar_perut > 86 and $request->lingkar_perut < 92)
        or ($request->lingkar_paha > 60 and $request->lingkar_paha < 64)
        or ($request->panjang_celana > 101 and  $request->lingkar_celana < 104)){
        $hargabahan = Bahan::where('nama_bahan','like',"%".$request->nama_bahan."%")->where('ukuran','=', 'M')->first();
        $hargatambahan = $hargabahan->harga_tambah;
        }
        if(($request->lingkar_lengan > 33 and $request->lingkar_lengan < 36)
        or ($request->lingkar_leher > 36 and $request->lingkar_leher < 39)
        or ($request->lingkar_pinggang > 73 and $request->lingkar_pinggang < 79)
        or ($request->lingkar_perut > 91 and $request->lingkar_perut < 99)
        or ($request->lingkar_paha > 63 and $request->lingkar_paha < 69)
        or ($request->panjang_celana > 103 and  $request->lingkar_celana < 107)){
        $hargabahan = Bahan::where('nama_bahan','like',"%".$request->nama_bahan."%")->where('ukuran','=', 'L')->first();
        $hargatambahan = $hargabahan->harga_tambah;
        }
        if(($request->lingkar_lengan > 35)
        or ($request->lingkar_leher > 38)
        or ($request->lingkar_pinggang > 78)
        or ($request->lingkar_perut > 98)
        or ($request->lingkar_paha > 68)
        or ($request->panjang_celana > 106 )){
        $hargabahan = Bahan::where('nama_bahan','like',"%".$request->nama_bahan."%")->where('ukuran','=', 'XL')->first();
        $hargatambahan = $hargabahan->harga_tambah;
        }
        else {
            $hargatambahan = 0;
        }
        //Menghitung Total harga dan Total Berat
        $total_harga = $request->jumlah*($request->harga+$hargatambahan);
        $subberat = $request->jumlah*($request->berat_produk);

        //Apakah user punya data pesanan utama yg status nya 0
        $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
        //Menyimpan / Update Data Pesanan Utama
        if(empty($pemesanan))
        {
            $pemesanan = Pemesanan::create([
                'id_pelanggan' => Auth::user()->id,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'total_pemesanan' => $total_harga,
                'total_berat' => $subberat,
                'status_pemesanan' => 0,
                
            ]);
            $pemesanan->save();
 
        }else {
            $pemesanan->total_pemesanan = $pemesanan->total_pemesanan+$total_harga;
            $pemesanan->total_berat = $pemesanan->total_berat+$subberat;
            $pemesanan->update();
        }
        //Meyimpanan Detail Pemesanan
        $detail_pemesanan = Detail_Pemesanan::create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'id_produk' =>  $request->id_produk,
            'jumlah' => $request->jumlah,
            'subtotal'=> $total_harga,
            'subberat' => $subberat,
            'biaya_tambahan' => $hargatambahan
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

        return redirect('/')->with('message', 'Berhasil Menambahkan Keranjang');


    }
}
///
