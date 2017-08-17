<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index($count)
    {

        $current_plan = \DB::table('field_learning_plans')->where('no', $count)->first();

        $currentPlanId    =  $current_plan->no;
        $currentPlanTitle =  $current_plan->name;
        $currentPlanDate  =  $current_plan->at;
        $list_number      =  $count;


        return view('staff.staff_list', [
            'current_plan_no'    => $currentPlanId,
            'current_plan_title' => $currentPlanTitle,
            'current_plan_date'  => $currentPlanDate,
            'list_number'        => $list_number,
            'count'              => $count
        ]);

    }

    public function result($count)
    {
//         계획번호로 체크리스트 정렬
        $plan_checklists = \DB::table('plan_checklists')->where('plan', $count)->get();

        $responds = [];

        foreach($plan_checklists as $plan_checklist) {
            $checklist_respond = \DB::table('checklist_responds')->where('checklist', $plan_checklist->checklist)->first();

            $responds[] = $checklist_respond->respond;

        }
//    dd($count);

        return view('staff.result')->with('count', $count)
                                    ->with('resp' ,json_encode($responds, JSON_UNESCAPED_SLASHES ));

    }

    public function memberAdd($count)
    {

        $committee_members =  \DB::table('committee_members')->where('committee', $count)->get();

        $committee_member_no = [];
        $committee_member_name = [];

        foreach ($committee_members as $committee_member) {
            $committee_member1 = \DB::table('users')->where('no', $committee_member->member)->first();
            array_push( $committee_member_no, $committee_member1->no);
            array_push( $committee_member_name, $committee_member1->name);
        }

        return view('staff.member_add')->with('committee_member_no', $committee_member_no)
                                        ->with('committee_member_name', $committee_member_name)
                                        ->with('plan_number', $count);

    }

    public function storage(Request $request)
    {
        // 받아온 값의 위원회 번호를 넣는다.
        $committee_no = $request->input('committee_number');
//        $result_no = $request->input('result_number');

        // 회원의 이름
        $list = $request->input('serial');


        \DB::table('committees')->insert([
            'plan'=>$committee_no,'leader'=>5
        ]);


        for ($i = 0; $i < count($list); $i++) {
            \DB::table('committee_members')->insert([
                'member' => $list[$i],'committee'=>$committee_no
            ]);
        }


            return redirect()->route('staff',['count'=>$committee_no]);
//              return view('staff.memberAdd')->with('committee_mebers', $committee_mebers);


    }


    public function storageList(Request $request)
    {

        $committee_no = $request->input('committee_number');

        if ($committee_no) {
            return view('staff.memberAdd');
        }
        else {
            return view();

        }
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


