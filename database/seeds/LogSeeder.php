<?php

use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('schedule_logs')->insert([
          'plan' => 6,
          'in_out_substance' => "영진전문대 도서관을 출발했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "동대구역에 도착했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "동대구역을 출발했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "경대병원역에 도착했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "경대병원역을 출발했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "반월당역에 도착했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "반월당역을 출발했습니다.",
        ], [
          'plan' => 6,
          'in_out_substance' => "서문시장역에 도착했습니다.",
        ]);
    }
}
