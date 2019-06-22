<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->string('path', 255);
            $table->integer('prijava_id')->unsigned();
            $table->string('original_name', 255);
            $table->string('unique_name', 255)->unique();
            $table->timestamps();
        });
        Schema::table('files', function (Blueprint $table){
            $table->primary('unique_name');
            $table->foreign('prijava_id')->references('id')->on('prijava');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
