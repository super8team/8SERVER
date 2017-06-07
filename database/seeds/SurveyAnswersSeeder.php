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

            DB::table('survey_answers')->insert([

                ['substance' => '내용1', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용2', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용3', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용4', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용5', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용6', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용7', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용8', 'survey_article' => $surveyArticle->no],
                ['substance' => '내용9', 'survey_article' => $surveyArticle->no]


            ]);

        });

    }
}
