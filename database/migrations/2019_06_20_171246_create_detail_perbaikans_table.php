<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_perbaikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perbaikan')->unsigned();
            $table->integer('id_asset')->unsigned();
            $table->string('harga_estimasi');
            $table->timestamps();

            $table->foreign('id_perbaikan')->references('id')->on('perbaikans')->onDelete('cascade');
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
        Schema::dropIfExists('detail_perbaikans');
    }
}
