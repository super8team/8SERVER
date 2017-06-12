<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePhotozonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photozones', function (Blueprint $table) {
            DB::statement('ALTER TABLE photozones MODIFY lat double not null');
            DB::statement('ALTER TABLE photozones MODIFY lng double not null');
            $table->integer('radius')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photozones', function (Blueprint $table) {
            $table->float('lat')->change();
            $table->float('lng')->change();
            $table->float('radius')->change();
        });
    }
}
