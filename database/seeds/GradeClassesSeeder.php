<?php

use Illuminate\Database\Seeder;

class GradeClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */




    public function run()
    {

        $schools = DB::table('schools')->get();

        foreach($schools as $school) {
            $teachers = DB::table('works')->where('school', $school->no)->get();
            foreach($teachers as $teacher) {
                $faker = Faker\Factory::create();
                DB::table('grade_classes')->insert([
                    ['school' => $school->no, 'grade' => $faker->numberBetween(1, 3)."학년", 'class' =>$faker->numberBetween(1, 5)."반",
                        'teacher' =>$teacher->teacher]
                ]);
            };

       };
    }
}
