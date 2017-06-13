<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SurveyController extends Controller
{


    /**
     * Display a listing of the resource.
     * 모든 설문조사 리스트를 본다
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $surveyNoArr = array();
      $surveyTitleArr = array();
      $surveyDateArr = array();

      $surveies = DB::table('surveies')->get();
      foreach ($serveies as $survey) {
        array_push($surveyNoArr, $survey->no);
        array_push($surveyTitleArr, $survey->title);
        array_push($surveyDateArr, $survey->created_at);
      }

        return view('survey.list', [
          'survey_id' => $surveyNoArr,
          'survey_title' => $surveyTitleArr,
          'survey_write_date' => $surveyDateArr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 설문조사를 작성하는 뷰를 보여준다
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.write');
    }

    /**
     * Store a newly created resource in storage.
     * 작성된 설문조사를 저장한다
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $newSurveyName = $request->input('survey_title');
      $newSurvey = $request->input('q_title');
      $userno = $request->input('user_id');
      $qCount = count($newSurvey);

      DB::table('surveies')->insert([
        'name' => $survey_title,
        'writer' => $userno,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      // for ($i=0; $i<$qCount; $i++) {
      //   $surveyId = DB::table('survey_articles')->insertGetId([
      //      'survey' => $surveyId,
      //      'article' => $,
      //   ]);
      // }

        return view('survey_view', [
          'survey_title' => $newSurveyName,
          'q_title' => '', // 전체 설문 응답 결과
        ]);
    }

    /**
     * Display the specified resource.
     * 만들어진 설문조사를 본다
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('survey.view');
    }

    public function write(Request $request)
    {
        $q_title = $request->input('q_title');
        $survey_title = $request->input('survey_title');

        // 쿼리

        return view('survey.survey_write');
    }


    public function view(Request $request)
    {

        $resp = $request->input('resp');

        // 쿼리

        return view('survey.survey_view')->with('q_title', '')
            ->with('survey_title', '')
            ->with('survey_id', '');
    }
}
