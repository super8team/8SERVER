<?php

use Illuminate\Database\Seeder;

class HistoryImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $historySubstances = DB::table('history_substances')->get();

        $historySubstances->each(function ($historySubstance) {
            DB::table('history_imgs')->insert([

                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no],
                ['img_url' => 'noIMG', 'substance' => $historySubstance->no]




            ]);
        });


    }
}
