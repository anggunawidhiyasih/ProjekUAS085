<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_wisata');
            $table->string('lokasi');
            $table->string('jenis_wisata');
            $table->timestamps();
    
        });
    }
  //  $table->foreign('kota/kabupaten')->references('kota/kabupaten')->on('detailwisata')->onDelete('cascade')->onUpdate('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisatas');
    }
}
