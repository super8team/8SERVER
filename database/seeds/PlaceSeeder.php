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

            ['name'=>'도서관', 'explain'=>'설명1', 'lat'=>35.895307, 'lng'=>128.622534, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'본관', 'explain'=>'설명2', 'lat'=>35.896802, 'lng'=>128.620876, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'공학관', 'explain'=>'설명3', 'lat'=>35.896685, 'lng'=>128.621944, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'백호체육관', 'explain'=>'설명4', 'lat'=>35.897050, 'lng'=>128.622609, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'연서관', 'explain'=>'설명5', 'lat'=>35.896833, 'lng'=>128.622700, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'청문관', 'explain'=>'설명6', 'lat'=>35.896346, 'lng'=>128.623006, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'창조관', 'explain'=>'설명7', 'lat'=>35.896902, 'lng'=>128.623108, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'영진사이버대학', 'explain'=>'설명8', 'lat'=>35.895442, 'lng'=>128.621322, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'운동장', 'explain'=>'설명9', 'lat'=>35.895994, 'lng'=>128.621440, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'부속유치원', 'explain'=>'설명10', 'lat'=>35.895642, 'lng'=>128.620673, 'radius'=>10, 'img'=>'noIMG']


        ]);

    }
}
