<?php

use Illuminate\Database\Seeder;

class PlanDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history_substances')->where('no', 73)->update([
            'place' => '1', 'history' => 9, 'substance' => '날씨가 맑아서 그런지 오늘따라 경치가 더 좋아 보이네요.', 'weather' => '맑음'
        ]);
        DB::table('history_substances')->where('no', 74)->update([
            'place' => '2', 'history' => 9, 'substance' => '날씨가 흐려질거 같아서 오후에는 조금 쌀쌀할 것 같네요.', 'weather' => '흐림'
        ]);
        DB::table('history_substances')->where('no', 75)->update([
            'place' => '3', 'history' => 9, 'substance' => '갑작스럽게 비가 내리는 관계로 비를 피하고 있습니다.', 'weather' => '비옴'
        ]);
        DB::table('history_substances')->where('no', 76)->update([
            'place' => '4', 'history' => 9, 'substance' => '안개 때문에 더욱 안전에 주의하고 있습니다.', 'weather' => '안개'
        ]);
        DB::table('history_substances')->where('no', 77)->update([
            'place' => '5', 'history' => 9, 'substance' => '갑작스런 폭풍에 일찍 복귀를 하게 되었습니다.', 'weather' => '폭풍'
        ]);
        DB::table('history_substances')->where('no', 78)->update([
            'place' => '6', 'history' => 9, 'substance' => '날씨가 맑아서 그런지 오늘따라 경치가 더 좋아 보이네요.', 'weather' => '맑음'
        ]);
        DB::table('history_substances')->where('no', 79)->update([
            'place' => '7', 'history' => 9, 'substance' => '날씨가 흐려질거 같아서 오후에는 조금 쌀쌀할 것 같네요.', 'weather' => '흐림'
        ]);
        DB::table('history_substances')->where('no', 80)->update([
            'place' => '8', 'history' => 9, 'substance' => '갑작스럽게 비가 내리는 관계로 비를 피하고 있습니다.', 'weather' => '비옴'
        ]);
        DB::table('history_substances')->where('no', 81)->update([
            'place' => '9', 'history' => 9, 'substance' => '안개 때문에 더욱 안전에 주의하고 있습니다.', 'weather' => '안개'
        ]);
        DB::table('history_substances')->where('no', 82)->update([
            'place' => '10' , 'history' => 9, 'substance' => '갑작스런 폭풍에 일찍 복귀를 하게 되었습니다.', 'weather' => '폭풍'
        ]);

    }
}
