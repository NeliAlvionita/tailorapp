<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Pemesanan;
use App\Detail_Pemesanan;
use App\Ukuran;
use App\Bahan;
use App\Footer;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        $footer = Footer::first();
        $detail_pemesanan = [];
        if(Auth::user()) {
            $pemesanan = Pemesanan::where('id_pelanggan', Auth::user()->id)->where('status_pemesanan','=','0')->first();
            if($pemesanan)
            {
                $detail_pemesanan = Detail_Pemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
            }
        }
        return view('pelanggan/pemesanan/keranjang',[
            'pemesanan' => $pemesanan,
            'detail_pemesanan' => $detail_pemesanan,
            'footer' => $footer
        ]);
    }

    public function delete($id_detailpemesanan)
    {
       $detailpemesanan = Detail_Pemesanan::find($id_detailpemesanan);
       $ukuran = Ukuran::where('id_detailpemesanan',$id_detailpemesanan)->first();
       if(!empty($detailpemesanan)) {
           
           $pemesanan = Pemesanan::where('id_pemesanan', $detailpemesanan->id_pemesanan)->first();
          
           $jumlah_detail_pemesanan = Detail_Pemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->count();
           if($jumlah_detail_pemesanan == 1) 
           {
               $ukuran->delete();
               $detailpemesanan->delete();
               $pemesanan->delete();
           }else {
                // kurangi harga produk
               $total = $pemesanan->total_pemesanan;
               $subtotal_harga = $detailpemesanan->subtotal;
               $pemesanan->total_pemesanan = $total-$subtotal_harga;
                // kurangi berat produk
               $total_berat = $pemesanan->total_berat;
               $subtotal_berat = $detailpemesanan->subberat;
               $pemesanan->total_berat = $total_berat-$subtotal_berat;
               // delete pemesanan
               $ukuran->delete();
               $detailpemesanan->delete();
               $pemesanan->update();
           }
       }
       return redirect(route('keranjang'))->with('message', 'Berhasil Menghapus Pesanan');
    }

    public function ubah(Request $request){
        $footer = Footer::first();
        $detailpemesanan = Detail_Pemesanan::find($request->id_detailpemesanan);
        return view('pelanggan/pemesanan/ubah_keranjang', ['detailpemesanan' => $detailpemesanan, 'footer' => $footer]);
    }

    public function update(Request $request){
        $detailpemesanan = Detail_Pemesanan::find($request->id_detailpemesanan);
        $this->validate($request,[
            'jumlah' => 'required'
        ]);
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
        //hapus harga dan berat di keranjang sebelumnya
        $harga = $detailpemesanan->pemesanan->total_pemesanan-$detailpemesanan->subtotal;
        $berat = $detailpemesanan->pemesanan->total_berat-$detailpemesanan->subberat;
        //hitung sub total keranjang saat ini
        $subtotal = $request->jumlah*($request->harga+$hargatambahan);
        $subberat = $request->jumlah*($request->berat_produk);

        //menyimpan total pemesanan
        $detailpemesanan->pemesanan->total_pemesanan = $harga+$subtotal;
        $detailpemesanan->pemesanan->total_berat = $berat+$subberat;
        $detailpemesanan->pemesanan->update();
        //menyimpan detail pemesanan
        $detailpemesanan->jumlah = $request->jumlah;
        $detailpemesanan->subtotal = $subtotal;
        $detailpemesanan->subberat = $subberat;
        $detailpemesanan->biaya_tambahan = $hargatambahan;
        $detailpemesanan->update();
        //menyimpan ukuran
        if ($foto_model = $request->file('foto_model')) {
            $destinationPath = 'foto_model/';
            $profileImage = date('YmdHis') . "." . $foto_model->getClientOriginalExtension();
            $foto_model->move($destinationPath, $profileImage);
            $detailpemesanan->ukuran->foto_model = "$profileImage";
        }
        $detailpemesanan->ukuran->catatan = $request->catatan;
        $detailpemesanan->ukuran->panjang_bahu = $request->panjang_bahu;
        $detailpemesanan->ukuran->panjang_lengan = $request->panjang_lengan;
        $detailpemesanan->ukuran->panjang_baju = $request->panjang_baju;
        $detailpemesanan->ukuran->lingkar_dada = $request->lingkar_dada;
        $detailpemesanan->ukuran->lingkar_lengan = $request->lingkar_lengan;
        $detailpemesanan->ukuran->lingkar_ketiak = $request->lingkar_ketiak;
        $detailpemesanan->ukuran->lingkar_leher = $request->lingkar_leher;
        $detailpemesanan->ukuran->lingkar_pinggang = $request->lingkar_pinggang;
        $detailpemesanan->ukuran->lingkar_keris = $request->lingkar_keris;
        $detailpemesanan->ukuran->lingkar_perut= $request->lingkar_perut;
        $detailpemesanan->ukuran->lingkar_lutut = $request->lingkar_lutut;
        $detailpemesanan->ukuran->lingkar_paha = $request->lingkar_paha;
        $detailpemesanan->ukuran->panjang_celana = $request->panjang_celana;
        $detailpemesanan->ukuran->lebar_bawah = $request->lebar_bawah;
        $detailpemesanan->ukuran->update();

        return redirect(route('keranjang'))->with('message', 'Berhasil Mengupdate Keranjang');

    }
}
