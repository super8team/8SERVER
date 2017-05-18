<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test2', function () {
    return view('test2');
});

Route::get('/test3', function () {
    return view('test3');
});
// ********************  홈페이지 *********************
Route::get('/home', function () {
  // 배열로 홈페이지 값 전달하기
    return view('main');
});

// ********************  플랜 리스트 *********************

//계획 리스트
Route::get('/planlist', function () {
    return view('plan.plan_list');
});

// ++++++++ 학부모 학생 계획 리스트++++++++
//학생, 학부모 계획 리스트
Route::get('/planlist2', function () {
    return view('plan.plan_list2');
});

// ********************  플랜  *********************

//계획 작성
Route::get('/plan', function () {
    return view('plan.plan');
});

//계획 수정
Route::get('/planmodify', function () {
    return view('plan.plan_modify');
});

//서류 작성
Route::get('/sheet', function () {
    return view('plan.plan_sheet');
});

//플랜 맵
Route::get('/planmap', function () {
    return view('plan.plan_map');
});


// ********************  가정 통신문 *********************
//가정 통신문 리스트
Route::get('/noticelist', function () {
    return view('notice.notice_list');
});

//가정 통신문 작성
Route::get('/noticewrite', function () {
    return view('notice.notice_write');
});

//가정 통신문 뷰
Route::get('/noticeview', function () {
    return view('notice.notice_view');
});
// ********************  설문조사 *********************
//설문조사 리스트
Route::get('/surveylist', function () {
    return view('survey.survey_list');
});

//설문조사 작성
Route::get('/surveywrite', function () {
    return view('survey.survey_write');
});

//설문조사 뷰
Route::get('/surveyview', function () {
    return view('survey.survey_view');
});

//설문조사 결과
Route::get('/surveyresult', function () {
    return view('survey.survey_result');
});
