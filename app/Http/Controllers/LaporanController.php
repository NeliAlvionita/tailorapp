<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pemesanan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->select('pemesanan.*', 'users.*')
            ->get();
        return view('admin/laporan/index', ['laporan' => $laporan]);
    }

    public function filer(Request $request)
    {
        $laporan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->select('pemesanan.*', 'users.*')
            ->where('pemesanan.tanggal_pemesanan', '>=', $request->tanggal_mulai)
            ->where('pemesanan.tanggal_pemesanan', '<=', $request->tanggal_akhir)
            ->get();
        return view('admin/laporan/index', ['laporan' => $laporan]);
    }

    public function cetak($tanggal_mulai, $tanggal_akhir){
        $cetaklaporan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->select('pemesanan.*', 'users.*')
            ->whereBetween('tanggal_pemesanan', [$tanggal_mulai, $tanggal_akhir])
            ->get();
        return view('admin/laporan/cetak', ['cetaklaporan' => $cetaklaporan]);
    }
}
