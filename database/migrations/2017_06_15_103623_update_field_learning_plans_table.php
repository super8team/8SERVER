<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFieldLearningPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('field_learning_plans', function (Blueprint $table) {
            $table->dropColumn('created_at', 'updated_at');
            $table->timestamp('at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('field_learning_plans', function (Blueprint $table) {
            $table->dropColumn('at');
            $table->timestamps();
        });
    }
}
