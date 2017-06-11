<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $plans = DB::table('field_learning_plans')->get();
      $faker = Faker\Factory::create();

      foreach ($plans as $plan) {
        $teacher = DB::table('users')->where('no', $plan->teacher)->first();
        DB::table('surveies')->insert([
          ['title' => $teacher->name.' 선생님의 설문조사', 'writer' =>$teacher->no,
           'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
      }

    }
}
