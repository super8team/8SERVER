<?php

use Illuminate\Database\Seeder;

class InstAuthArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inst_auth_articles')->insert([

            ['option' => '시도교육청 직영시설이용'],
            ['option' => '공공기관 인증프로그램이용'],
            ['option' => '공공기관 직영프로그램이용'],
            ['option' => '청소년단체운영프로그램이용'],
            ['option' => '없음']

        ]);
    }
}
