<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //difungsikan untuk mengizinkan mass assigment di tabel cities
    protected $guarded = [];
}
