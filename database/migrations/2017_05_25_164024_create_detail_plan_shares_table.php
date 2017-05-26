<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPlanSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_plan_shares', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('detail_plan')->unsigned();
            $table->foreign('detail_plan')->references('no')->on('detail_plans');
            $table->string('comment', 255)->nullable();
            $table->integer('views');
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
        Schema::dropIfExists('detail_plan_shares');
    }
}
