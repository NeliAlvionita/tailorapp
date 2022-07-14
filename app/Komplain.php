<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    protected $table = "komplain";
    protected $primaryKey = "id_komplain";
    protected $fillable = ["id_pemesanan", "isi_komplain", "bukti_komplain", "status_komplain", "isi_respon", "bukti_return"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
