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

            ['name'=>'장소1', 'explain'=>'설명1', 'lat'=>37, 'lng'=>10, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소2', 'explain'=>'설명2', 'lat'=>371, 'lng'=>11, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소3', 'explain'=>'설명3', 'lat'=>372, 'lng'=>12, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소4', 'explain'=>'설명4', 'lat'=>373, 'lng'=>13, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소5', 'explain'=>'설명5', 'lat'=>374, 'lng'=>40, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소6', 'explain'=>'설명6', 'lat'=>375, 'lng'=>50, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소7', 'explain'=>'설명7', 'lat'=>376, 'lng'=>60, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소8', 'explain'=>'설명8', 'lat'=>377, 'lng'=>70, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소9', 'explain'=>'설명9', 'lat'=>378, 'lng'=>80, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소10', 'explain'=>'설명10', 'lat'=>390, 'lng'=>16, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소11', 'explain'=>'설명11', 'lat'=>391, 'lng'=>17, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소12', 'explain'=>'설명12', 'lat'=>392, 'lng'=>18, 'radius'=>100, 'img'=>'noIMG'],
            ['name'=>'장소13', 'explain'=>'설명13', 'lat'=>393, 'lng'=>19, 'radius'=>100, 'img'=>'noIMG']

        ]);

    }
}
