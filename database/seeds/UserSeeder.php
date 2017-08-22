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
        $faker = Faker\Factory::create();
        for($i = 1; $i < 60; $i++) {
        DB::table('users')->insert([
        ['id' => $faker->unique()->word, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'teacher'],
        ['id' => $faker->unique()->word, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'parents'],
        ['id' => $faker->unique()->word, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'student']
        ]);

        }

        for($i = 1; $i < 40; $i++) {
        DB::table('users')->insert([
        ['id' => $faker->unique()->userName, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'teacher'],
        ['id' => $faker->unique()->userName, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'parents'],
        ['id' => $faker->unique()->userName, 'password' => bcrypt('123456'), 'name' => $faker->word, 'type' => 'student']
        ]);

        }

        DB::table('users')->insert([
            ['id' => 'teacher1', 'password' => bcrypt('123456'), 'name' => '선생님1', 'type' => 'teacher'],
            ['id' => 'teacher2', 'password' => bcrypt('123456'), 'name' => '선생님2', 'type' => 'teacher'],
            ['id' => 'teacher3', 'password' => bcrypt('123456'), 'name' => '선생님3', 'type' => 'teacher'],
            ['id' => 'student1', 'password' => bcrypt('123456'), 'name' => '학생1', 'type' => 'student'],
            ['id' => 'student2', 'password' => bcrypt('123456'), 'name' => '학생2', 'type' => 'student'],
            ['id' => 'student3', 'password' => bcrypt('123456'), 'name' => '학생3', 'type' => 'student'],
            ['id' => 'parents1', 'password' => bcrypt('123456'), 'name' => '학부모1', 'type' => 'parents'],
            ['id' => 'parents2', 'password' => bcrypt('123456'), 'name' => '학부모2', 'type' => 'parents'],
            ['id' => 'parents3', 'password' => bcrypt('123456'), 'name' => '학부모3', 'type' => 'parents']


        ]);

    }
}
