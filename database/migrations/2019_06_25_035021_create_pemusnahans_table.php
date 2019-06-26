<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemusnahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemusnahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asset')->unsigned()->nullable();
            $table->string('nama_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('status')->nullable();
            $table->string('pic_pekerja')->nullable();
            $table->timestamps();
            
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
        Schema::dropIfExists('pemusnahans');
    }
}
