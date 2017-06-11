<?php

use Illuminate\Database\Seeder;

class PlanChecklistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $simplePlans = DB::table('field_learning_plans')->get();

        foreach ($simplePlans as $simplePlan) {
            $checklists = DB::table('checklists')->get();
            foreach ($checklists as $checklist) {
                DB::table('plan_checklists')->insert([
                    ['title' => '제목1', 'plan' => $simplePlan->no, 'checklist' => $checklist->no],
                ]);
            }
        }
    }
}
