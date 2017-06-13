<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
<<<<<<< HEAD
=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan/plan_list');
    }
>>>>>>> 79cebf1ebedb7373eaafa3a0fae1ee5f214b6194


    // 간단 계획
    public function plan()
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



        return view('plan.plan_list')->with('plan_title', '')
                                      ->with('plan_date', '');
    }


    // 학생, 학부모 계획 리스트
    public function studentParentPlanList()
    {
        return view('plan.planlist2');
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
                                       ->with('', '')
                                       ->with('', '')
                                       ->with('', '')
                                       ->with('', '');
    }


    // 계획 맵
    public function map()
    {
        return view('plan.plan_map');
    }


}























