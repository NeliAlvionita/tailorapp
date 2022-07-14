<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplain', function (Blueprint $table) {
            $table->bigIncrements("id_komplain");
            $table->unsignedBigInteger("id_pemesanan");
            $table->string("isi_komplain");
            $table->string("bukti_komplain");
            $table->string("status_komplain");
            $table->string("isi_respon");
            $table->string("bukti_return");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komplain');
    }
}
