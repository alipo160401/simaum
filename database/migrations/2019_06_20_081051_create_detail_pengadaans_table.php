<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pengadaan')->unsigned();
            $table->string('nama_barang');
            $table->string('harga_estimasi');
            $table->timestamps();

            $table->foreign('id_pengadaan')->references('id')->on('pengadaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengadaans');
    }
}
