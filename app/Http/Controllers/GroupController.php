<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//디비쓸라면 써야함
use Illuminate\Support\Facades\DB;

// 현제시간불러오는데 도움을 주는 함수 carbon 쓸려면 써야함
use Carbon\Carbon;

//사용자 정보를 얻기 위해 사용함
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function custom_index($plan_no)
    {
      //plan_no로 검색하여 팀을 가져옴
      $result = array();
      // $result = \DB::table('')->where('plan',$plan_no)->get();
      
      $students_count = count($result);
      // 25로 나누어서 떨어지는 수를 구함
      (int)$division = $students_count/25;
      $division = (int)$division;
      // 1이하일 경우 1로 고정
      if($division < 1){
        $division == 1;
      }else{
        $division = $division +1;
      }
      
      //테스트데이터
      // $students = array();
      // for ($i=0; $i <99; $i++) { 
      //   $students[$i][0] = 1;
      //   $students[$i][1] = '개똥';
      // }
      // 학생 정보수를 셈
      
      //넘김 팀을 
        return view('group.group_list',[
          'plan_no'       => $plan_no,
          'students'      => $result,
          'division'      => $division,
          'student_count' => $students_count,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     return view('group.group_list',[
    //       
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function custom_create($plan_no)
    {
      // $result = array();
      // //로그인 된 교사의 정보로 학교정보를 가저움 
      // // 
      //  $user_id = Auth::id();
      //  $work   = \DB::table('works')->where('teacher',$user_id)->first();
      //  $school = \DB::table('schools')->where('no',$work->school)->first(); 
      //  $grades = \DB::table('grade_classes')->where('school',$school->no)->get();
      // foreach ($grades as $grade) {
      //   //각 반별로 뽑기
      //   $students = \DB::table('students')->where('grade_class',$grade->no)->get();
      //   foreach($students as $student){
      //     $user = \DB::table('users')->where('no',$student->student)->first();
      //     $result[] = array($user->no,$user->name);
      //   }
      // }
      
      return view('group.group_modify',[
        'plan_no'       => $plan_no,
        // 'students'      => $result,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
