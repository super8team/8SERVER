<?php

use Illuminate\Database\Seeder;

class JapaneseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('ja_JP');

        $users = \DB::table('users')->get();
        foreach ($users as $user) {
          \DB::table('users')->where('no', $user->no)->update([
            ['name'=>$faker->unique()->userName]
          ]);
        }
    }
}
