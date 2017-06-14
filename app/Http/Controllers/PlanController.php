<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 간단 계획
    public function index()
    {

        return view('plan.plan');

    }


    // 계획 수정
    public function Modify()
    {

        return view('plan.plan_modify');

    }


    // 교사 계획 리스트
    public function teacherPlanList()
    {

//        $planTitle = [];
//        $planDate = [];
//
//        $fieldLearningPlans = DB::table('field_learning_plans')->get();
//
//        foreach ($fieldLearningPlans as $fieldLearningPlan) {
//
//            array_push($planTitle ,$fieldLearningPlan->name);
//            array_push($planDate, $fieldLearningPlan->created_at);
//
//        }

        return view('plan.plan_list');
//            ->with('plan_title', $planTitle)
//                                      ->with('plan_date', $planDate);
    }


    // 학생, 학부모 계획 리스트
    public function studentParentPlanList()
    {
        return view('plan.planlist2');
//        ->with('plan_title ', '')
//                                      ->with('plan_date', '');
    }


    // 서류 작성
    public function sheet()
    {


        return view('plan.plan_sheet');
//            ->with('plan_title ', '')
//                                       ->with('plan_date', '')
//                                       ->with('teacher_name', '')
//                                       ->with('trip_kind_value', '')
//                                       ->with('attend_class_count', '')
//                                       ->with('attend_student_count	', '')
//                                       ->with('unattend_student_count', '')
//                                       ->with('transpotation ', '')
//                                       ->with('activity', '')
//                                       ->with('institution', '')
//                                       ->with('others', '')
//                                       ->with('result_check', '');
    }


    // 계획 맵
    public function map()
    {
        return view('plan.plan_map');
    }


    // getPlanDetail
    // post {  }
    // plan{
    //        plan1 { place : (장소이름)  at: }
    //        plan2 { ....
    // }
    public function getPlanDetial(Request $request) {
      $user = $request->input('userId');
      $user = \DB::table('users')->where('id', $user)->first();

      $plan = \DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();
      $details = \DB::table('detail_plans')->where('plan', $plan->no)->get();

      $result = [];

      $detailIndex = 1;
      foreach($details as $detail) {
        $result["plan".$detailIndex] = ["place" => \DB::table('places')->where('no', $detail->place)->value('name'),
                                        "at"    => $detail->at];
        $detailIndex++;
      }
      // dd($result);
      return json_encode($result);
    }

}
