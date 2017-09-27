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
          ['place' => 23, 'plan' => 5
          'start_time' => Carbon::create(2016, 4, 26, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 10, 00, 00, 'Asia/Seoul')],

          ['place' => 24, 'plan' => 5,
          'start_time' => Carbon::create(2016, 4, 26, 10, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 25, 'plan' => 5,
          'start_time' => Carbon::create(2016, 4, 26, 11, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 12, 00, 00, 'Asia/Seoul')],

          ['place' => 26, 'plan' => 5,
          'start_time' => Carbon::create(2016, 4, 26, 12, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 13, 00, 00, 'Asia/Seoul')],

          ['place' => 27, 'plan' => 5,
          'start_time' => Carbon::create(2016, 4, 26, 13, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2016, 4, 26, 14, 00, 00, 'Asia/Seoul')],

          ['place' => 24, 'plan' => 1
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 23, 'plan' => 1
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 25, 'plan' => 1
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 28, 'plan' => 1
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 29, 'plan' => 1
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 25, 'plan' => 2
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 27, 'plan' => 2
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],

          ['place' => 28, 'plan' => 2
          'start_time' => Carbon::create(2015, 9, 10, 9, 00, 00, 'Asia/Seoul'),
          'end_time' => Carbon::create(2015, 9, 10, 11, 00, 00, 'Asia/Seoul')],
        ]);


    }
}
