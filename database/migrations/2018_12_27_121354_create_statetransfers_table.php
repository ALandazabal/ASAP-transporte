<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatetransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statetransfers', function (Blueprint $table) {
            $table->integer('transfer_id')->unsigned();
            $table->integer('statetf_id')->unsigned();

            $table->foreign('transfer_id')->references('id')->on('transfers');
            $table->foreign('statetf_id')->references('id')->on('statetf');
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
        Schema::dropIfExists('statetransfers');
    }
}
