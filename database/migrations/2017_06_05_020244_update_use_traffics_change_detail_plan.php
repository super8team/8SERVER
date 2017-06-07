<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUseTrafficsChangeDetailPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('use_traffics', function (Blueprint $table) {
            $table->dropForeign('use_traffics_detail_plan_foreign');
            $table->dropColumn('detail_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('use_traffics', function (Blueprint $table) {
            $table->integer('detail_plan')->unsigned();
            $table->foreign('detail_plan')->references('no')->on('detail_plans');
        });
    }
}
