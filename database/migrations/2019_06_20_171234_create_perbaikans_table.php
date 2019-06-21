<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vendor')->unsigned();
            $table->string('no_pengajuan');
            $table->string('total_harga_real');
            $table->string('total_harga_estimasi');
            $table->string('invoice');
            $table->string('berita_acara');
            $table->string('tanggal_beli');
            $table->string('status');
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
        Schema::dropIfExists('perbaikans');
    }
}
