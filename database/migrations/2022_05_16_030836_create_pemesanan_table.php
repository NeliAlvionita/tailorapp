<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements("id_pemesanan");
            $table->unsignedBigInteger("id_pelanggan");
            $table->date("tanggal_pemesanan");
            $table->integer("total_pemesanan");
            $table->integer("total_berat");
            $table->integer("biaya_ongkir")->nullable();
            $table->string("alamat_pengiriman")->nullable();
            $table->string("status_pemesanan")->default(0);
            $table->string('ekspedisi')->nullable();
            $table->string('no_resi')->nullable();
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
        Schema::dropIfExists('pemesanan');
    }
}
