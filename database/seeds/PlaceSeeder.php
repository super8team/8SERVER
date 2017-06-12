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
            ['name'=>'경진중학교', 'explain'=>'설명2', 'lat'=>35.895139, 'lng'=>128.622535, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'큰고개역', 'explain'=>'설명3', 'lat'=>35.884403, 'lng'=>128.632244, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'동대구역', 'explain'=>'설명4', 'lat'=>35.878020, 'lng'=>128.627862, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'신천역', 'explain'=>'설명5', 'lat'=>35.874671, 'lng'=>128.617615, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'경대병원', 'explain'=>'설명6', 'lat'=>35.866499, 'lng'=>128.604974, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'반월당역', 'explain'=>'설명7', 'lat'=>35.865553, 'lng'=>128.593388, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'프린스호텔', 'explain'=>'설명8', 'lat'=>35.856509, 'lng'=>128.586482, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'계명대학교 대명캠퍼스', 'explain'=>'설명9', 'lat'=>35.854245, 'lng'=>128.581735, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'심인고등학교', 'explain'=>'설명10', 'lat'=>35.848784, 'lng'=>128.578869, 'radius'=>10, 'img'=>'noIMG']


        ]);

    }
}
