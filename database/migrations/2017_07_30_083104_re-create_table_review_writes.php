<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReCreateTableReviewWrites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_writes', function (Blueprint $table) {
          $table->increments('no');
          $table->string('title', 255);
          $table->integer('writer')->unsigned();
          $table->foreign('writer')->references('no')->on('users');
          $table->integer('plan')->unsigned();
          $table->foreign('plan')->references('no')->on('field_learning_plans');
          $table->string('substance', 255);
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
        Schema::dropIfExists('review_writes');
    }
}
