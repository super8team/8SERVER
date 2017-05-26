<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_plans', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('teacher')->unsigned();
            $table->foreign('teacher')->references('no')->on('users');
            $table->integer('detail_plan')->unsigned();
            $table->foreign('detail_plan')->references('no')->on('detail_plans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_plans');
    }
}
