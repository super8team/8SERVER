<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responds', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('respondent')->unsigned();
            $table->foreign('respondent')->references('no')->on('users');
            $table->integer('survey')->unsigned();
            $table->foreign('survey')->references('no')->on('surveies');
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
        Schema::dropIfExists('survey_responds');
    }
}
