<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = "testimoni";
    protected $primaryKey = "id_testimoni";
    protected $fillable = ["id_pemesanan", "isi_testimoni"];

    public $timestamps = false;

    public function pemesanan(){
        return $this-> belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
