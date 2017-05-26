<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtcSelectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etc_select', function (Blueprint $table) {
            $table->integer('simple_plan')->unsigned();
            $table->foreign('simple_plan')->references('no')->on('simple_plans');
            $table->integer('option')->unsigned();
            $table->foreign('option')->references('no')->on('etc_select_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etc_select');
    }
}
