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

        $students = DB::table('students')->where('grade_class', 11)->orWhere('grade_class', 12)->orWhere('grade_class', 13)->get();
        foreach($stdents as $student) {
          DB::table('groups')->insert([
            'plan'=>1,
            'joiner'=>$student->student,
            'type'=>'student',
          ]);
          DB::table('groups')->insert([
            'plan'=>2,
            'joiner'=>$student->student,
            'type'=>'student',
          ]);
        }
        DB::table('groups')->insert([
          ['plan'=>1, 'joiner'=>91, 'type'=>'teacher'],
          ['plan'=>1, 'joiner'=>193, 'type'=>'teacher'],
          ['plan'=>2, 'joiner'=>91, 'type'=>'teacher'],
          ['plan'=>2, 'joiner'=>193, 'type'=>'teacher'],
        ]);
    }
}
