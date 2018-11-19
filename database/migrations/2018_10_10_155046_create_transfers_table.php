<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('comuna_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->string('name');
            $table->string('email');

            $table->date('date_pick');
            $table->time('time_pick');
            
            $table->float('price');

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('transfers');
    }
}
