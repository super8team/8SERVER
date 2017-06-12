<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{

    public function index(Request $request)
    {

        $planId = $request->input('plan_id');


        $ids = [];
        $titles = [];
        $writedates = [];


        $surveies= DB::table('surveies')->get();

        foreach ($surveies as $survey) {
            array_push($ids, $survey->no);
            array_push($titles, $survey->title);
            array_push($writedates, $survey->created_at);
        }

        return view('survey.survey_list')->with('survey_id', $ids)
                                         ->with('survey_title', $titles)
                                         ->with('survey_writedate', $writedates)
                                         ->with('plan_id', $planId);

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

    // 설문조사의 응답 결과
    public function result($no)
    {

        //no
        $surveies= DB::table('surveies')->where('');




        return view('survey.survey_result')->with('q_title', '')
                                            ->with('resp', '');
    }


}