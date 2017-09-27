<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PlaceSeeder::class);
        $this->call(DetailPlansSeeder::class);
        $this->call(DetailPlanShareSeeder::class);
    }

}
