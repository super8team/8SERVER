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

        ['name' => '학교1', 'tel' => '01050346922'],
        ['name' => '학교2', 'tel' => '01050346923'],
        ['name' => '학교3', 'tel' => '01050346924'],
        ['name' => '학교4', 'tel' => '01050346925'],
        ['name' => '학교5', 'tel' => '01050346926'],
        ['name' => '학교6', 'tel' => '01050346927'],
        ['name' => '학교7', 'tel' => '01050346928'],
        ['name' => '학교8', 'tel' => '01050346929'],
        ['name' => '학교9', 'tel' => '01050346930']

    ]);
    }
}
