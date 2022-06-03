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
            ->where('status_pemesanan', '!=', '0')
            ->get();
        return view('admin/laporan/index', ['laporan' => $laporan]);
    }

    public function cetak($tanggal_mulai, $tanggal_akhir){
        $cetaklaporan = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_pelanggan')
            ->select('pemesanan.*', 'users.*')
            ->where('status_pemesanan', '!=', '0')
            ->whereBetween('tanggal_pemesanan', [$tanggal_mulai, $tanggal_akhir])
            ->get();
        return view('admin/laporan/cetak', ['cetaklaporan' => $cetaklaporan, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_akhir' => $tanggal_akhir]);
    }
}
