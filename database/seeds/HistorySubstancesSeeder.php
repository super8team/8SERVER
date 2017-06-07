<?php

use Illuminate\Database\Seeder;

class HistorySubstancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $histories = DB::table('histories')->get();

        $histories->each(function ($history) {

            DB::table('history_substances')->insert([

                ['substance' => '내용1', 'wheather' => '날씨1', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용2', 'wheather' => '날씨2', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용3', 'wheather' => '날씨3', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용4', 'wheather' => '날씨4', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용5', 'wheather' => '날씨5', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용6', 'wheather' => '날씨6', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용7', 'wheather' => '날씨7', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용8', 'wheather' => '날씨8', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no],
                ['substance' => '내용9', 'wheather' => '날씨9', 'history' => $history->no, 'place' => DB::table('places')->inRandomOrder()->first()->no]


            ]);
        });

    }
}
