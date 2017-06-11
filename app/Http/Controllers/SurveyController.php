<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{



    public function index()
    {


    }


    public function create()
    {

        return view('survey.write');
    }


    public function store(Request $request)
    {
        $planId = $request->input('plan_id');


        $survey_id = DB::table('surveies')->value('no');



        return view('survey.survey_list')->with('survey_id', '')
            ->with('survey_title', '')
            ->with('survey_writedate', '')
            ->with('plan_id', $planId);

        return redirect('survey.list');
    }


    public function show($survey)
    {

        return view('survey.survey_view')->with('q_title', '')
                                         ->with('survey_title', '')
                                         ->with('survey_id', '');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function result()
    {








        return view('survey.survey_result')->with('q_title', '')
                                           ->with('resp', '');
    }

    public function showList(Request $request)
    {

        $planId = $request->input('plan_id');


        $survey_id = DB::table('surveies')->value('no');


        $ids = [];
        $titles = [];
        $writedates = [];

        $surveies= DB::table('surveies')->get();

        foreach ($surveies as $survey) {
            array_push($ids, $survey->no);
            array_push($titles, $survey->title);
            array_push($writedates, $survey->created_at);
        }

        dd($ids);
//        dd($titles);
//        dd($writedates);


        return view('survey.survey_list')->with('survey_id', '')
                                          ->with('survey_title', '')
                                          ->with('survey_writedate', '')
                                          ->with('plan_id', $planId);


    }
}
