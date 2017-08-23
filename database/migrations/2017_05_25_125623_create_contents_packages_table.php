<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_packages', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('no')->on('users');
            $table->string('name', 255);
            $table->string('explain', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents_packages');
    }
}
