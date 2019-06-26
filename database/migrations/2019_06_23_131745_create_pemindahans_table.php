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
            $table->integer('id_asset')->unsigned()->nullable();
            $table->integer('id_ruang')->unsigned()->nullable();
            $table->string('nama_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('status')->nullable();
            $table->string('pic_pekerja')->nullable();
            $table->timestamps();
            
            $table->foreign('id_asset')->references('id')->on('assets')->onDelete('cascade');
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
