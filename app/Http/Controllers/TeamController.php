<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function custom_index($plan_no){
      //$plan_no로 검색해서그룹 검색해서 있는지 비교
      
      //팀의 값이 있을경우
      // if(0){
      //   
        return view('team.team_list',[
          'plan_no' => $plan_no,
        ]);
      // //팀의 값이 있을 경우
      // }else{
        
        // return view('plan.plan_list');          
      // }
    }
}
