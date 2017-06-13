<?php

use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([

            ['name'=>'영진전문대 도서관', 'explain'=>'설명1', 'lat'=>35.895139, 'lng'=>128.622535, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'동대구역', 'explain'=>'설명2', 'lat'=>35.878020, 'lng'=>128.627862, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'경대병원역', 'explain'=>'설명3', 'lat'=>35.866499, 'lng'=>128.604974, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'반월당역', 'explain'=>'설명4', 'lat'=>35.865664, 'lng'=>128.593486, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'서문시장역', 'explain'=>'설명5', 'lat'=>35.869994, 'lng'=>128.582222, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'북구청역', 'explain'=>'설명6', 'lat'=>35.884151, 'lng'=>128.581366, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'칠성초등학교', 'explain'=>'설명7', 'lat'=>35.886719, 'lng'=>128.593658, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'대산초등학교', 'explain'=>'설명8', 'lat'=>35.897173, 'lng'=>128.593572, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'연암공원', 'explain'=>'설명9', 'lat'=>35.899900, 'lng'=>128.600526, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'대동초등학교', 'explain'=>'설명10', 'lat'=>35.897329, 'lng'=>128.612370, 'radius'=>10, 'img'=>'noIMG']


        ]);

    }
}



