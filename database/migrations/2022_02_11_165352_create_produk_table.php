<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements("id_produk");
            $table->unsignedBigInteger("id_layanan");
            $table->unsignedBigInteger("id_kategori");
            $table->string("nama_produk");
            $table->string("foto_produk");
            $table->integer("harga");
            $table->string("detail_produk");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
