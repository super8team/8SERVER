<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
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
            DB::table('groups')->insert([

                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' =>  DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no],
                ['plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no, 'joiner' => DB::table('users')
                    ->where('type', 'student')->inRandomOrder()
                    ->first()->no]
            ]);
        });


    }
}
