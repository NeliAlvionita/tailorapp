<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukuran', function (Blueprint $table) {
            $table->bigIncrements("id_ukuran");
            $table->unsignedBigInteger("id_pemesanan");
            $table->string("nama");
            $table->string("catatan");
            $table->string("foto_model");
            $table->string("panjang_bahu");
            $table->string("panjang_lengan");
            $table->string("panjang_baju");
            $table->string("lingkar_dada");
            $table->string("lingkar_lengan");
            $table->string("lingkar_ketiak");
            $table->string("lingkar_leher");
            $table->string("lingkar_pinggang");
            $table->string("lingkar_keris");
            $table->string("lingkar_perut");
            $table->string("lingkar_lutut");
            $table->string("lingkar_paha");
            $table->string("panjang_celana");
            $table->string("lebar_bawah");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ukuran');
    }
}
