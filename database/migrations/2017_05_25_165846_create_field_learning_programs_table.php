<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldLearningProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_learning_programs', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('simple_plan')->unsigned();
            $table->foreign('simple_plan')->references('no')->on('simple_plans');
            $table->integer('program')->unsigned();
            $table->foreign('program')->references('no')->on('field_learning_program_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_learning_programs');
    }
}
