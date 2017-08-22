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

        $students = DB::table('users')->where('type', 'student')->get();
        foreach ($students as $student) {
            if($student->no == 159) {
                DB::table('students')->insert([
                    ['student' => $student->no,
                        'grade_class' => 2,
                        'parents' => 224]
                ]);
            }else {

            DB::table('students')->insert([
                ['student'=>$student->no,
                 'grade_class'=>DB::table('grade_classes')->inRandomOrder()->first()->no,
                 'parents'=>DB::table('users')->where('type', 'parents')->inRandomOrder()->first()->no],
            ]);
        }
        }
    }
}
