<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyObjectiveRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_objective_responds', function (Blueprint $table) {
            $table->integer('survey_respond')->unsigned();
            $table->foreign('survey_respond')->references('no')->on('survey_responds');
            $table->integer('survey_article')->unsigned();
            $table->foreign('survey_article')->references('no')->on('survey_articles');
            $table->string('respond', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_objective_responds');
    }
}
