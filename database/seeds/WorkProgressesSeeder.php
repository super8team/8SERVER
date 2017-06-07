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
            $works = DB::table('works')->get();
            $works->each(function ($work) {

        DB::table('work_progresses')->insert([

            ['plan' => DB::table('$plan')->inRandomOrder()->first()->no, 'work' => $work->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]

                ]);

            });
        });

    }
}
