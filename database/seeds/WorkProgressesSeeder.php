<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkProgressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = DB::table('field_learning_plans')->get();


        $plans->each(function ($plan) {
            $works = DB::table('field_learning_plan_works')->get();
            $works->each(function ($work) {

        DB::table('work_progresses')->insert([

            ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'work' => $work->no]

                ]);

            });
        });

    }
}
