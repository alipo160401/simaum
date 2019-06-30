<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemindahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ruang')->unsigned();
            $table->string('no_pengajuan');
            $table->string('tanggal_beli')->nullable();
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('id_ruang')->references('id')->on('ruangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemindahans');
    }
}
