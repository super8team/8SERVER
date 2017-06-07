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
        DB::table('schools')->insert([

        ['name' => '이름1', 'tel' => '01050346922'],
        ['name' => '이름2', 'tel' => '01050346923'],
        ['name' => '이름3', 'tel' => '01050346924'],
        ['name' => '이름4', 'tel' => '01050346925'],
        ['name' => '이름5', 'tel' => '01050346926'],
        ['name' => '이름6', 'tel' => '01050346927'],
        ['name' => '이름7', 'tel' => '01050346928'],
        ['name' => '이름8', 'tel' => '01050346929'],
        ['name' => '이름9', 'tel' => '01050346930']

    ]);
    }
}
