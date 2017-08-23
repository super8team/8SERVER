<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_auth', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('simple_plan')->unsigned();
            $table->foreign('simple_plan')->references('no')->on('simple_plans');
            $table->integer('article')->unsigned();
            $table->foreign('article')->references('no')->on('inst_auth_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst_auth');
    }
}
