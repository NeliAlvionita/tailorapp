<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = "ukuran";
    protected $primaryKey = "id_ukuran";
    protected $fillable = ["id_detailpemesanan", "catatan", "foto_model", "panjang_bahu", "panjang_lengan", "panjang_baju",
                            "lingkar_dada", "lingkar_lengan", "lingkar_ketiak", "lingkar_leher", "lingkar_pinggang", "lingkar_keris", 
                            "lingkar_perut", "lingkar_paha", "lingkar_lutut", "panjang_celana", "lebar_bawah"];

    public $timestamps = false;

    public function detail_pemesanan(){
        return $this-> belongsTo('App\Detail_Pemesanan', 'id_detailpemesanan', 'id_detailpemesanan');
    }
}
