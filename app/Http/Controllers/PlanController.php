<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 교사 계획 리스트
    public function index()
    {

        $planTitle = [];
        $planDate = [];

        $fieldLearningPlans = DB::table('field_learning_plans')->get();

        foreach ($fieldLearningPlans as $fieldLearningPlan) {

            array_push($planTitle ,$fieldLearningPlan->name);
            array_push($planDate, $fieldLearningPlan->created_at);

        }

        return view('plan.plan_list')->with('plan_title', $planTitle)
                                     ->with('plan_date', $planDate);

    }


    // 간단 계획
    public function plan()
    {

        return view('plan.plan');
    }


    // 계획 수정
    public function Modify(Request $request)
    {
        return view('plan.plan_modify');
    }


    // 교사 계획 리스트
    public function teacherPlanList()
    {



        return view('plan.plan_list')->with('plan_title', '')
                                      ->with('plan_date', '');
    }


    // 학생, 학부모 계획 리스트
    public function studentParentPlanList()
    {
        return view('plan.planlist2')->with('plan_title ', '')
                                      ->with('plan_date', '');
    }


    // 서류
    public function sheet()
    {
        return view('plan.plan_sheet')->with('plan_title ', '')
                                       ->with('plan_date', '')
                                       ->with('teacher_name', '')
                                       ->with('trip_kind_value', '')
                                       ->with('attend_class_count', '')
                                       ->with('attend_student_count	', '')
                                       ->with('unattend_student_count', '')
                                       ->with('transpotation ', '')
                                       ->with('activity', '')
                                       ->with('institution', '')
                                       ->with('others', '')
                                       ->with('result_check', '');
    }


    // 계획 맵
    public function map()
    {
        return view('plan.plan_map');
    }


}























