<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index($count)
    {
        $current_plan = \DB::table('field_learning_plans')->where('no', $count)->first();


        $currentPlanId = $current_plan->no;
        $currentPlanTitle = $current_plan->name;
        $currentPlanDate = $current_plan->at;
        $list_number      = $count;


        return view('staff.staff_list', [
            'current_plan_no' => $currentPlanId,
            'current_plan_title' => $currentPlanTitle,
            'current_plan_date' => $currentPlanDate,
            'list_number'    => $list_number
        ]);

    }

    public function result()
    {
        return view('staff.result');
    }

    public function memberAdd($list_number)
    {
        $committee = \DB::table('committees')->where('no', $count)->first();

        return view('staff.member_add')->with('list_number',$list_number);
    }

    public function memberSearch()
    {

    }

    public function ajax(Request $request)
    {
//        $json = "박";
        $json = $request->input('search');
//        dd($json);
        // 값을 비교 하는 쿼리
        $searches = \DB::table('users')->where('name', 'like', "%$json%")->get();
        $result = [];
        foreach ($searches as $search) {
            $result[] = array("no" => $search->no, "id" => $search->id, "name" => $search->name);
        }

        return $result;

    }
}
