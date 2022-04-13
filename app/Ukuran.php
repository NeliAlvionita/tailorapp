<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = "ukuran";
    protected $primaryKey = "id_ukuran";
    protected $fillable = ["id_pemesanan", "catatan", "foto_model", "panjang_bahu", "panjang_lengan", "panjang_baju",
                            "lingkar_dada", "lingkar_lengan", "lingkar_ketiak", "lingkar_leher", "lingkar_pinggang", "lingkar_keris", 
                            "lingkar_perut", "lingkar_paha", "lingkar_lutut", "panjang_celana", "lebar_bawah"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
