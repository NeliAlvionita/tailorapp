<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $primaryKey = "id_produk";
    protected $fillable = ["id_layanan", "id_kategori", "nama_produk", "foto_produk", "harga", "detail_produk"];

    public $timestamps = false;

    public function layanan(){
        return $this-> belongsTo('App\Layanan', 'id_layanan', 'id_layanan');
    }
    public function kategori(){
        return $this-> belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }
}
