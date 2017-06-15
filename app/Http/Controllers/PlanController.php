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
    public function index()
    {
        // return view('plan.plan_list');
    }

    // planlist.blade.php
    // return{
    // 	plan_no			= 숫잡열
    // 	plan_title 			= “(String)”, 문자열배열
    // 	plan_date			= “(String)” 문자열배열
    // }

    public function teacher() {

      $plans = \DB::table('field_learning_plans')->get();

      $planIds = [];
      $planTitles = [];
      $planDates = [];

      foreach($plans as $plan) {
        array_push($planIds, $plan->no);
        array_push($planTitles, $plan->title);
        array_push($planDates, $plan->write_date);
      }

      return view('plan.plan_list', [
        'plan_no' => $planIds,
        'plan_title' => $planTitles,
        'plan_date' => $planDates,
      ]);
    }

    public function student() {
      return view('plan.planlist2');
    }

    public function parents() {
      return view('plan.planlist2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.plan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // result_check[]			= “(ArrayString)”	//진행도 여부를 파악용 체크
    public function store(Request $request)
    {
      $plan_title = $request->input(plan_title);
      $plan_date = $request->input(plan_date);
      $trip_kind_value = $request->input(trip_kind_value);
      $attend_class_count = $request->input(attend_class_count);
      $attend_student_count = $request->input(attend_student_count);
      $unattend_student_count = $request->input(unattend_student_count);
      $transpotation = $request->input(transpotation);
      $activity = $request->input(activity);
      $institution = $request->input(institution);
      $others = $request->input(others);

      // 저장

        // return view('plan.sheet'); // id 보내야됨
        return redirect()->route('plan.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('plan.sheet'); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('plan.plan', [
        'plan_title' => $plan_title,
        'plan_date' => $plan_date,
        'trip_kind_value' => $trip_kind_value,
        'attend_class_count' => $attend_class_count,
        'attend_student_count' => $attend_student_count,
        'unattend_student_count' => $unattend_student_count,
        'transpotation' => $transpotation,
        'activity' => $activity,
        'institution' => $institution,
        'others' => $others,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $plan_title = $request->input(plan_title);
      $plan_date = $request->input(plan_date);
      $trip_kind_value = $request->input(trip_kind_value);
      $attend_class_count = $request->input(attend_class_count);
      $attend_student_count = $request->input(attend_student_count);
      $unattend_student_count = $request->input(unattend_student_count);
      $transpotation = $request->input(transpotation);
      $activity = $request->input(activity);
      $institution = $request->input(institution);
      $others = $request->input(others);

      
      return redirect()->route('plan.sheet', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('plan.plan_list'); // teacher_index
    }

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
