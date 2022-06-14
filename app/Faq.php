<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = "faq";
    protected $primaryKey = "id_faq";
    protected $fillable = ["pertanyaan", "jawaban"];

    public $timestamps = false;
}
