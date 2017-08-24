<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $id = DB::table('histories')->insertGetId([
        ['plan' => 2, 'register' => 214],
        ['plan' => 1, 'register' => 214],
      ]);

      $history = DB::table('history_substances')->insert([
        'history'=>$id, 'place'=>1, 'substance'=>''
      ]);

        $plans = DB::table('field_learning_plans')->get();

        $plans->each(function ($plan) {
            DB::table('histories')->insert([

                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'register' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]

            ]);

        });
    }
}
