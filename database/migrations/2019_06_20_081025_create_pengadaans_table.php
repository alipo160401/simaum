<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vendor')->unsigned();
            $table->string('no_pengajuan');
            $table->string('status');
            $table->string('total_harga_real')->nullable();
            $table->string('total_harga_estimasi')->nullable();
            $table->string('invoice')->nullable();
            $table->string('berita_acara')->nullable();
            $table->string('tanggal_beli')->nullable();
            $table->timestamps();

            $table->foreign('id_vendor')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaans');
    }
}
