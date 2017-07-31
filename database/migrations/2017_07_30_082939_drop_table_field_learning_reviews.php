<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableFieldLearningReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('field_learning_reviews');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('field_learning_reviews', function (Blueprint $table) {
          $table->increments('no');
          $table->integer('plan')->unsigned();
          $table->foreign('plan')->references('no')->on('field_learning_plans');
          $table->timestamps();
          $table->string('title', 255);
          $table->string('substance', 255);
      });
    }
}
