<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmjerPredmetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smjer_predmet', function (Blueprint $table) {
            $table->integer('smjer')->unsigned();
            $table->integer('predmet')->unsigned();
            $table->timestamps();
        });

        Schema::table('smjer_predmet', function (Blueprint $table){
            $table->primary(['smjer', 'predmet']);
            $table->foreign('smjer')->references('id')->on('smjerovi');
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
        Schema::dropIfExists('smjer_predmet');
    }
}
