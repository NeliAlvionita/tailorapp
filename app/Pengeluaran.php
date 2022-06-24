<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = "pengeluaran";
    protected $primaryKey = "id_pengeluaran";
    protected $fillable = ["tanggal_pengeluaran", "total_pengeluaran", "bukti_nota"];

    public $timestamps = false;

    public function detail_pengeluaran(){
        return $this-> hasMany('App\Detail_Pengeluaran', 'id_pengeluaran', 'id_pengeluaran');
    }
}
