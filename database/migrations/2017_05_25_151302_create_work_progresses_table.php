<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_progresses', function (Blueprint $table) {
            $table->integer('plan')->unsigned();
            $table->foreign('plan')->references('no')->on('field_learning_plans');
            $table->integer('work')->unsigned();
            $table->foreign('work')->references('no')->on('field_learning_plan_works');
            $table->tinyInteger('complete')->default(0);
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
        Schema::dropIfExists('work_progresses');
    }
}
