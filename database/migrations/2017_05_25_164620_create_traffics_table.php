<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffics', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('simple_plan')->unsigned();
            $table->foreign('simple_plan')->references('no')->on('simple_plans');
            $table->integer('traffic')->unsigned();
            $table->foreign('traffic')->references('no')->on('traffic_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traffics');
    }
}
