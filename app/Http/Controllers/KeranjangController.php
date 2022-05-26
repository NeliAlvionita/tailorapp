<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Pemesanan;
use App\Detail_Pemesanan;
use App\Ukuran;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
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
            'detail_pemesanan' => $detail_pemesanan
        ]);
    }

    public function delete($id_detailpemesanan)
    {
       $detailpemesanan = Detail_Pemesanan::where('id_detailpemesanan', $id_detailpemesanan)->first();
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
               $total = $pemesanan->total_pemesanan;
               $subtotal_detail = $detailpemesanan->subtotal;
               $pemesanan->total_pemesanan = $total-$subtotal_detail;
               $ukuran->delete();
               $detailpemesanan->delete();
               $pemesanan->update();
           }
       }
       return redirect(route('keranjang'));
       session()->flash('message', 'Pesanan Dihapus');
    }

    public function ubah(Request $request){
        $detailpemesanan = Detail_Pemesanan::find($request->id_detailpemesanan);
        return view('pelanggan/pemesanan/ubah_keranjang', ['detailpemesanan' => $detailpemesanan]);
    }

    public function update(Request $request){
        $detailpemesanan = Detail_Pemesanan::find($request->id_detailpemesanan);
        $this->validate($request,[
            'jumlah' => 'required'
        ]);
        //hapus harga di keranjang sebelumnya
        $harga = $detailpemesanan->pemesanan->total_pemesanan-$detailpemesanan->subtotal;
        //hitung sub total keranjang saat ini
        $subtotal = $request->jumlah*$request->harga;

        //menyimpan total pemesanan
        $detailpemesanan->pemesanan->total_pemesanan = $harga+$subtotal;
        $detailpemesanan->pemesanan->update();
        //menyimpan detail pemesanan
        $detailpemesanan->jumlah = $request->jumlah;
        $detailpemesanan->subtotal = $subtotal;
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

        return redirect(route('keranjang'));

    }
}
