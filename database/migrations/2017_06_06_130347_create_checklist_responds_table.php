<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_checklists', function (Blueprint $table) {
            $table->increments('no');
            $table->string('title');
            $table->integer('plan')->unsigned();
            $table->foreign('plan')->references('no')->on('field_learning_plans');
            $table->integer('checklist')->unsigned();
            $table->foreign('checklist')->references('no')->on('checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_checklists');
    }
}
