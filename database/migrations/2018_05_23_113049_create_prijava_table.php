<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrijavaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijava', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ime', 255);
            $table->string('prezime', 255);
            $table->string('ime_oca', 255);
            $table->string('email', 255)->unique();
            $table->float('prosjek', 4, 3);
            $table->integer('verified')->nullable();
            $table->integer('upisani_smjer')->unsigned()->nullable();
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
        Schema::dropIfExists('prijava');
    }
}
