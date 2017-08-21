<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldLearningPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_learning_plans', function (Blueprint $table) {
            $table->increments('no');
            $table->string('name', 255);
            $table->timestamps();
            $table->integer('contents_package')->unsigned()->nullable();
            $table->foreign('contents_package')->references('no')->on('contents_packages');
            $table->integer('teacher')->unsigned();
            $table->foreign('teacher')->references('no')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_learning_plans');
    }
}
