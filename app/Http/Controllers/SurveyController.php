<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

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

      $surveies = DB::table('surveies')->orderBy('created_at', 'desc')->paginate(15);
      // $surveies = DB::table('surveies')->paginate(15);
      // $surveies = DB::table('surveies')->get();
      foreach ($surveies as $survey) {
        array_push($surveyNoArr, $survey->no);
        array_push($surveyTitleArr, $survey->title);
        array_push($surveyDateArr, $survey->created_at);
      }
      // $surveyNoArr = array_reverse($surveyNoArr);
      // $surveyTitleArr = array_reverse($surveyTitleArr);
      // $surveyDateArr = array_reverse($surveyDateArr);

        return view('survey.survey_list', [
          'surveies'  => $surveies,
          'survey_no' => $surveyNoArr,
          'survey_title' => $surveyTitleArr,
          'survey_date' => $surveyDateArr,
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
      // 입력한 값을 가져와서

     $newSurveyName = $request->input('survey_title');
     $newSurvey = $request->input('q_title');
    //  dd($newSurveyName,$newSurvey);
     $userno = Auth::id();
     $qCount = count($newSurvey);
// dd($newSurvey);
     // DB에 저장 후
     $surveyId = DB::table('surveies')->insertGetId([
       'title' => $newSurveyName,
       'writer' => $userno,
       'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
       'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
     ]);
     for ($i=0; $i<$qCount; $i++) {
      //  var_dump ($surveyId);
       $articleId = DB::table('survey_articles')->insertGetId([
          'survey' => $surveyId,
          'article' => $newSurvey[$i][1],
          'type' => $newSurvey[$i][0],
       ]);

      //  dd($surveyId);
       if ($newSurvey[$i][0] == 'obj') {
         $answerCount = count($newSurvey[$i][2]);
         for($j=0; $j<$answerCount; $j++) {
           DB::table('survey_answers')->insert([
              'survey_article' => $articleId,
              'substance' => $newSurvey[$i][2][$j],
           ]);
         }
       }

     }
    //  dd($newSurvey);
     // 리스트로 넘어가기 방법
     // return redirect()->route('plan.teacher');
     return view('survey.survey_view', [
       'survey_title' => $newSurveyName,
       'q_title' => $newSurvey, // 설문지
       'survey_no' => $surveyId,
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

        dd($qTitle);
        return view('survey.survey_view', [
          'survey_title' => $survey->title,
          'q_title' => $qTitle, // 설문지
          'survey_no' => $survey->no,
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

    public function total($survey) {
      $qTitle = [];
      $survey = \DB::table('surveies')->where('no', $survey)->first();
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
            $qTitle[$i][3][$j] = \DB::table('survey_respond_contents')->where('respond', 'like', $j)->count();
          }
        } elseif($qTitle[$i][0] == "ox") {
          $qTitle[$i][2] = \DB::table('survey_respond_contents')->where('respond', "true")->count();
          $qTitle[$i][3] = \DB::table('survey_respond_contents')->where('respond', "false")->count();
        } else {
          $subs = \DB::table('survey_respond_contents')->where('survey_article', $articles[$i]->no)->get();
          foreach ($subs as $sub) {
            $qTitle[$i][2][] = $sub->respond;
          }
        }
      }

      return view('survey.survey_result', [
        'q_title' => $qTitle,
      ]);
    }
}
