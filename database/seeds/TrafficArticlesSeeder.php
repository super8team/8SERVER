<?php

use Illuminate\Database\Seeder;

class TrafficArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('traffic_articles')->insert([
          ['article' => '전세버스'],
          ['article' => '항공'],
          ['article' => '선박'],
          ['article' => '기차'],
          ['article' => '대중교통'],
          ['article' => '없음'],
          ['article' => '기타(사용자입력)'],
        ]);
    }
}
