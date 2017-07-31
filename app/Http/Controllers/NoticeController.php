<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//디비쓸라면 써야함
use Illuminate\Support\Facades\DB;

// 현제시간불러오는데 도움을 주는 함수 carbon 쓸려면 써야함
use Carbon\Carbon;

//페이지네이션 사용할래
use Illuminate\Pagination\LengthAwarePaginator;

//사용자 정보를 얻기 위해 사용함
use Illuminate\Support\Facades\Auth;



class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function custom_index($plan_no){
      //넘길애들 선언
      $notice_no    = array();
      $notice_title = array();
      $notice_date  = array();
      
      //notice list 가져오기 15개로 페이징
      $notices = DB::table('notices')->where('plan',$plan_no)->orderBy('created_at', 'desc')->paginate(15);
      // $notices = DB::table('notices')->orderBy('created_at', 'desc')->paginate(15);
      // 뿌려주기 준비
      foreach($notices as $notice){
        array_push($notice_no , $notice->no);
        array_push($notice_title, $notice->title);
        array_push($notice_date , $notice->created_at);
      }
      // 뿌리기
        return view('notice.notice_list',[
          'notices'      => $notices,
          'notice_no'    => $notice_no,
          'notice_title' => $notice_title,
          'notice_date'  => $notice_date,
          'plan_no'      => $plan_no,
        ]);
    }
    //가정통신문 리스트
    // public function index($plan_no)
    // public function index()
    // {
    //   //넘길애들 선언
    //   $notice_no    = array();
    //   $notice_title = array();
    //   $notice_date  = array();
    //   
    //   //notice list 가져오기 15개로 페이징
    //   // $notices = DB::table('notices')->where('plan',$plan_no)->orderBy('created_at', 'desc')->paginate(15);
    //   $notices = DB::table('notices')->orderBy('created_at', 'desc')->paginate(15);
    //   // 뿌려주기 준비
    //   foreach($notices as $notice){
    //     array_push($notice_no , $notice->no);
    //     array_push($notice_title, $notice->title);
    //     array_push($notice_date , $notice->created_at);
    //   }
    //   // 뿌리기
    //     return view('notice.notice_list',[
    //       'notices' => $notices,
    //       'notice_no' => $notice_no,
    //       'notice_title' => $notice_title,
    //       'notice_date' => $notice_date,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('notice.notice_write');
    // }
    public function custom_create($plan_no)
    {
        return view('notice.notice_write',[
          'plan_no' => $plan_no,
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
       //넘어온 정보를 가저오기
       $notice_title    = $request->input('notice_title');
       $notice_simekiri = $request->input('simekiri');
       $notice_text     = $request->input('notice_text');
       $plan_no         = $request->input('plan_no');
       //유저의 id 고유번호를 받아온다
       $userno = Auth::id();
       
       //디비에 삽입
       $id = DB::table('notices')->insertGetId([
       'plan'  =>12,
       'title' => $notice_title,
       'substance' => $notice_text,
       'writer' => $userno,
       'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
       'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
     ]);  
     return view('notice.notice_view',[
       'notice_title' => $notice_title,
       'notice_text'  => $notice_text,
       'plan_no'      => $plan_no,
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
      // first() 하나만 뽑기
      $notice = \DB::table('notices')->where('no', $id)->first();
      //get() 다 가져오기
      // $notices = \DB::table('notices')->where('plan', $id)->get();
      // dd($notice);
      return view('notice.notice_view',[
        'plan_no'      => $notice->plan,
        'notice_title' => $notice->title,
        'notice_text'  => $notice->substance,
      ]);

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
