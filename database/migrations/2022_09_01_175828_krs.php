<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Krs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->increments('id_krs');
            $table->integer('id_mhs')->unsigned();
            $table->integer('id_makul')->unsigned()->nullable();
            $table->float('nilai_ip')->nullable();
            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_makul')->references('id_makul')->on('makul')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krs');
    }
}
