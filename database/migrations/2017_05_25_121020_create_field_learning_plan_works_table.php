<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldLearningPlanWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_learning_plan_works', function (Blueprint $table) {
            $table->increments('no');
            $table->string('name', 255);
            $table->string('explain', 255)->nullable();
            $table->integer('step')->unsigned();
            $table->foreign('step')->references('no')->on('field_learning_plan_steps');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_learning_plan_works');
    }
}
