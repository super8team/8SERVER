<?php

use Illuminate\Database\Seeder;

class SurveyArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveies = DB::table('surveies')->get();

        $surveies->each(function ($survey) {

            DB::table('survey_articles')->insert([

                ['article' => '항목1', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목2', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목3', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목4', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목5', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목6', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목7', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목8', 'type' => 'objective', 'survey' => $survey->no],
                ['article' => '항목9', 'type' => 'objective', 'survey' => $survey->no]


            ]);


        });

    }
}
