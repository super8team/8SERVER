<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //  $this->call(UserSeeder::class);
    //  $this->call(FieldLearningPlanStepsSeeder::class);
    //  $this->call(EtcSelectArticlesSeeder::class);
    //  $this->call(TrafficArticlesSeeder::class);
    // $this->call(SchoolsSeeder::class);
     $this->call(PlaceSeeder::class);
    // $this->call(FieldLearningProgramArticlesSeeder::class);
    // $this->call(InstAuthArticlesSeeder::class);
    // $this->call(FieldLearningPlanWorksSeeder::class);
    // $this->call(FieldLearningPlanDocumentsSeeder::class);
    // $this->call(StudentsSeeder::class);
//    $this->call(CheckListsSeeder::class);
 //   $this->call(FieldLearningPlansSeeder::class);

     $this->call(DetailPlansSeeder::class);
<<<<<<< HEAD
//     $this->call(GroupsSeeder::class);
=======
    //  $this->call(GroupsSeeder::class);
>>>>>>> d03cf4f5d8ac736c2f5be1a9f9a6f3b4c2dd3344

//      $this->call(ContentsPackageSeeder::class);
        // $this->call(LogSeeder::class);
//      $this->call(HistoriesSeeder::class);
//      $this->call(HistorySubstancesSeeder::class);
//      $this->call(HistoryImgsSeeder::class);
//      $this->call(WorkProgressesSeeder::class);
//      $this->call(SurveySeeder::class);
//      $this->call(SurveyArticlesSeeder::class);
//      $this->call(SurveyAnswersSeeder::class);
    //  $this->call(PlanChecklistsSeeder::class);

        // $this->call(ContentsSeeder::class);
    //     $this->call(ContentsPackageSharesSeeder::class);

//        $this->call(PlanDemoSeeder::class);

        // $this->call(KoreanUserSeeder::class);
        // $this->call(ContentsSeeder::class);
        // $this->call(ContentsSeeder::class);


        // $this->call(NoticeSeeder::class);
    }

}
