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
            $table->string('kategori');
            $table->string('sub_kategori');
            $table->string('jenis');
            $table->string('deskripsi')->nullable();
            $table->string('tanggal_beli');
            $table->string('value_beli');
            $table->string('umur_ekonomis');
            $table->string('penyusutan');
            $table->string('tanggal_penyusutan');
            $table->string('value_sekarang');
            $table->string('kondisi');
            $table->string('status_pemusnahan');
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
