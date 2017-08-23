<?php

use Illuminate\Database\Seeder;

class WorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = DB::table('schools')->get();

        $schools->each(function ($school) {

            DB::table('works')->insert([

                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no],
                ['school' => $school->no, 'teacher' => DB::table('users')
                    ->where('type', 'teacher')->inRandomOrder()
                    ->first()->no]

            ]);

        });

    }
}
