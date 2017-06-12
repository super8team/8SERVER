<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContentsPackageSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents_package_shares', function (Blueprint $table) {
            $table->integer('views')->default(0)->change();
            $table->integer('downloads')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents_package_shares', function (Blueprint $table) {
            $table->integer('views')->change();
            $table->integer('downloads')->change();
        });
    }
}
