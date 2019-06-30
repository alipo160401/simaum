<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ruang')->unsigned();
            $table->string('nama');
            $table->string('kode');
            $table->string('kategori')->nullable();
            $table->string('sub_kategori')->nullable();
            $table->string('jenis')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('tanggal_beli')->nullable();
            $table->string('value_beli')->nullable();
            $table->string('umur_ekonomis')->nullable();
            $table->string('penyusutan')->nullable();
            $table->string('tanggal_penyusutan')->nullable();
            $table->string('value_sekarang')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('status_pemusnahan')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
