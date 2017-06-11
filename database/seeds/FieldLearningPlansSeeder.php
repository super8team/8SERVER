<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FieldLearningPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_learning_plans')->insert([

            ['name' => '체험학습1', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습2', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습3', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습4', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습5', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습6', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습7', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습8', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => '체험학습9', 'teacher' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]

        ]);
    }
}
