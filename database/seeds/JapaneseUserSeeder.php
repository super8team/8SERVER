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
        \DB::table('users')->where('id', 'ano')->update([
          ['name'=>$faker->unique()->userName]
        ]);
        \DB::table('users')->where('id', 'ak77')->update([
          ['name'=>$faker->unique()->userName]
        ]);
        \DB::table('users')->where('id', 'soyoun54')->update([
          ['name'=>$faker->unique()->userName]
        ]);
    }
}
