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

class ReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function view_evaluation($report_no){
    //디비에서 값 가져오기
    //TODO  report_no 로 검색하여 가저오기
    $reports = \DB::table('review_writes')->where('no', $report_no)->first();
    
    return view('report.evalution',[
      'plan_no'      => $reports->plan,
      'report_no'    => $reports->no,
      'report_title' => $reports->title,
      'report_text'  => $reports->substance,
    ]);
  
  }
  //TODO 
  public function evaluation(Request $request)
  { 
    $report_no     = $request->input('report_no');    
    $report_score  = $request->input('report_score');
    
    DB::table('review_evaluations')->where('review',$report_no)->insert([
    'score' => $report_score,
  ]);
    //TODO 저거 위 디비에서 가저온 no 의 플랜에 접근하여 플랜넘버를 가져오삼
    return view('report.report_list',$plan_no);
  }
  
  public function custom_index($plan_no)
    {
      //넘길애들 선언
      $report_no    = array();
      $report_title = array();
      $report_score = array();
      // $report_date  = array();
      
      //report list 가져오기 15개로 페이징
      // $reports = DB::table('review_writes')->where('plan',$plan_no)->orderBy('created_at', 'desc')->paginate(15);
      $reports = DB::table('review_writes')->orderBy('created_at', 'desc')->paginate(15);
      // 뿌려주기 준비
      foreach($reports as $report){
        array_push($report_no , $report->no);
        array_push($report_title, $report->title);
        //여 기 에러날꺼 같음
        if($report->score != null){
          array_push($report_score, $report->score);
        }  
        // array_push($report_date , $report->created_at);
      }
      // 뿌리기 
      //reportes 는 페이지 네이션을 해야하기 땜에 지우지마셍
      return view('report.list', [
        'plan_no'      => $plan_no,
        'reports'      => $reports,
        'report_no'    => $report_no,
        'report_title' => $report_title,
        'report_score' => $report_score,
        // 'report_date'  => $report_date,
      ]); 
  }
  
  // public function index()
  // {
  //   dd('fuck');
  // }
  
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  // public function create()
  // {
  //     return view('report.write');
  // }
                  
  public function custom_create($plan_no)
  {
      return view('report.write',[
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
    $report_title    = $request->input('report_title');
    $report_text     = $request->input('report_text');
    $plan_no         = $request->input('plan_no');
    //유저의 id 고유번호를 받아온다
    $userno = Auth::id();
    
    //TODO디비에 삽입
    $reviews = DB::table('review_writes')->insert([
    'title'     => $report_title,
    'writer'    => $userno,
    'plan'      => $plan_no,
    'substance' => $report_text,
    // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    // 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
  ]);
    
  return view('report.view',[
    'report_title' => $report_title,
    'report_text'  => $report_text,
    'plan_no'      => $plan_no,
  ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($report_no)
  {
    //디비에서 값 가져오기
    //TODO report_no 가 필요할듯함
    $reports = \DB::table('review_evaluations')->where('no', $report_no)->first();
    
    return view('report.view',[
      'report_no'    => $reports->no,
      'plan_no'      => $report->plan,
      'report_title' => $report->title,
      'report_text'  => $report->substance,
      'report_score' => $report_score,
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
