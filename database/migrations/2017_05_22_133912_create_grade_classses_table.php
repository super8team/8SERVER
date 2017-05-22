<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeClasssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_classes', function (Blueprint $table) {
          $table->increments('no');
          $table->integer('school')->unsigned();
          $table->foreign('school')->references('no')->on('schools');
          $table->string('grade');
          $table->string('class');
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
        Schema::dropIfExists('grade_classes');
    }
}
