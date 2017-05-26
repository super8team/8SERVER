<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_responds', function (Blueprint $table) {
            $table->integer('notice')->unsigned();
            $table->foreign('notice')->references('no')->on('notices');
            $table->integer('parents')->unsigned();
            $table->foreign('parents')->references('no')->on('users');
            $table->string('respond', 255);
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
        Schema::dropIfExists('notice_responds');
    }
}
