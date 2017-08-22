<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsPackageSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_package_shares', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('contents_package')->unsigned();
            //패키지 이름
            $table->foreign('contents_package')->references('no')->on('contents_packages');
            $table->string('img_url', 255);
            $table->string('explain', 255)->nullable();
            $table->integer('views');
            $table->integer('downloads');
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
        Schema::dropIfExists('contents_package_shares');
    }
}
