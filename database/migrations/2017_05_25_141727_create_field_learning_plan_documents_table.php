<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldLearningPlanDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_learning_plan_documents', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('work')->unsigned();
            $table->foreign('work')->references('no')->on('field_learning_plan_works');
            $table->string('document_url', 255);
            $table->string('explain', 255)->nullable();
            $table->string('name', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_learning_plan_documents');
    }
}
