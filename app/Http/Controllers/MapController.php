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
        $planNo = $reuqest->plan_id;
        $details = $request->saveEvent; // 이름
        $chngedTime = [];

        for($i=0; $i<count($details); $i++) {
            $replacedTime = str_replace("T", " ", $details[$i]['start']);
            $replacedTime = str_split($replacedTime, 19);
            $start = $replacedTime[0];
            $replacedTime = str_replace("T", " ", $details[$i]['end']);
            $replacedTime = str_split($replacedTime, 19);
            $end = $replacedTime[0];

            $re = [];
            $re[] = \DB::table('detail_plans')->insertGetId([
                'place' => $details[$i]['title'],
                'plan' => $planNo,
                'start_time' => \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $start),
                'end_time' =>  \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $end),
            ]);
        }

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
        return view('plan.plan_map', [
            'plan_date' => \Carbon\Carbon::now(),
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

        $startTime = str_replace(" ", "T", $detail->start_time);
        $startTime .= "-05:00";

        $endTime = str_replace(" ", "T", $detail->end_time);
        $endTime .= "-05:00";


        $replacedTime = str_replace("T", " ", $details[$i]['start']);
            $replacedTime = str_split($replacedTime, 19);
            $start = $replacedTime[0];

        foreach($details as $detail) {

            $addDetail = [];
            $addDetail['title'] = \DB::table('places')->where('no', $detail->place)->value('name');
            $addDetail['start'] = $startTime;
            $addDetail['end']   = $endTime;
            array_push($result, $addDetail);
        }

        return json_encode($result);

    }
}
