<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcjeneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocjene', function (Blueprint $table) {
            $table->integer('prijava')->unsigned();
            $table->integer('predmet')->unsigned();
            $table->integer('ocjena');
            $table->timestamps();
        });

        Schema::table('ocjene', function (Blueprint $table){
            $table->primary(['prijava', 'predmet']);
            $table->foreign('prijava')->references('id')->on('prijava');
            $table->foreign('predmet')->references('id')->on('predmeti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocjene');
    }
}
