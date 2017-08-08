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
            'current_plan_no' => $currentPlanId,
            'current_plan_title' => $currentPlanTitle,
            'current_plan_date' => $currentPlanDate,
            'list_numb.er'    => $list_number,
            'count' => $count
        ]);

    }

    public function result($count)
    {



        $responds = \DB::table('checklist_responds')->where('checklist', $count)->get();

        $checklist_responds = [];






//        $checklists =  \DB::table('plan_checklists')->where('checklist', $count)->get();
//
//        $checklist_bigsort = [];
//        $checklist_smallsort = [];
//        $checklist_substance = [];
//
//        foreach ($checklists as $checklist) {
//
//        array_push($checklist_bigsort, $checklist->bigsort);
//        array_push($checklist_smallsort, $checklist->smallsort);
//        array_push($checklist_substance, $checklist->substance);
//
//        }
//
//
//
//        return view('staff.result')->with('', $checklist_bigsort)
//                                    ->with('', $checklist_smallsort)
//                                   ->with('', $checklist_substance);

        return view('staff.result');

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

    public function storage(Request $request) {
        $storage_list_array = $request->storage_list;
        $plan = $request->plan_num;

        for($i = 0 ; $i < count($storage_list_array); $i++){
           $user_name = DB::table('users')->where('name',$storage_list_array[$i])->first();
           DB::table('committee_members')->insert([
                'member'=>'1',
                'committee'=>'1'
           ]);
        }
        return $storage_list_array[0];
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


