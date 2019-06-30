<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPemindahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemindahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemindahan')->unsigned();
            $table->integer('id_asset')->unsigned();
            $table->timestamps();

            $table->foreign('id_pemindahan')->references('id')->on('pemindahans')->onDelete('cascade');
            $table->foreign('id_asset')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemindahans');
    }
}
