<?php

use Illuminate\Database\Seeder;

class FieldLearningProgramArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_learning_program_articles')->insert([

            ['article' => '수상활동'],
            ['article' => '산악등반'],
            ['article' => '장기도보'],
            ['article' => '실험참가'],
            ['article' => '도예체험'],
            ['article' => '단순기술습득'],
            ['article' => '위험기구사용'],
            ['article' => '관광'],
            ['article' => '관람(미술관, 박물관 등)'],
            ['article' => '도서관견학'],
            ['article' => '강의참가'],
            ['article' => '기타(사용자 입력)']

        ]);
    }
}
