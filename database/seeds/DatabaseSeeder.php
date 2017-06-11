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
      $this->call(UserSeeder::class);
      $this->call(FieldLearningPlanStepsSeeder::class);
      $this->call(EtcSelectArticlesSeeder::class);
      $this->call(TrafficArticlesSeeder::class);
      $this->call(SchoolsSeeder::class);
      $this->call(PlaceSeeder::class);
      $this->call(FieldLearningProgramArticlesSeeder::class);
      $this->call(InstAuthArticlesSeeder::class);
      $this->call(ContentsPackageSeeder::class);
      $this->call(WorksSeeder::class);
      $this->call(WorksSeeder::class);
      $this->call(GradeClassesSeeder::class);
      $this->call(FieldLearningPlanWorksSeeder::class);
      $this->call(FieldLearningPlanDocumentsSeeder::class);
      $this->call(FieldLearningPlansSeeder::class);
      $this->call(StudentsSeeder::class);
      $this->call(DetailPlansSeeder::class);
      $this->call(GroupsSeeder::class);
      $this->call(HistoriesSeeder::class);
      $this->call(WorkProgressesSeeder::class);
      $this->call(SimplePlansSeeder::class);
      $this->call(SurveySeeder::class);
      $this->call(SurveyArticlesSeeder::class);
      $this->call(SurveyAnswersSeeder::class);
      $this->call(TeamsSeeder::class);
      $this->call(UseTrafficsSeeder::class);
      $this->call(HistorySubstancesSeeder::class);
      $this->call(HistoryImgsSeeder::class);
      $this->call(GradeClassesSeeder::class);
      $this->call(CheckListsSeeder::class);
      $this->call(PlanChecklistsSeeder::class);
    }

}
