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

Route::get('/test22',function(){
  return view('plan.test22');
});

Route::get('/get',function(){
  return view('plan.get-event_dnweb');
});

//웹 로그인
Auth::routes();

//앱 로그인
Route::post('app/login', 'AppLoginController@login');

Route::post('app/getPlan', 'AppRequestController@getPlan');

Route::post('app/getStudentList', 'AppRequestController@getStudentList');



// ******************** 플랜 리스트 *********************
// 간단 계획
Route::get('plan', 'PlanController@plan')->name('plan');

// 계획 수정
Route::get('plan/modify', 'PlanController@Modify')->name('plan.modify');

// 교사 계획 리스트
Route::get('plan/teacher', 'PlanController@teacherPlanList')->name('plan.teacher');

// 학생, 학부모 계획 리스트
Route::get('plan/studentParents', 'PlanController@studentParentPlanList')->name('plan.studentParents');

// 서류
Route::get('plan/sheet', 'PlanController@sheet')->name('plan.sheet');

// 계획 맵
Route::get('plan/map', 'PlanController@map')->name('plan.map');



// ******************** 가정 통신문 *********************
// 가정통신문 리스트, 작성, 열람
Route::resource('notice', 'NoticeController');



// ******************** 설문조사 *********************
// Route::get('survey/result', 'SurveyController@result');

// 설문조사 리스트, 작성, 열람
Route::resource('survey', 'SurveyController');
// index(전체리스트) create(설문작성) store(설문저장) show(설문보기-교사가결과보기)

Route::resource('survey.respond', 'SurveyRespondController');
// index(설문보기-학생참여) store(응답저장) show(자기응답보기)

Route::get('survey/{packageId}', 'SurveyController@result')->name('survey.result');


// ******************** 콘텐츠 *********************
// 콘텐츠 메인
Route::get('contents{no}', 'ContentsController@index')->name('contents');

// 콘텐츠 패키지 공유 저장
Route::post('contents/block', 'ContentsController@block')->name('contents.block');

// 창작마당
Route::post('contents/share', 'ContentsController@share')->name('contents.share');

// 콘텐츠 상세보기
Route::get('contents/shareDetail{packageId}', 'ContentsController@shareDetail')->name('contents.shareDetail');

// 콘텐츠 공유하기
Route::post('contents/shareShare', 'ContentsController@shareShare')->name('contents.shareShare');

// 콘텐츠 다운로드

Route::post('contents/shareDownload', 'ContentsController@shareDownload')->name('contents.shareDownload');

Route::get('contents/shareDownload{choiceContentsName}/{choiceContentsId}', 'ContentsController@shareDownload')->name('contents.shareDownload');


// *******************  앱 히스토리 *********************

// Route::resource('app/history', 'AppHistoryController');

Route::post('app/writeHistroyContent', 'HistroyController@histroyStore');


// 히스토리 보기
Route::post('app/getHistoryContent', 'HistroyController@getHistoryContent');


// *******************  앱 체크리스트 *********************

Route::post('app/getCheckList', 'ChecklistController@getCheckList')->name('getChecklist');
