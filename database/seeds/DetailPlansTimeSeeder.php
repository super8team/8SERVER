<?php

use Illuminate\Database\Seeder;

class DetailPlansTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = \DB::table("detail_plans")->where('plan', 6)->get();

        $year = "2017";
        $month = "5";
        $day = "21";
        $hour = ["9", "10",
                "10", "11",
                "11", "12",
                "12", "13",
                "13", "14",
                "14", "15",
                "15", "16",
                "16", "17",
                "17", "18",
                "18", "19",];
        $minute = "0";
        $second = "0";
        $tz = 'Asia/Seoul';

        for ($i=0; $i<9; $i++) {
          \DB::table('detail_plans')
                 ->where('no', $details[$i]->no)
                 ->update([
                   'place' => $i+1,
                   'start_time' => \Carbon\Carbon::create($year, $month, $day, $hour[2*$i], $minute, $second, $tz),
                   'end_time' => \Carbon\Carbon::create($year, $month, $day, $hour[2*$i+1], $minute, $second, $tz),
                 ]);
        }
    }
}
