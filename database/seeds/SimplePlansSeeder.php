<?php

use Illuminate\Database\Seeder;

class SimplePlansSeeder extends Seeder
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

        DB::table('simple_plans')->insert([

            ['type' => '종류1', 'grade_class_count' => 1, 'student_count' => 300, 'unjoin_student_count' => 45, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류2', 'grade_class_count' => 2, 'student_count' => 290, 'unjoin_student_count' => 40, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류3', 'grade_class_count' => 3, 'student_count' => 280, 'unjoin_student_count' => 35, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류4', 'grade_class_count' => 4, 'student_count' => 270, 'unjoin_student_count' => 30, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류5', 'grade_class_count' => 5, 'student_count' => 260, 'unjoin_student_count' => 25, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류6', 'grade_class_count' => 6, 'student_count' => 250, 'unjoin_student_count' => 20, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류7', 'grade_class_count' => 7, 'student_count' => 240, 'unjoin_student_count' => 15, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류8', 'grade_class_count' => 8, 'student_count' => 230, 'unjoin_student_count' => 10, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no],
            ['type' => '종류9', 'grade_class_count' => 9, 'student_count' => 220, 'unjoin_student_count' => 5, 'plan' => DB::table('field_learning_plans')->inRandomOrder()->first()->no]

        ]);

        });
    }
}
