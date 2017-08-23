<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSurveySubjectiveRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_subjective_responds', function (Blueprint $table) {
            Schema::rename('survey_subjective_responds', 'survey_Respond_Contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_subjective_responds', function (Blueprint $table) {
            Schema::rename('survey_Respond_Contents', 'survey_subjective_responds');
        });
    }
}
