<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{


//survey_list.php
//url : ?/ survey_view
//
//return: {
//survey_id
//survey_title
//survey_writedate
//}
//
//
//survey_write.php
//url : ?/ survey_view
//
//POST : {
//    q_title[ ] [ ]  		= “(String)”,
//q_title[ ] [ ] [ ]		= “(String)”,
//survey_title 		= “(String)”
//}
//
//survey_view.php
//url : ?/result.php
//결과는 선생님만 볼수 있는지 아니면 모두가 볼 수있는지 에따라 필요한 페이지가 생김
//
//POST : {
//    answer[]	= “(String)”,
//}
//
//return: {
//    $q_title[ ] [ ] [ ]
//$survey_title
//$survey_id
//}
//
//survey_result
//
//return: {
//    $q_title[][]
//answer[]
//}




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('survey.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.write');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('survey.view');
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

    public function result()
    {
        return view('survey.result');
    }
}
