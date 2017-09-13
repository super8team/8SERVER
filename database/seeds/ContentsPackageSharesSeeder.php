<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ContentsPackageSharesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //

        DB::table('contents_package_shares')->insert([

            ['contents_package'=>2,'img_url'=>'image2.jpg','explain'=>'불국사의 역사를 공부할 수 있는 문제!','views'=>'23','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'불국사'],
            ['contents_package'=>3,'img_url'=>'image3.jpg','explain'=>'릉의 역사를 공부할 수 있는 문제!','views'=>'43','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'릉의 역사'],
            ['contents_package'=>4,'img_url'=>'image4.jpg','explain'=>'발해의 건국','views'=>'1', 'downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'불국사'],
            ['contents_package'=>5,'img_url'=>'image5.jpg','explain'=>'대구 향교 역사','views'=>'23','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'향교'],
            ['contents_package'=>6,'img_url'=>'image6.jpg','explain'=>'수원 화성의 역사','views'=>'54','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'수원 화성'],
            ['contents_package'=>7,'img_url'=>'image7.jpg','explain'=>'첨성대의 만든 사람, 만들어진 시기','views'=>'45','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'첨성대'],
            ['contents_package'=>8,'img_url'=>'image8.jpg','explain'=>'단군신화에 대한 컨텐츠 집합','views'=>'45','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'웅과 환'],
            ['contents_package'=>8,'img_url'=>'image9.jpg','explain'=>'6.25 발발시기, 중공군의 개입에 대한 문제','views'=>'64','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'package_name'=>'6.25'],


        ]);
    }
}
