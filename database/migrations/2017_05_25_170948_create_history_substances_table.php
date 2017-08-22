<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorySubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_substances', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('history')->unsigned();
            $table->foreign('history')->references('no')->on('histories');
            $table->integer('place')->unsigned();
            $table->foreign('place')->references('no')->on('places');
            $table->string('substance', 255);
            $table->string('wheather', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_substances');
    }
}
