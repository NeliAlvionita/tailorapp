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
        //validasi data
        if($request->nama_kategori == "Celana"){
            $this->validate($request,[
                'jumlah' => 'required',
                'lingkar_pinggang' => ['required', 'numeric'],
                'lingkar_panggul' => ['required', 'numeric'],
                'lingkar_keris' => ['required', 'numeric'],
                'panjang_celana' => ['required', 'numeric'],
                'lingkar_bawah' => ['required', 'numeric'],
            ]);
            
        }
        else if($request->nama_kategori == "Rok"){
            $this->validate($request,[
                'jumlah' => 'required',
                'lingkar_pinggang' => ['required', 'numeric'],
                'panjang_rok' => ['required', 'numeric'],
                'lingkar_panggul' => ['required', 'numeric'],
                'tinggi_duduk' => ['required', 'numeric'],
            ]);
        }
        else if($request->nama_kategori == "Seragam Laki-laki"){
            $this->validate($request,[
                'jumlah' => 'required',
                // validasi atasan seragam
                'lebar_bahu' => ['required', 'numeric'],
                'panjang_tangan' => ['required', 'numeric'],
                'panjang_baju' => ['required', 'numeric'],
                'lingkar_lengan'=> ['required', 'numeric'],
                'lingkar_dada' => ['required', 'numeric'],
                'lingkar_ketiak'=> ['required', 'numeric'],
                // validasi bawahan seragam
                'lingkar_pinggang' => ['required', 'numeric'],
                'lingkar_panggul' => ['required', 'numeric'],
                'lingkar_keris' => ['required', 'numeric'],
                'panjang_celana' => ['required', 'numeric'],
            ]);
        }
        else if($request->nama_kategori == "Seragam Perempuan"){
            $this->validate($request,[
                'jumlah' => 'required',
                // validasi atasan seragam
                'lebar_bahu' => ['required', 'numeric'],
                'panjang_tangan' => ['required', 'numeric'],
                'panjang_baju' => ['required', 'numeric'],
                'lingkar_lengan'=> ['required', 'numeric'],
                'lingkar_dada' => ['required', 'numeric'],
                'lingkar_ketiak'=> ['required', 'numeric'],
                // validasi bawahan seragam (rok)
                'lingkar_pinggang' => ['required', 'numeric'],
                'panjang_rok' => ['required', 'numeric'],
            ]);
        }
        else if($request->nama_kategori == "Jas"){
            $this->validate($request,[
                'jumlah' => 'required',
                // validasi atasan jas
                'lebar_bahu' => ['required', 'numeric'],
                'panjang_tangan' => ['required', 'numeric'],
                'panjang_baju' => ['required', 'numeric'],
                'lingkar_dada' => ['required', 'numeric'],
                'lingkar_lengan'=> ['required', 'numeric'],
                'lingkar_ketiak'=> ['required', 'numeric'],
                'lingkar_lenganbawah'=> ['required', 'numeric'],
                'lingkar_panggul'=> ['required', 'numeric'],
                // validasi bawahan jas
                'lingkar_pinggang' => ['required', 'numeric'],
                'lingkar_panggul' => ['required', 'numeric'],
                'lingkar_keris' => ['required', 'numeric'],
                'panjang_celana' => ['required', 'numeric'],
                'lingkar_bawah' => ['required', 'numeric'],

            ]);
        }
        else if($request->nama_kategori == "Kemeja"){
            $this->validate($request,[
                'jumlah' => 'required',
                'lebar_bahu' => ['required', 'numeric'],
                'panjang_tangan' => ['required', 'numeric'],
                'panjang_baju' => ['required', 'numeric'],
                'lingkar_lengan'=> ['required', 'numeric'],
                'lingkar_dada' => ['required', 'numeric'],
                'lingkar_ketiak'=> ['required', 'numeric'],
                'lingkar_lenganbawah' => ['required', 'numeric'],
            ]);
        }
        

       
        //menghitung harga tambahan ukuran M, L, XL
        if($request->nama_kategori == "Celana"){
            // standar ukuran M
            if(($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->lingkar_panggul > 93 && $request->lingkar_panggul < 105)
            && ($request->lingkar_keris > 65 && $request->lingkar_keris < 69)
            && ($request->panjang_celana > 101 &&  $request->panjang_celana < 104)){
            // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran L
            else if(($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->lingkar_panggul > 106 && $request->lingkar_panggul < 115)
            && ($request->lingkar_keris > 68 && $request->lingkar_keris < 76)
            && ($request->panjang_celana > 103 &&  $request->panjang_celana < 107)){
             // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran XL
            else if(($request->lingkar_pinggang > 78)
            && ($request->lingkar_panggul > 114)
            && ($request->lingkar_keris > 76)
            && ($request->panjang_celana > 106 )){
            // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        } 
        else if($request->nama_kategori == "Rok"){
            if(($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 74)
            && ($request->panjang_rok > 91 &&  $request->panjang_rok < 95)
            && ($request->lingkar_panggul > 89 &&  $request->lingkar_panggul < 97)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->panjang_rok > 94 &&  $request->panjang_rok < 99)
            && ($request->lingkar_panggul > 97 &&  $request->lingkar_panggul < 103)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lingkar_pinggang > 78)
            && ($request->panjang_rok > 99 )
            && ($request->lingkar_panggul > 102)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        else if($request->nama_kategori == "Seragam Laki-laki"){
             // standar ukuran M
             if( ($request->panjang_baju > 68 && $request->panjang_baju < 74)
             && ($request->panjang_tangan > 55 && $request->panjang_tangan < 61)
             && ($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
             && ($request->lingkar_panggul > 93 && $request->lingkar_panggul < 105)
             && ($request->lingkar_keris > 65 && $request->lingkar_keris < 69)
             && ($request->panjang_celana > 101 &&  $request->panjang_celana < 104)){
             // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
             $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
             $hargatambahan = $hargabahan->harga_tambah;
             }
             // standar ukuran L
             else if( ($request->panjang_baju > 73 && $request->panjang_baju < 76)
             && ($request->panjang_tangan > 60 && $request->panjang_tangan < 65)
             && ($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
             && ($request->lingkar_panggul > 106 && $request->lingkar_panggul < 115)
             && ($request->lingkar_keris > 68 && $request->lingkar_keris < 76)
             && ($request->panjang_celana > 103 &&  $request->panjang_celana < 107)){
              // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
             $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
             $hargatambahan = $hargabahan->harga_tambah;
             }
             // standar ukuran XL
             else if(($request->panjang_baju > 75)
             && ($request->panjang_tangan > 65)
             && ($request->lingkar_pinggang > 78)
             && ($request->lingkar_panggul > 114)
             && ($request->lingkar_keris > 76)
             && ($request->panjang_celana > 106 )){
             // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
             $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
             $hargatambahan = $hargabahan->harga_tambah;
             }
             else {
                 $hargatambahan = 0;
             }
        }
        else if($request->nama_kategori == "Seragam Perempuan"){
            if(($request->lebar_bahu > 39 and $request->lebar_bahu < 42)
            &&($request->lingkar_dada > 93 and $request->lingkar_dada < 96)
            && ($request->panjang_tangan > 53 and $request->panjang_tangan < 56)
            &&($request->lingkar_lengan > 32 and $request->lingkar_lengan < 35)
            && ($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->panjang_rok > 101 &&  $request->panjang_rok < 104)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lebar_bahu > 41 and $request->lebar_bahu < 44)
            &&($request->lingkar_dada > 95 and $request->lingkar_dada < 100)
            &&($request->panjang_tangan > 55 and $request->panjang_tangan < 58)
            &&($request->lingkar_lengan > 33 and $request->lingkar_lengan < 36)
            && ($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->panjang_rok > 103 &&  $request->panjang_rok < 107)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lebar_bahu > 43)
            && ($request->lingkar_dada > 99)
            && ($request->panjang_tangan > 57 )
            && ($request->lingkar_lengan > 35)
            && ($request->lingkar_pinggang > 78)
            && ($request->panjang_rok > 106 )){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        else if($request->nama_kategori == "Kemeja"){
            if(($request->lebar_bahu > 39 and $request->lebar_bahu < 42)
            &&($request->lingkar_dada > 93 and $request->lingkar_dada < 96)
            && ($request->panjang_tangan > 53 and $request->panjang_tangan < 56)
            &&($request->lingkar_lengan > 32 and $request->lingkar_lengan < 35)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lebar_bahu > 41 and $request->lebar_bahu < 44)
            &&($request->lingkar_dada > 95 and $request->lingkar_dada < 100)
            &&($request->panjang_tangan > 55 and $request->panjang_tangan < 58)
            &&($request->lingkar_lengan > 34 and $request->lingkar_lengan < 36)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lebar_bahu > 43)
            && ($request->lingkar_dada > 99)
            && ($request->panjang_tangan > 57 )
            && ($request->lingkar_lengan > 35)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }

        else if($request->nama_kategori == "Jas"){
            // standar ukuran M
            if( ($request->panjang_baju > 68 && $request->panjang_baju < 74)
            && ($request->panjang_tangan > 55 && $request->panjang_tangan < 61)
            && ($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->lingkar_panggul > 93 && $request->lingkar_panggul < 105)
            && ($request->lingkar_keris > 65 && $request->lingkar_keris < 69)
            && ($request->panjang_celana > 101 &&  $request->panjang_celana < 104)){
            // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran L
            else if( ($request->panjang_baju > 73 && $request->panjang_baju < 76)
            && ($request->panjang_tangan > 60 && $request->panjang_tangan < 65)
            && ($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->lingkar_panggul > 106 && $request->lingkar_panggul < 115)
            && ($request->lingkar_keris > 68 && $request->lingkar_keris < 76)
            && ($request->panjang_celana > 103 &&  $request->panjang_celana < 107)){
             // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran XL
            else if(($request->panjang_baju > 75)
            && ($request->panjang_tangan > 65)
            && ($request->lingkar_pinggang > 78)
            && ($request->lingkar_panggul > 114)
            && ($request->lingkar_keris > 76)
            && ($request->panjang_celana > 106 )){
            // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
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
        $detailpemesanan->ukuran->lebar_bahu = $request->lebar_bahu;
        $detailpemesanan->ukuran->panjang_tangan = $request->panjang_tangan;
        $detailpemesanan->ukuran->panjang_baju = $request->panjang_baju;
        $detailpemesanan->ukuran->lingkar_dada = $request->lingkar_dada;
        $detailpemesanan->ukuran->lingkar_lengan = $request->lingkar_lengan;
        $detailpemesanan->ukuran->lingkar_lenganbawah = $request->lingkar_lenganbawah;
        $detailpemesanan->ukuran->lingkar_ketiak = $request->lingkar_ketiak;
        $detailpemesanan->ukuran->lingkar_pinggang = $request->lingkar_pinggang;
        $detailpemesanan->ukuran->lingkar_keris = $request->lingkar_keris;
        $detailpemesanan->ukuran->lingkar_panggul = $request->lingkar_panggul;
        $detailpemesanan->ukuran->panjang_celana = $request->panjang_celana;
        $detailpemesanan->ukuran->panjang_rok = $request->panjang_rok;
        $detailpemesanan->ukuran->lingkar_bawah = $request->lingkar_bawah;
        $detailpemesanan->ukuran->tinggi_duduk = $request->tinggi_duduk;
        $detailpemesanan->ukuran->update();

        return redirect(route('keranjang'))->with('message', 'Berhasil Mengupdate Keranjang');

    }
}
