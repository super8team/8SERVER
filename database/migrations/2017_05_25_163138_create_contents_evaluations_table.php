<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_evaluations', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('content')->unsigned();
            $table->foreign('content')->references('no')->on('contents');
            $table->integer('student')->unsigned();
            $table->foreign('student')->references('no')->on('users');
            $table->integer('score');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents_evaluations');
    }
}
