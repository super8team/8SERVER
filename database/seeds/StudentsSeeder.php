<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([

            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no],
            ['student' => DB::table('users')
                ->where('type', 'student')->inRandomOrder()
                ->first()->no, 'grade_class' => DB::table('grade_classes')
                ->inRandomOrder()->first()->no, 'parents' => DB::table('users')
                ->where('type', 'parents')->inRandomOrder()
                ->first()->no]

        ]);
    }
}
