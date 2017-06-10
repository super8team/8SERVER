<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{



    public function index()
    {

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

    }


    public function create()
    {
        return view('survey.write');
    }


    public function store(Request $request)
    {
        $planId = $request->input('plan_id');


        $survey_id = DB::table('surveies')->value('no');

        dd($survey_id);

        return view('survey.survey_list')->with('survey_id', '')
            ->with('survey_title', '')
            ->with('survey_writedate', '')
            ->with('plan_id', $planId);
    }


    public function show($survey)
    {
        return view('survey.view');
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
        return view('survey.result');
    }
}
