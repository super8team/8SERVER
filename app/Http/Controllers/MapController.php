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
        //
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
        return view('plan.plan_map'); 
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
        // $plan = $request->input('plan_no');
        // $details = \DB::table('detail_plans')->where('plan', $plan)->get();
        
        // $result = [];
        
        // foreach($details as $detail) {
        //     $addDetail = [];
        //     $addDetail['title'] = \DB::table('places')->where('no', $detail->place)->value('name');
        //     $addDetail['start'] = $detail->start_time;
        //     $addDetail['end']   = $detail->end_time;
        //     array_push($result, $addDetail);
        // }
        
        // return json_encode($result);
        
        $output_arrays[] = array(
            'title' => 'Meeting',
            'start' => '2017-01-12T10:30:00-05:00',
            'end' => '2017-01-12T12:30:00-05:00',
        );
        $output_arrays[] = array(
            'title' => 'Meeting',
            'start' => '2017-01-12T15:30:00-05:00',
            'end' => '2017-01-12T16:30:00-05:00',
        );
        $output_arrays[] = array(
            'title' => 'Meeting',
            'start' => '2017-01-12T19:30:00-05:00',
            'end' => '2017-01-12T23:30:00-05:00',
        );
        
        dd($output_arrays);
        return json_encode($output_arrays);
    }
}
