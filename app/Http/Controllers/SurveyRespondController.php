<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class SurveyRespondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 설문조사에 응답한 결과를 저장하고 전체 결과와 함께 결과 페이지 반환
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $survey)
    {
      $userNo = $request->input('user_id');
      $responds = $request->input('resp');

      \DB::table('survey_responds')->insert([
        'respondent' => $userNo,
        'survey' => $survey,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      $respondCount = count($responds);
      for($i=0; $i<$respondCount; $i++) {
        // 응답 자체는 어떻게 구성되어 있지?

      }

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

      return view('survey.survey_result', [
        'resp' => '',
        'survey_title' => $newSurveyName,
        'q_title' => $newSurvey, // 설문지
        'survey_id' => $surveyId,
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
