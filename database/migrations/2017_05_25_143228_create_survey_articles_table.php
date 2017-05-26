<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_articles', function (Blueprint $table) {
        $table->increments('no');
        $table->integer('survey')->unsigned()->nullable();
        $table->foreign('survey')->references('no')->on('surveies');
        $table->string('article', 255);

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_articles');
    }
}
