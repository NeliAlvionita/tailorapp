<?php

namespace App\Http\Controllers;
use App\Pengeluaran;
use Illuminate\Http\Request;
use App\Detail_Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::all();

        return view('admin/pengeluaran/index', ['pengeluaran'=> $pengeluaran]);
    } 

    public function tambah(){
        return view('admin/pengeluaran/tambah');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'tanggal_pengeluaran' => ['required'],
            'total_pengeluaran' => ['required', 'numeric'],
            'bukti_nota' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);
        

        $input = $request->all();

        if ($bukti_nota = $request->file('bukti_nota')) {
            $destinationPath = 'bukti_nota/';
            $profileImage = date('YmdHis') . "." . $bukti_nota->getClientOriginalExtension();
            $bukti_nota->move($destinationPath, $profileImage);
            $input['bukti_nota'] = "$profileImage";
        }
        
        Pengeluaran::create($input);
   
        return redirect('/admin/pengeluaran')->with('message','Berhasil Menambahkan Pengeluaran');
    }

    public function ubah(Request $request){
        $pengeluaran = Pengeluaran::find($request->id_pengeluaran);
        return view('admin/pengeluaran/ubah', ['pengeluaran' => $pengeluaran]);
    }

    public function update(Request $request){
        $pengeluaran = Pengeluaran::find($request->id_pengeluaran);
        $this->validate($request, [
            'tanggal_pengeluaran' => ['required'],
            'total_pengeluaran' => ['required', 'numeric'],
            'bukti_nota' => ['mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($bukti_nota = $request->file('bukti_nota')) {
            $destinationPath = 'bukti_nota/';
            $profileImage = date('YmdHis') . "." . $bukti_nota->getClientOriginalExtension();
            $bukti_nota->move($destinationPath, $profileImage);
            $pengeluaran->bukti_nota=$profileImage;
        }

        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluaran->total_pengeluaran = $request->total_pengeluaran;
        $pengeluaran->save();

        return redirect('/admin/pengeluaran/')->with('message','Berhasil Mengupdate Data');
    }

    public function delete(Request $request)
    {
        $pengeluaran = Pengeluaran::findOrFail($request->id_pengeluaran);
        if (count($pengeluaran->detail_pengeluaran) == 0) {
            $pengeluaran->delete();
                return redirect('/admin/pengeluaran')->with('message', 'Berhasil Menghapus Data');
            
        } else {
            return redirect('/admin/pengeluaran')->with('message', 'Gagal Menghapus Data, Ada Data Detail Pengeluaran Yang Masih Tersimpan');
        }
    }

    // detail pengeluaran

    public function detail(Request $request){
        $pengeluaran = Pengeluaran::find($request->id_pengeluaran);
        $detailpengeluaran = Detail_Pengeluaran::where('id_pengeluaran', '=', $request->id_pengeluaran)->get();
        return view('admin/pengeluaran/detail', [
            'pengeluaran' => $pengeluaran,
            'detailpengeluaran' => $detailpengeluaran,
        ]);
    }

    public function tambah_detail(Request $request){
        $pengeluaran = Pengeluaran::find($request->id_pengeluaran);
        return view('admin/pengeluaran/tambahdetail', [
            'pengeluaran' => $pengeluaran,
        ]);
    }

    public function submit_detail(Request $request){
        $this->validate($request, [
            'nama_barang' => ['required'],
            'satuan' => ['required'],
            'harga' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
        ]);

        $detail_pengeluaran = Detail_Pengeluaran::create([
            'id_pengeluaran' => $request->id_pengeluaran,
            'nama_barang' => $request->nama_barang,
            'satuan'=> $request->satuan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'subtotal' => $request->subtotal
        ]);
        $detail_pengeluaran->save();

        return redirect('/admin/pengeluaran/'.$request->id_pengeluaran.'/detail')->with('message','Berhasil Menambahkan Pengeluaran');
    }

    public function ubah_detail(Request $request){
        $detailpengeluaran = Detail_Pengeluaran::find($request->id_detailpengeluaran);
        return view('admin/pengeluaran/ubahdetail', ['detailpengeluaran' => $detailpengeluaran]);
    }

    public function update_detail(Request $request){
        $detailpengeluaran = Detail_Pengeluaran::find($request->id_detailpengeluaran);
        $this->validate($request, [
            'nama_barang' => ['required'],
            'satuan' => ['required'],
            'harga' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
        ]);

        $detailpengeluaran->nama_barang = $request->nama_barang;
        $detailpengeluaran->satuan = $request->satuan;
        $detailpengeluaran->harga = $request->harga;
        $detailpengeluaran->jumlah = $request->jumlah;
        $detailpengeluaran->subtotal = $request->subtotal;
        $detailpengeluaran->save();

        return redirect('/admin/pengeluaran/'.$request->id_pengeluaran.'/detail')->with('message','Berhasil Mengupdate Data');
    }

    public function delete_detail(Request $request)
    {
        $detailpengeluaran = Detail_Pengeluaran::findOrFail($request->id_detailpengeluaran);
        $id_pengeluaran = $detailpengeluaran->id_pengeluaran;
        if ($detailpengeluaran->delete()) {
            return redirect('/admin/pengeluaran/'.$id_pengeluaran.'/detail')->with('message', 'Berhasil Menghapus Data');
        }  
    }

    

}
