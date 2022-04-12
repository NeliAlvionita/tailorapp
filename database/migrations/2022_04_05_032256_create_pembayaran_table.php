<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements("id_pembayaran");
            $table->unsignedBigInteger("id_pemesanan");
            $table->string("nama");
            $table->string("bank");
            $table->integer("jumlah");
            $table->date("tanggal_pembayaran");
            $table->string("bukti");
            $table->string("status_pembayaran");
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
        Schema::dropIfExists('pembayaran');
    }
}
