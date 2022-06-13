<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = "footer";
    protected $primaryKey = "id_footer";
    protected $fillable = ["nama_toko", "alamat_toko", "nomor_telepon", "email_toko", "tentang"];

    public $timestamps = false;
}
