<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameEtcSelectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etc_select', function (Blueprint $table) {
            Schema::rename('etc_select', 'etc_selects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etc_select', function (Blueprint $table) {
            Schema::rename('etc_selects', 'etc_select');
        });
    }
}
