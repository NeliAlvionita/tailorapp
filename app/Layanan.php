<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = "layanan";
    protected $primaryKey = "id_layanan";
    protected $fillable = ["nama_layanan"];

    public $timestamps = false;
}
