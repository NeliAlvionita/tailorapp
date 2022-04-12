<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Pemesanan extends Model
{
    protected $table = "detail_pemesanan";
    protected $primaryKey = "id_detailpemesanan";
    protected $fillable = ["id_pemesanan", "id_produk", "jumlah", "nama", "harga", "subharga"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
    public function produk(){
        return $this-> belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
}
