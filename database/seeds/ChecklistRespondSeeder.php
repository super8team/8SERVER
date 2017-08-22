<?php

use Illuminate\Database\Seeder;

class ChecklistRespondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $checks = \DB::table('checklists')->get();
      foreach ($checks as $check) {
        # code...
        $plan_check = \DB::table('plan_checklists')
                              ->where('plan', 6)
                              ->where('checklist', $check->no)
                              ->first();
        \DB::table('checklist_responds')->insert([
          "checklist" => $plan_check->no,
          "respond" => 0,
        ]);
      }
    }
}
