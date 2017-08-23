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

        $plans->each(function($plan) {
            DB::table('detail_plans')->insert([
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['place' => DB::table('places')->inRandomOrder()->first()->no, 'plan' => $plan->no, 'at' => Carbon::now()->format('Y-m-d H:i:s')]
            ]);
        });
    }
}
