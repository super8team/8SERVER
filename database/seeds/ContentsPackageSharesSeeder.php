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
            ['contents_package'=>1,'img_url'=>'image1.jpg','explain'=>'첨성대, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'12','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>2,'img_url'=>'image2.jpg','explain'=>'영진, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'23','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>3,'img_url'=>'image3.jpg','explain'=>'김종률교수님, 이중권교수님, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'43','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>5,'img_url'=>'image4.jpg','explain'=>'야구장, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'1', 'downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>6,'img_url'=>'image5.jpg','explain'=>'경주, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'23','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>7,'img_url'=>'image6.jpg','explain'=>'서울, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'54','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>8,'img_url'=>'image7.jpg','explain'=>'3층석탑, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'45','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>9,'img_url'=>'image8.jpg','explain'=>'첨성대, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'45','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['contents_package'=>8,'img_url'=>'image9.jpg','explain'=>'첨성대, 불국사, 왕릉의 역사를 공부할 수 있는 문제!','views'=>'64','downloads'=>4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

        ]);
    }
}
