<?php

use Illuminate\Database\Seeder;

class EtcSelectArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('etc_select_articles')->insert([

            ['option' => 'MAS 이용(다수공급자계약제도이용)'],
            ['option' => '지자체 안심수학여행서비스신청 및 회신'],
            ['option' => '현장 경비(비용) 지출 없음'],
            ['option' => '최종계약일로부터 60일이내 체험학습 실시예정'],
            ['option' => '특별보호대상학생없음(신체허약자 등)'],
            ['option' => '수익자 부담 없음'],
            ['option' => '계약 관계 없음']

        ]);
    }
}
