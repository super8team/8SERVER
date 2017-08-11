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

      //넘김 팀을
      $student_no     = array();
      $student_class  = array();
      $student_name   = array();
      $student_classNo = array();

      //넘길 정보
      //plan_no로 검색해서 그룹 정보를 받아옴,학생이름,반,
      $groups = \DB::table('groups')->where('plan', $plan_no)->get();
      foreach ($groups as $group) {
        $user = \DB::table('users')->where('no', $group->joiner)->first();
        if($user->type == "teacher") continue;
        $student_no[] = $user->no;
        $student_name[] = $user->name;

        $std = \DB::table('students')->where('student', $user->no)->first();
        $grd_cls = \DB::table('grade_classes')->where('no', $std->grade_class)->first();
        $student_class[] = $grd_cls->grade."학년 ".$grd_cls->class."반";
        $grade_class_no[] = $grd_cls->no;
      }


        return view('group.group_list',[
          'plan_no'       => $plan_no,
          'student_no'     => $student_no,
          'student_class'  => $student_class,
          'student_name'   => $student_name,
          'grade_class_no' => $grade_class_no,
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
    public function custom_create(Request $request,$plan_no)
    {
      //넘길 정보
      $grade_count =3; //교사가 속해있는 학교의 학년 수
      $class_count =5;  //학년중 반의 갯수가 가장 많은 반의 수... ->학년 별로 반개수가 다른것은 추후 수정하겠음

      $filter = $request->input('grade_class');
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
      //     $result[] = array($user->no,$user->name,$user->class);
      //   }
      // }


      $student_no    = array();
      $student_class = array();
      $student_name  = array();
      $grade_class_no= array();

      //필터링 정보가 들어왔을떄
      if($filter){
        for ($i=0; $i < count($filter); $i++) {
          //각 반별로 뽑기
          //학년이 grade_filter 이고 반이 $class_filter[$i]인 사람의 정보를 가져온다
          $students = \DB::table('students')->where('grade_class',$filter[$i])->get();
          $grade_class = \DB::table('grade_classes')->where('no', $filter[$i])->first();
          foreach($students as $student){
            // $user = \DB::table('users')->where('grade',$grade_filter)->first();
            $user = \DB::table('users')->where('no', $student->student)->first();
            array_push($student_no , $user->no);
            array_push($grade_class_no, $grade_class->no);
            array_push($student_class, $grade_class->grade."학년 ".$grade_class->class." 반");
            array_push($student_name , $user->name);
          }

        }
          // $result[] = array($user->no,$user->name,$user->class);
      //안들어왔을때
      }else{

      }
    // 1 modify 페이지를 리다이렉트함
    // 2 리다이렉트해서 사람 선택한 후에 store 함
    // 3 리스트에서 그룹 정보를 볼수 있게됨
      return view('group.group_modify',[
        'plan_no'       => $plan_no,
        'student_no'     => $student_no,
        'student_class'  => $student_class,
        'student_name'   => $student_name,
        'grade_class_no' => $grade_class_no,
        'grade_count'    => $grade_count,
        'class_count'    => $class_count,
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
        $plan_no = $request->input('plan_no');

        //학생 고유번호를 배열로 받아옴 ->이거로 그룹 만들어줘 ㅎㅎ
        $group   = $request->input('group');

        //학생 고유번호로 배열을 만들어서 팀을 만듬

        //팀을 만들고 밑에 라우팅으로 넘김


        return view('group_list',[
          'plan_no' => $plan_no,
          'student_no'     => $student_no,
          'student_class'  => $student_class,
          'student_name'   => $student_name,
        ]);
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
