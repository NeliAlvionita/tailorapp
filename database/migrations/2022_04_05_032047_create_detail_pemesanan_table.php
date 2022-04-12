<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->bigIncrements("id_detailpemesanan");
            $table->unsignedBigInteger("id_pemesanan");
            $table->unsignedBigInteger("id_produk");
            $table->integer("jumlah");
            $table->string("nama");
            $table->integer("harga");
            $table->integer("subharga");
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
        Schema::dropIfExists('detail__pemesanan');
    }
}
