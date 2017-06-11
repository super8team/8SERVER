<?php

use Illuminate\Database\Seeder;

class UseTrafficsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('use_traffics')->insert([


            ['fee' => 100, 'traffic' => DB::table('traffic_articles')->inRandomOrder()->first()->no, 'start_point'   => DB::table('detail_plans')->inRandomOrder()->first()->no]







        ]);
    }
}
