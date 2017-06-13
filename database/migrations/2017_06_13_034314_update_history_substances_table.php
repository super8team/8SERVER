<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHistorySubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_substances', function (Blueprint $table) {
            $table->renameColumn('wheather', 'weather');
        });
    }

    /**
     * Reverse the migrations.
     *du
     * @return void
     */
    public function down()
    {
        Schema::table('history_substances', function (Blueprint $table) {
            $table->string('wheather', 255)->change();
        });
    }
}
