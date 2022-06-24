<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    protected $fillable = ["judul", "isi", "detail", "gambar_berita"];

    public $timestamps = false;
}
