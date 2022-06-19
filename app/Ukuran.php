<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = "ukuran";
    protected $primaryKey = "id_ukuran";
    protected $fillable = ["id_detailpemesanan", "catatan", "foto_model", "lebar_bahu", "panjang_tangan", "panjang_baju",
                            "lingkar_dada", "lingkar_lengan", "lingkar_lenganbawah", "lingkar_ketiak","lingkar_pinggang", "lingkar_keris", 
                            "lingkar_panggul", "panjang_celana","panjang_rok", "lingkar_bawah", "tinggi_duduk" ];

    public $timestamps = false;

    public function detail_pemesanan(){
        return $this-> belongsTo('App\Detail_Pemesanan', 'id_detailpemesanan', 'id_detailpemesanan');
    }
}
