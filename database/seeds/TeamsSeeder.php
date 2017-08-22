<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
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

            DB::table('teams')->insert([

                ['team_name' => '팀이름1', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름2', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름3', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름4', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름5', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름6', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름7', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름8', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
                ['team_name' => '팀이름9', 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no]
            ]);

        });
    }
}
