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
        for($i = 1; $i < 100; $i++) {
        DB::table('users')->insert([
        ['id' => $faker->word, 'password' => bcrypt('123456'), 'name' => '선생님', 'type' => 'teacher'],
        ['id' => $faker->word, 'password' => bcrypt('123456'), 'name' => '학부모', 'type' => 'parents'],
        ['id' => $faker->word, 'password' => bcrypt('123456'), 'name' => '학생', 'type' => 'student']
    ]);
    }
    }
}
