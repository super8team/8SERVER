<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.plan_map'); // teacher_index
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planNo = $request->plan_no;
        $details = $request->saveEvent; // 이름
        $chngedTime = [];

        $detailPlans = \DB::table('detail_plans')->where('plan', $planNo)->get();
        foreach ($detailPlans as $detail) {
            \DB::table('detail_plan_shares')->where('detail_plan', $detail->no)->delete();
            \DB::table('detail_plans')->where('no', $detail->no)->delete();
        }
<<<<<<< HEAD

=======
>>>>>>> ffaf0d9b8a4f0df856e18371089122d5b080063f
        
        for($i=0; $i<count($details); $i++) {
            $replacedTime = str_replace("T", " ", $details[$i]['start']);
            $replacedTime = str_split($replacedTime, 19);
            $start = $replacedTime[0];
            $replacedTime = str_replace("T", " ", $details[$i]['end']);
            $replacedTime = str_split($replacedTime, 19);
            $end = $replacedTime[0];
<<<<<<< HEAD

=======
            
            // $start = $details[$i]['start'];
            // $end   = $details[$i]['end'];
    
>>>>>>> ffaf0d9b8a4f0df856e18371089122d5b080063f
            // $start = explode(",", $details[$i]['start']);
            // $end = explode(",", $details[$i]['end']);
            $placeNo = \DB::table('places')->where('name', 'like', "%".$details[$i]['title']."%")->value('no');
            // $placeNo = 5; // 더미
            // dd($start, $end);
            $re = [];
            // dd($start, $end);
            $re[] = \DB::table('detail_plans')->insertGetId([
                'place' => $placeNo,
                'plan' => $planNo,
                // if 2015->2017
                'start_time' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $start, 'Asia/Seoul'),
                'end_time' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $end, 'Asia/Seoul'),
            ]);
        }
        return redirect()->route('plan.teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $teacher = \DB::table('users')->where('no', $plan->teacher)->first();

        $traffics = \DB::table('traffics')->where('simple_plan', $simple->no)->get();
        $articles = \DB::table('inst_auth')->where('simple_plan', $simple->no)->get();
        $programs = \DB::table('field_learning_programs')->where('simple_plan', $simple->no)->get();
        $options = \DB::table('etc_selects')->where('simple_plan', $simple->no)->get();

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

        foreach($articles as $article) {
          array_push($institution, $article->article);
        }

        foreach($programs as $program) {
          array_push($activity, $program->program);
        }

        foreach($options as $option) {
          array_push($others, $option->option);
        }

        return view('plan.plan_map', [
            'teacher_name' => $teacher->name,
            'plan_no' => $id,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * show detail-plan for app request.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlanDetial(Request $request) {
      $user = $request->input('userId');
      $user = \DB::table('users')->where('id', $user)->first();

      $plan = \DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();
      $details = \DB::table('detail_plans')->where('plan', $plan->no)->get();

      $result = [];

      $detailIndex = 1;
      foreach($details as $detail) {
        $result["plan".$detailIndex] = ["place" => \DB::table('places')->where('no', $detail->place)->value('name'),
                                        "at"    => $detail->start_time];
        $detailIndex++;
      }
      // dd($result);
      return json_encode($result);
    }

    public function getTimeTable(Request $request)
    {
        $plan = $request->input('plan_no');
        $details = \DB::table('detail_plans')->where('plan', $plan)->get();

        $result = [];
        $detailIndex = 0;


        foreach($details as $detail) {
            $startTime = str_replace(" ", "T", $detail->start_time);
            $startTime .= "-05:00";

            $endTime = str_replace(" ", "T", $detail->end_time);
            $endTime .= "-05:00";

            $addDetail = [];
            $addDetail['title'] = \DB::table('places')->where('no', $detail->place)->value('name');
            $addDetail['start'] = $startTime;
            $addDetail['end']   = $endTime;
            array_push($result, $addDetail);
        }

        return json_encode($result);

    }

    public function getDetailShare(Request $request) {
        $niddle = $request->niddle;
        $places = \DB::table('places')->where('name', 'like', "%$niddle%")->orWhere('explain', 'like', "%$niddle%")->get();

        $result = [];

        // 검색에 해당되는 모든 장소
        foreach($places as $place) {
            // $shares = \DB::table('detail_plan_shares')->where('place', $place->no)->get();
            $details = \DB::table('detail_plans')->where('place', $place->no)->get();
            // dd($details);
            // 검색된 장소를 포함하고 있는 모든 공유게시글
            foreach ($details as $detail) {
                // $detail = \DB::table('detail_plans')->where('no', $share->detail_plan)->first();
                $shares = \DB::table('detail_plan_shares')->where('detail_plan', $detail->no)->get();// 디테일플랜을 공유한
                foreach($shares as $share) {
                    $plan = \DB::table('field_learning_plans')->where('no', $detail->plan)->first();
                    $teacher = \DB::table('users')->where('no', $plan->teacher)->first();
                    $school = \DB::table('works')->where('teacher', $teacher->no)->first();
                    if(is_object($school)) {
                      $school = \DB::table('schools')->where('no', $school->school)->first();
                      $result[] = [
                              'plan_no' => $plan->no,
                              'plan_teacher' => $teacher->name,
                              'school_name' => $school->name,
                              'plan_date' => str_split($plan->at, 10)[0],
                              'plan_tip' => $share->comment,
                          ];
                    }
                }

            }
        }

        // dd($result);
        return json_encode($result);
    }
}
