<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoping_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('merek_barang');
            $table->string('harga_barang');
            $table->string('spesifikasi');
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
        Schema::dropIfExists('shoping_lists');
    }
}
