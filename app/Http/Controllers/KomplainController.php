<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use App\Pemesanan;
use App\Komplain;

class KomplainController extends Controller
{
    public function pengajuan_komplain(Request $request){
        $footer = Footer::first();
        $pemesanan = Pemesanan::find($request->id_pemesanan);
        return view('pelanggan/riwayat/komplain', ['pemesanan' => $pemesanan, 'footer' => $footer]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'isi_komplain' => 'required',
            'bukti_komplain' => 'required',
        ]);
        if ($bukti_komplain = $request->file('bukti_komplain')) {
            $destinationPath = 'bukti_komplain/';
            $profileImage = date('YmdHis') . "." . $bukti_komplain->getClientOriginalExtension();
            $bukti_komplain->move($destinationPath, $profileImage);
            $inputbukti = "$profileImage";
        } 
        $komplain = Komplain::create([
            'id_pemesanan' => $request->id_pemesanan,
            'isi_komplain' =>  $request->isi_komplain,
            'bukti_komplain' => $inputbukti,
            'status_komplain' => 'belum respon'
        ]);
        $komplain->save();
        return redirect(route('riwayat'))->with('message', 'Berhasil Mengajukan Komplain');
    }

    public function index(){
        $komplain = Komplain::paginate(10);
        return view('admin/komplain/index', ['komplain' => $komplain]);
    }

    public function detail(Request $request)
    {
        $komplain = Komplain::find($request->id_komplain);
        return view('admin/komplain/detail', ['komplain' => $komplain]);
    }

    public function update_komplain(Request $request){
        $komplain = Komplain::find($request->id_komplain);
        $this->validate($request,[
            'status_komplain' => 'required',
            'isi_respon' => 'required',
        ]);
        if ($bukti_return = $request->file('bukti_return')) {
            $destinationPath = 'bukti_return/';
            $profileImage = date('YmdHis') . "." . $bukti_return->getClientOriginalExtension();
            $bukti_return->move($destinationPath, $profileImage);
            $komplain->bukti_return = "$profileImage";
        }
        $komplain->status_komplain = $request->status_komplain;
        $komplain->isi_respon = $request->isi_respon;
        $komplain->save();
        return redirect('/admin/komplain/'.$request->id_komplain.'/detail');
    }
}
