<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FieldLearningPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      setlocale(LC_CTYPE, 'ko_KR');
      // teacher id = jsong(82) / ukwak(103)
        // DB::table('field_learning_plans')->insert([
        //   ['name' => '제주도 수학여행', 'teacher' => 82,
        //   'at' => Carbon::createFromDate(2015, 9, 10, 'Asia/Seoul'),],
        //   ['name' => '영진전문대 체험학습', 'teacher' => 82,
        //   'at' => Carbon::createFromDate(2016, 4, 26),],
        // ]);
        //
//        DB::table('simple_plans')->insert([
//          ['plan' => 1, 'type' => '수학여행', 'grade_class_count'=>3, 'student_count'=>10, 'unjoin_student_count'=>1],
//          ['plan' => 2, 'type' => '숙박형', 'grade_class_count'=>3, 'student_count'=>10, 'unjoin_student_count'=>1],
//        ]);

        // $checklists = DB::table('checklists')->get();
        // foreach($checklists as $checklist) {
        //   $id = DB::table('plan_checklists')->insertGetId([
        //     'plan' => 1,
        //     'checklist' => $checklist->no
        //   ]);
        //   DB::table('checklist_responds')->insert([
        //     'checklist' => $id
        //   ]);
        //
        //   $id = DB::table('plan_checklists')->insertGetId([
        //     'plan' => 2,
        //     'checklist' => $checklist->no
        //   ]);
        //   DB::table('checklist_responds')->insert([
        //     'checklist' => $id
        //   ]);
        // }
       // detailPlan / simplePlan / survey / checklists /
       // sim-etcSelect / field_learning_program / inst_auth / TrafficArticlesSeeder
       // history / group /

       \DB::table('field_learning_plans')->where('no', 1)->update([
         'name' => '日本の映画の歴史学習'
       ]);

       \DB::table('field_learning_plans')->where('no', 2)->update([
         'name' => '東京博物館観覧'
       ]);

       \DB::table('field_learning_plans')->where('no', 3)->update([
         'name' => '別府地獄温泉観覧'
       ]);

       \DB::table('field_learning_plans')->where('no', 4)->update([
         'name' => '韓国文化体験'
       ]);

       \DB::table('field_learning_plans')->where('no', 5)->update([
         'name' => '福岡市民防災センター'
       ]);

       \DB::table('field_learning_plans')->where('no', 18)->update([
         'name' => '韓国歴史体験'
       ]);

       \DB::table('field_learning_plans')->where('no', 19)->update([
         'name' => 'キョンジュ文化体験学習'
       ]);
    }
}
