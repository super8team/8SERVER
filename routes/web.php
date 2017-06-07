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
    // 배열로 홈페이지 값 전달하기
    return view('main');
});


//웹 로그인
Auth::routes();

//앱 로그인
Route::post('app/login', 'AppLoginController@login');



// ******************** 플랜 리스트 *********************
// 학생 계획 리스트
Route::get('plan/studentList', 'PlanController@studentList');

// 학부모 계획 리스트
Route::get('plan/parentList', 'PlanController@parentList');

// 교사 서류 작성
Route::get('plan/sheet', 'PlanController@sheet');

// 교사 계획 맵
Route::get('plan/map', 'PlanController@map');

// 교사 계획 리스트, 작성, 수정
Route::resource('plan', 'PlanController');



// ******************** 가정 통신문 *********************
// 가정통신문 리스트, 작성, 열람
Route::resource('notice', 'NoticeController');



// ******************** 설문조사 *********************
// 설문조사 결과
Route::get('survey/result', 'SurveyController@result');

// 설문조사 리스트, 작성, 열람
Route::resource('survey', 'SurveyController');



