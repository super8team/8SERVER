<?php

use Illuminate\Database\Seeder;

class SurveyAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveyArticles = DB::table('survey_articles')->get();
        $surveyArticles->each(function ($surveyArticle) {

          if ($surveyArticle->type=="obj")
            DB::table('survey_answers')->insert([
                ['substance' => '내용1', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용1', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용1', 'survey_article' => $surveyArticle->no],
            ]);

        });

    }
}
