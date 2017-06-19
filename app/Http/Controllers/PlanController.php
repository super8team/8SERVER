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

      $plans = \DB::table('field_learning_plans')->orderBy('no', 'desc')->get();

      $planIds = [];
      $planTitles = [];
      $planDates = [];

      foreach($plans as $plan) {

        // dd($plan);
        array_push($planIds, $plan->no);
        array_push($planTitles, $plan->name);
        array_push($planDates, $plan->at); 
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
      $plan_title = $request->input('plan_title');
      $plan_date = $request->input('plan_date');
      $trip_kind_value = $request->input('trip_kind_value');
      $attend_class_count = $request->input('attend_class_count');
      $attend_student_count = $request->input('attend_student_count');
      $unattend_student_count = $request->input('unattend_student_count');
      $transpotation = $request->input('transpotation');
      $activity = $request->input('activity');
      $institution = $request->input('institution');
      $others = $request->input('others');
      $userNo = $request->input('user_no');

      $dates = explode("-", $plan_date);

      $planNo = \DB::table('field_learning_plans')->insertGetId([
        'name' => $plan_title,
        'at' => \Carbon\Carbon::createFromDate($dates[0], $dates[1], $dates[2], 'Asia/Seoul'),
        'teacher' => $userNo,
      ]);

      $simple = \DB::table('simple_plans')->insertGetId([
        'plan' => $planNo,
        'type' => $trip_kind_value,
        'grade_class_count' => $attend_class_count,
        'student_count' => $attend_student_count,
        'unjoin_student_count' => $unattend_student_count,
      ]);

      for ($i=0; $i<count($transpotation); $i++) {
        \DB::table('traffics')->insert([
          'simple_plan' => $simple,
          'traffic' => $transpotation[$i],
        ]);
      }
      
      for ($i=0; $i<count($institution); $i++) {
        \DB::table('inst_auth')->insert([
          'simple_plan' => $simple,
          'article' => $institution[$i],
        ]);
      }
      
      for ($i=0; $i<count($activity); $i++) {
        \DB::table('field_learning_programs')->insert([
          'simple_plan' => $simple,
          'program' => $activity[$i],
        ]);
      }
      
      for ($i=0; $i<count($others); $i++) {
        \DB::table('etc_selects')->insert([
          'simple_plan' => $simple,
          'option' => $others[$i],
        ]);
      }

      // return view('plan.sheet'); // id 보내야됨
      return redirect()->route('plan.show', $planNo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $plan = \DB::table('field_learning_plans')->where('no', $id)->first();
      $simple = \DB::table('simple_plans')->where('plan', $plan->no)->first();
      
      $traffics = \DB::table('traffics')->where('simple_plan', $simple->no)->get();
      $articles = \DB::table('inst_auth')->where('simple_plan', $simple->no)->get();
      $programs = \DB::table('field_learning_programs')->where('simple_plan', $simple->no)->get();
      $options = \DB::table('etc_selects')->where('simple_plan', $simple->no)->get();

      $plan_title = $plan->no;
      $plan_date = $plan->at;
      $trip_kind_value = $simple->type;
      $attend_class_count = $simple->grade_class_count;
      $attend_student_count = $simple->student_count;
      $unattend_student_count = $simple->unjoin_student_count;
      
      $transpotation = [];
      $activity = [];
      $institution = [];
      $others = [];
      
      foreach($traffics as $traffic) {
        array_push($transpotation, $traffic->traffic);
      }
      
      foreach($articles as $article) {
        array_push($institution, $article->article);
      }
      
      foreach($programs as $program) {
        array_push($activity, $program->program);
      }
      
      foreach($options as $option) {
        array_push($others, $option->option);
      }

      return view('plan.plan_sheet', [
      'plna_no' => $id,
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
      ]); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $plan = \DB::table('field_learning_plans')->where('no', $id)->first();
      $simple = \DB::table('simple_plans')->where('plan', $plan->no)->first();
      
      $traffics = \DB::table('traffics')->where('simple_plan', $simple->no)->get();
      $articles = \DB::table('inst_auth')->where('simple_plan', $simple->no)->get();
      $programs = \DB::table('field_learning_programs')->where('simple_plan', $simple->no)->get();
      $options = \DB::table('etc_selects')->where('simple_plan', $simple->no)->get();

      $plan_no = $plan->no;
      $plan_title = $plan->name;
      $plan_date = $plan->at;
      $trip_kind_value = $simple->type;
      $attend_class_count = $simple->grade_class_count;
      $attend_student_count = $simple->student_count;
      $unattend_student_count = $simple->unjoin_student_count;
      
      $transpotation = [];
      $activity = [];
      $institution = [];
      $others = [];
      
      foreach($traffics as $traffic) {
        array_push($transpotation, $traffic->traffic);
      }
      // dd($transpotation);
      foreach($articles as $article) {
        array_push($institution, $article->article);
      }
      
      foreach($programs as $program) {
        array_push($activity, $program->program);
      }
      
      foreach($options as $option) {
        array_push($others, $option->option);
      }
      
      return view('plan.plan', [
        'plan_no' => $plan_no,
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
      $plan_title = $request->input('plan_title');
      $plan_date = $request->input('plan_date');
      $trip_kind_value = $request->input('trip_kind_value');
      $attend_class_count = $request->input('attend_class_count');
      $attend_student_count = $request->input('attend_student_count');
      $unattend_student_count = $request->input('unattend_student_count');
      $transpotation = $request->input('transpotation');
      $activity = $request->input('activity');
      $institution = $request->input('institution');
      $others = $request->input('others');
      $userNo = $request->input('user_no');

      $dates = explode("-", $plan_date);

      \DB::table('field_learning_plans')
            ->where('no', $id)
            ->update([
              'name'=>$plan_title,
              'at' => \Carbon\Carbon::createFromDate($dates[0], $dates[1], $dates[2], 'Asia/Seoul'),
              ]);
              
      \DB::table('simple_plans')
            ->where('plan', $id)
            ->update([
              'type' => $trip_kind_value,
              'grade_class_count' => $attend_class_count,
              'student_count' => $attend_student_count,
              'unjoin_student_count' => $unattend_student_count,
              ]);
              
      $simple = \DB::table('simple_plans')->where('plan', $id)->first();
      
      \DB::table('traffics')->where('simple_plan', $simple->no)->delete();
      \DB::table('inst_auth')->where('simple_plan', $simple->no)->delete();
      \DB::table('field_learning_programs')->where('simple_plan', $simple->no)->delete();
      \DB::table('etc_selects')->where('simple_plan', $simple->no)->delete();

      for ($i=0; $i<count($transpotation); $i++) {
        \DB::table('traffics')->insert([
              'simple_plan' => $simple->no,
              'traffic' => $transpotation[$i],
            ]);
      }
      
      for ($i=0; $i<count($institution); $i++) {
        \DB::table('inst_auth')->insert([
              'simple_plan' => $simple->no,
              'article' => $institution[$i],
            ]);
      }
      
      for ($i=0; $i<count($activity); $i++) {
        \DB::table('field_learning_programs')->insert([
              'simple_plan' => $simple->no,
              'program' => $activity[$i],
            ]);
      }
      
      for ($i=0; $i<count($others); $i++) {
        \DB::table('etc_selects')->insert([
              'simple_plan' => $simple->no,
              'option' => $others[$i],
            ]);
      }

      // return view('plan.sheet'); // id 보내야됨
      return redirect()->route('plan.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // field_learning_plans simple_plans traffics inst_auth field_learning_programs etc_selects
      // soft_delete
      
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

    public function map()
    {
        return view('plan.plan_map'); // teacher_index
    }
}
