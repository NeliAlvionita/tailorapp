<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengeluaran', function (Blueprint $table) {
            $table->bigIncrements("id_detailpengeluaran");
            $table->unsignedBigInteger("id_pengeluaran");
            $table->string("nama_barang");
            $table->string("satuan");
            $table->integer("jumlah");
            $table->integer("harga");
            $table->integer("subtotal");
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
        Schema::dropIfExists('detail_pengeluaran');
    }
}
