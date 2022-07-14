<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelunasan extends Model
{
    protected $table = "pelunasan";
    protected $primaryKey = "id_pelunasan";
    protected $fillable = ["id_pemesanan", "nama", "bank", "jumlah", "tanggal_pelunasan", "bukti", "status_pelunasan"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
