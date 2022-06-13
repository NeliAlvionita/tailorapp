<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //difungsikan untuk mengizinkan mass assigment di tabel provincies 
    protected $guarded = [];
}
