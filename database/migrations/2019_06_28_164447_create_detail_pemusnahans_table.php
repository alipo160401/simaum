<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPemusnahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemusnahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemusnahan')->unsigned();
            $table->integer('id_asset')->unsigned();
            $table->timestamps();

            $table->foreign('id_pemusnahan')->references('id')->on('pemusnahans')->onDelete('cascade');
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
        Schema::dropIfExists('detail_pemusnahans');
    }
}
