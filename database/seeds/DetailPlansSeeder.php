<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DetailPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plans = DB::table('field_learning_plans')->get();

        DB::table('detail_plans')->insert([
          ['place' => 1, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 9, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 10, 00, 'Asia/Seoul')],
          ['place' => 2, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 10, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 11, 00, 'Asia/Seoul')],
          ['place' => 3, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 11, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 12, 00, 'Asia/Seoul')],
          ['place' => 4, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 12, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 13, 00, 'Asia/Seoul')],
          ['place' => 5, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 13, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 14, 00, 'Asia/Seoul')],
          ['place' => 6, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 14, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 15, 00, 'Asia/Seoul')],
          ['place' => 7, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 15, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 16, 00, 'Asia/Seoul')],
          ['place' => 8, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 16, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 17, 00, 'Asia/Seoul')],
          ['place' => 4, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 17, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 18, 00, 'Asia/Seoul')],
          ['place' => 26, 'plan' => $plans[1]->no,
          'start_time' => Carbon::create(2016, 4, 26, 18, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 19, 00, 'Asia/Seoul')],

          ['place' => 16, 'plan' => $plans[0]->no,
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 'Asia/Seoul')],
          ['place' => 17, 'plan' => $plans[0]->no,
          'start_time' => Carbon::create(2015, 9, 10, 11, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 13, 00, 'Asia/Seoul')],
          ['place' => 18, 'plan' => $plans[0]->no,
          'start_time' => Carbon::create(2015, 9, 10, 13, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 15, 00, 'Asia/Seoul')],
          ['place' => 14, 'plan' => $plans[0]->no,
          'start_time' => Carbon::create(2015, 9, 10, 15, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 16, 00, 'Asia/Seoul')],
        ]);


    }
}
