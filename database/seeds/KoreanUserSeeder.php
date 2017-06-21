<?php

use Illuminate\Database\Seeder;

class KoreanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $ids = [9, 87, 93, 105, 114,
                15, 27, 48, 90, 129,
                36, 69, 111, 144, 177,
                106, 159, 224, 126, 267,
                105, 237, 171, 93, 129,
                288, 297];
       $names = ["김봉춘", "이기춘", "정영단", "박희영", "정수철",
                "김봄", "이여름", "박가을", "정겨울", "임계절",
                "이산", "김바다", "양초원", "심들판", "강사막",
                "이선생", "조학생", "박부모", "이남례", "이별반짝",
                "강물맑음", "신바람", "유강임", "함초롬", "김소피아",
                "성이름", "임채원"];

       for ($i=0; $i<count($ids); $i++) {
          \DB::table('users')
                 ->where('no', $ids[$i])
                 ->update([
                   'name' => $names[$i]
                 ]);
        }
      }
}
