<?php

use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create('ko_KR');
//      DB::table('schools')->insert([
//        ['name' => '영진고등학교', 'tel' => '01050346922', 'address'=>$faker->address], // 1
//        ['name' => '영진중학교', 'tel' => '01050346923', 'address'=>$faker->address], // 2
//        ['name' => '한국중학교', 'tel' => '01050346925', 'address'=>$faker->address], /// 3
//        ['name' => '대한고등학교', 'tel' => '01050346927', 'address'=>$faker->address], // 4 시연에 나오는 학교
//        ['name' => '동지여자고등학교', 'tel' => '01050346926', 'address'=>$faker->address], // 5
//        ['name' => '수피아여자고등학교', 'tel' => '01050346929', 'address'=>$faker->address], // 6
//      ]);

      $teachers = DB::table('users')->where('type', 'teacher')->get();
      foreach($teachers as $teacher) {
        DB::table('works')->insert([
          ['school' => 4, 'teacher' => $teacher->no]
        ]);
      }

      $teachers = DB::table('users')->where('type', 'teacher')->inRandomOrder()->get();
      $index=1;
      for($class=1; $class<4; $class++) {
        for($grade=1; $grade<6; $grade++) {
          DB::table('grade_classes')->insert([
            ["school" => 4, 'grade'=>$class, 'class'=>$grade,
            'teacher'=>$teachers[$index++]->no]
          ]);
        }
      }
    }
}
