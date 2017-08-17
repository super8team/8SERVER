<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_imgs', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('substance')->unsigned();
            $table->foreign('substance')->references('no')->on('history_substances');
            $table->string('img_url', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_imgs');
    }
}
