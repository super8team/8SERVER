<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReCreateTableReviewEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_evaluations', function (Blueprint $table) {
          $table->increments('no');
          $table->integer('review')->unsigned();
          $table->foreign('review')->references('no')->on('review_writes');
          $table->integer('evaluater')->unsigned();
          $table->foreign('evaluater')->references('no')->on('users');
          $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_evaluations');
    }
}
