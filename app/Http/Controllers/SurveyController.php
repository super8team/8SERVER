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
      foreach ($surveies as $survey) {
        array_push($surveyNoArr, $survey->no);
        array_push($surveyTitleArr, $survey->title);
        array_push($surveyDateArr, $survey->created_at);
      }

        return view('survey.survey_list', [
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
        return view('survey.survey_write');
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

      $surveyId = DB::table('surveies')->insertGetId([
        'name' => $survey_title,
        'writer' => $userno,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      for ($i=0; $i<$qCount; $i++) {
        $articleId = DB::table('survey_articles')->insertGetId([
           'survey' => $surveyId,
           'article' => $newSurvey[$i][1],
           'type' => $newSurvey[$i][0],
        ]);

        if ($newSurvey[$i][0] == 'obj') {
          $answerCount = count($newSurvey[$i][2]);
          for($j=0; $j<$answerCount; $j++) {
            $surveyId = DB::table('survey_answers')->insertGetId([
               'survey_article' => $articleId,
               'substance' => $newSurvey[$i][2][$j],
            ]);
          }
        }
      }

        return view('survey.survey_view', [
          'survey_title' => $newSurveyName,
          'q_title' => $newSurvey, // 설문지
          'survey_id' => $surveyId,
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
        $qTitle = [];
        $survey = \DB::table('surveies')->where('no', $id)->first();
        $articles = \DB::table('survey_articles')->where('survey', $survey->no)->get();
        $articleCount = count($articles);

        for ($i=0; $i<$articleCount; $i++) {
          $qTitle[$i][0] = $articles[$i]->type;
          $qTitle[$i][1] = $articles[$i]->article;
          if($qTitle[$i][0] == "obj") {
            $answers = \DB::table('survey_answers')->where('survey_article', $articles[$i]->no)->get();
            $answerCount = count($answers);
            for($j=0; $j<$answerCount; $j++) {
              $qTitle[$i][2][$j] = $answers[$j]->substance;
            }
          }
        }

        // dd($qTitle);
        return view('survey.survey_view', [
          'survey_title' => $survey->title,
          'q_title' => $qTitle, // 설문지
          'survey_id' => $survey->no,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($survey)
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
    public function update(Request $request, $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($survey)
    {
        //
    }
}
