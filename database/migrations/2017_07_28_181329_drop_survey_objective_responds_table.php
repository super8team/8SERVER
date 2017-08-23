<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSurveyObjectiveRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_objective_responds', function (Blueprint $table) {
            Schema::dropIfExists('survey_objective_responds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_objective_responds', function (Blueprint $table) {
            $table->integer('survey_respond')->unsigned();
            $table->foreign('survey_respond')->references('no')->on('survey_responds');
            $table->integer('survey_article')->unsigned();
            $table->foreign('survey_article')->references('no')->on('survey_articles');
            $table->integer('respond')->unsigned();
            $table->foreign('respond')->references('no')->on('survey_answers');
        });
    }
}
