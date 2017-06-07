<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('no');
            $table->text('spec')->nullable();
            $table->text('xml');
            $table->integer('like');
            $table->integer('contents_package')->unsigned();
            $table->foreign('contents_package')->references('no')->on('contents_packages');
            $table->Integer('copy')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
