<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $primaryKey = "id_pembayaran";
    protected $fillable = ["id_pemesanan", "nama", "bank", "jumlah", "tanggal_pembayaran", "bukti", "status_pembayaran"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
