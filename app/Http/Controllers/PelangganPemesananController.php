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
     //Validasi Jika Belum Login
     if(!Auth::user()) {
        return redirect()->route('login');
    }
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
                'lingkar_keris' => ['required', 'numeric'],
                'panjang_celana' => ['required', 'numeric'],
                'lingkar_panggul' => ['required', 'numeric'],
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
        // jika kategori = celana
        if($request->nama_kategori == "Celana"){
            // standar ukuran M
            if(($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->lingkar_panggul > 60 && $request->lingkar_panggul < 64)
            && ($request->panjang_celana > 101 &&  $request->panjang_celana < 104)){
            // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran L
            else if(($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->lingkar_panggul > 63 && $request->lingkar_panggul < 69)
            && ($request->panjang_celana > 103 &&  $request->panjang_celana < 107)){
             // menyesuaikan nama bahan baju dengan tabel bahan untuk mengambil nilai harga tambah berdasarkan bahan dan ukuran
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            // standar ukuran XL
            else if(($request->lingkar_pinggang > 78)
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
            && ($request->panjang_rok > 101 &&  $request->panjang_rok < 104)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->panjang_rok > 103 &&  $request->panjang_rok < 107)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lingkar_pinggang > 78)
            && ($request->panjang_rok > 106 )){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        else if($request->nama_kategori == "Seragam Laki-laki"){
            if( ($request->lingkar_lengan > 32 and $request->lingkar_lengan < 34)
            && ($request->lingkar_panggul > 60 and $request->lingkar_panggul < 64)
            && ($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->panjang_celana > 101 &&  $request->panjang_celana < 104)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lingkar_lengan > 33 and $request->lingkar_lengan < 36)
            && ($request->lingkar_panggul > 63 and $request->lingkar_panggul < 69)
            && ($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->panjang_celana > 103 &&  $request->panjang_celana < 107)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lingkar_lengan > 35)
            && ($request->lingkar_panggul > 68)
            && ($request->lingkar_pinggang > 78)
            && ($request->panjang_celana > 106 )){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        else if($request->nama_kategori == "Seragam Perempuan"){
            if( ($request->lingkar_lengan > 32 and $request->lingkar_lengan < 35)
            && ($request->lingkar_pinggang > 66 && $request->lingkar_pinggang < 73)
            && ($request->panjang_rok > 101 &&  $request->panjang_rok < 104)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lingkar_lengan > 33 and $request->lingkar_lengan < 36)
            && ($request->lingkar_pinggang > 73 && $request->lingkar_pinggang < 79)
            && ($request->panjang_rok > 103 &&  $request->panjang_rok < 107)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lingkar_lengan > 35)
            && ($request->lingkar_panggul > 68)
            && ($request->lingkar_pinggang > 78)
            && ($request->panjang_rok > 106 )){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        else if($request->nama_kategori == "Kemeja" || $request->nama_kategori ==  "Jas"){
            if( ($request->lingkar_lengan > 32 and $request->lingkar_lengan < 35)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'M')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if(($request->lingkar_lengan > 33 and $request->lingkar_lengan < 36)){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'L')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else if( ($request->lingkar_lengan > 35)
            ){
            $hargabahan = Bahan::where('nama_bahan','=', $request->nama_bahan)->where('ukuran','=', 'XL')->first();
            $hargatambahan = $hargabahan->harga_tambah;
            }
            else {
                $hargatambahan = 0;
            }
        }
        //Menghitung Sub total harga dan SubBerat
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
            'lebar_bahu' => $request->lebar_bahu,
            'panjang_tangan' => $request->panjang_tangan,
            'panjang_baju' => $request->panjang_baju,
            'lingkar_dada' => $request->lingkar_dada,
            'lingkar_lengan' => $request->lingkar_lengan,
            'lingkar_lenganbawah' => $request->lingkar_lenganbawah,
            'lingkar_ketiak' => $request->lingkar_ketiak,
            'lingkar_pinggang' => $request->lingkar_pinggang,
            'lingkar_keris' => $request->lingkar_keris,
            'lingkar_panggul' => $request->lingkar_panggul,
            'panjang_celana' => $request->panjang_celana,
            'panjang_rok' => $request->panjang_rok,
            'lingkar_bawah' => $request->lingkar_bawah,
            'tinggi_duduk' => $request->tinggi_duduk
            
        ]);

        return redirect(route('produk'))->with('message', 'Berhasil Menambahkan Keranjang');


    }
}
///
