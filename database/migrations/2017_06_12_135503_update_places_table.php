<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            DB::statement('ALTER TABLE places MODIFY lat double not null');
            DB::statement('ALTER TABLE places MODIFY lng double not null');
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
        Schema::table('places', function (Blueprint $table) {
            $table->float('lat')->change();
            $table->float('lng')->change();
            $table->float('radius')->change();
        });
    }
}
