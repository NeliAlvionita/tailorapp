<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $primaryKey = "id_pemesanan";
    protected $fillable = ["id_pelanggan", "tanggal_pemesanan", "total_pemesanan", "total_berat", "alamat_pengiriman", "pilihan_pengiriman", "biaya_ongkir", "status_pemesanan", "tanggal_mulai_jahit",
    "tanggal_selesai_jahit", "ekspedisi", "no_resi"];

    public $timestamps = false;

    public function pelanggan(){
        return $this-> belongsTo('App\User', 'id_pelanggan', 'id');
    }

    public function detail_pemesanan(){
        return $this-> hasMany('App\Detail_Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }

    public function pembayaran(){
        return $this-> belongsTo('App\Pembayaran', 'id_pemesanan', 'id_pemesanan');
    }
}
