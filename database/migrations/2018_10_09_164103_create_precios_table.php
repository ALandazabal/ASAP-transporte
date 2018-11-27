<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comuna_id')->unsigned();
            $table->integer('tviaje_id')->unsigned();

            $table->float('precio');

            $table->string('descripcion');

            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->foreign('tviaje_id')->references('id')->on('tviajes');
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
        Schema::dropIfExists('precios');
    }
}
