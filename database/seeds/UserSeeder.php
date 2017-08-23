<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ko_KR');
        for($i=0; $i<40; $i++) {
          DB::table('users')->insert([ // 이름 중복 가능성 없음
            ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->unique()->name, 'type'=>'teacher'],
            ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->unique()->name, 'type'=>'parents'],
            ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->unique()->name, 'type'=>'student'],
          ]);

          // DB::table('users')->insert([ // 이름 중복
          //   ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->name, 'type'=>'teacher'],
          //   ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->name, 'type'=>'parents'],
          //   ['id'=>$faker->unique()->userName, 'password'=>bcrypt('123456'), 'name'=>$faker->name, 'type'=>'student'],
          // ]);
        }
    }
}
