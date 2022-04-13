<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $primaryKey = "id_pemesanan";
    protected $fillable = ["id_pelanggan", "tanggal_pemesanan", "total_pemesanan", "alamat_pengiriman", "status_pemesanan"];

    public $timestamps = false;

    public function pelanggan(){
        return $this-> belongsTo('App\User', 'id_pelanggan', 'id');
    }

    public function detail_pemesanan(){
        return $this-> hasMany('App\Detail_Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
