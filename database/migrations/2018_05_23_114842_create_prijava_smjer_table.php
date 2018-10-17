<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrijavaSmjerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijava_smjer', function (Blueprint $table) {
            $table->integer('prijava')->unsigned();
            $table->integer('smjer')->unsigned();
            $table->integer('izbor');
            $table->decimal('bodovi', 5, 2);
            $table->timestamps();
        });

        Schema::table('prijava_smjer', function (Blueprint $table){
            $table->primary(['prijava', 'smjer']);
            $table->foreign('prijava')->references('id')->on('prijava');
            $table->foreign('smjer')->references('id')->on('smjerovi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijava_smjer');
    }
}
