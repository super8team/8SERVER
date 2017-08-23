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
        foreach ($students as $student) { // 모든 학생을 어떤 반에 넣고 어떤 부모랑 연결함
          DB::table('students')->insert([
              ['student'=>$student->no,
               'grade_class'=>DB::table('grade_classes')->inRandomOrder()->first()->no,
               'parents'=>DB::table('users')->where('type', 'parents')->inRandomOrder()->first()->no],
          ]);
        }
    }
}
