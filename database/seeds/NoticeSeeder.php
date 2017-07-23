<?php

use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('notices')->insert([
          'plan' => 6,
          'title' => '소백산 체험학습 가정통신문',
          'substance' => '귀하의 자녀와 소백산을 가게 되었습니다. 계획된 일정은 웹/어플리케이션에서 자녀 일정 보기 메뉴를 통해 확인하실 수 있습니다.',
          'writer' => 106,
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        // \DB::table('notice_responds')->insert([
        //   'notice' => 1,
        //   'parents' => 224,
        //   'respond' =>
        // ]);
    }
}
