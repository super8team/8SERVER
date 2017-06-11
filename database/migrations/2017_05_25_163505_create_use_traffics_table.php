<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_traffics', function (Blueprint $table) {
            $table->integer('detail_plan')->unsigned();
            $table->foreign('detail_plan')->references('no')->on('detail_plans');
            $table->integer('traffic')->unsigned();
            $table->foreign('traffic')->references('no')->on('traffic_articles');
            $table->integer('fee');
            $table->integer('start_point')->unsigned();
            $table->foreign('start_point')->references('no')->on('detail_plans');
            $table->string('substance', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('use_traffics');
    }
}
