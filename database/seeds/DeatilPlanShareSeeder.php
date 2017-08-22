<?php

use Illuminate\Database\Seeder;

class DeatilPlanShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $plans = \DB::table('field_learning_plans')->get();

      foreach ($plans as $plan) {

        $details = \DB::table('detail_plans')->where('plan', $plan->no)->get();
        foreach ($details as $detail) {
          \DB::table('detail_plan_shares')->insert([
            'detail_plan' => $detail->no,
            'comment' => '교사가 작성하는 팁 ㅎ.ㅎ',
            'views' => 0,
          ]);
        }
      }
    }
}
