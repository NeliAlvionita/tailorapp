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
            $table->string("catatan")->nullable();
            $table->string("foto_model")->nullable();
            $table->string("panjang_bahu")->nullable();
            $table->string("panjang_lengan")->nullable();
            $table->string("panjang_baju")->nullable();
            $table->string("lingkar_dada")->nullable();
            $table->string("lingkar_lengan")->nullable();
            $table->string("lingkar_ketiak")->nullable();
            $table->string("lingkar_leher")->nullable();
            $table->string("lingkar_pinggang")->nullable();
            $table->string("lingkar_keris")->nullable();
            $table->string("lingkar_perut")->nullable();
            $table->string("lingkar_lutut")->nullable();
            $table->string("lingkar_paha")->nullable();
            $table->string("panjang_celana")->nullable();
            $table->string("lebar_bawah")->nullable();
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
