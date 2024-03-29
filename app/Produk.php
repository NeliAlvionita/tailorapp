<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $primaryKey = "id_produk";
    protected $fillable = ["id_kategori", "nama_produk", "nama_bahan", "foto_produk", "harga", "detail_produk", "berat_produk", "stok_bahan", "harga_jahit"];

    public $timestamps = false;
    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }
    public function detail_pemesanan(){
        return $this->hasMany('App\Detail_Pemesanan', 'id_produk', 'id_produk');
    }
}
