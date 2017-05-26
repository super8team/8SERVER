<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_plans', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('place')->unsigned();
            $table->foreign('place')->references('no')->on('places');
            $table->integer('plan')->unsigned();
            $table->foreign('plan')->references('no')->on('field_learning_plans');
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
        Schema::dropIfExists('detail_plans');
    }
}
