<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Pengeluaran extends Model
{
    protected $table = "detail_pengeluaran";
    protected $primaryKey = "id_detailpengeluaran";
    protected $fillable = ["id_pengeluaran", "nama_barang", "satuan", "jumlah", "harga", "subtotal"];

    public $timestamps = false;

    public function pengeluaran(){
        return $this-> belongsTo('App\Pengeluaran', 'id_pengeluaran', 'id_pengeluaran');
    }
}
