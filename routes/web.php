<?php
use Illuminate\Http\Request;

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
    return view('main');
})->name('main');

Route::get('/test23',function(){
  return view('survey.survey_student_result');
});


// Route::get('/sheet',function(){
//   return view('plan.plan_sheet');
// });

//웹 로그인
Auth::routes();

//앱 로그인
Route::post('app/login', 'AppLoginController@login');

//
Route::post('app/getPlan', 'AppRequestController@getPlan');

Route::post('app/getStudentList', 'AppRequestController@getStudentList');



// ******************** 플랜 리스트 *********************
// 간단 계획

Route::get('plan/teacher', 'PlanController@teacher')->name('plan.teacher'); // -->index
Route::get('plan/parents', 'PlanController@parents')->name('plan.parents');
Route::get('plan/students', 'PlanController@student')->name('plan.student');
Route::get('plan/download', 'PlanController@download')->name('plan.download');
Route::resource('plan', 'PlanController');
Route::resource('map', 'MapController');

// 앱 디테일플랜
Route::post('app/getPlanDetail', 'MapController@getPlanDetial');
Route::post('json/getTimeTable', 'MapController@getTimeTable')->name('map.getTimeTable');
Route::post('json/getDetailShare', 'MapController@getDetailShare')->name('map.search');


// ******************** 설문조사 *********************
// Route::get('survey/result', 'SurveyController@result');

// 설문조사 리스트, 작성, 열람
Route::resource('survey', 'SurveyController');
// index(전체리스트) create(설문작성) store(설문저장) show(설문보기-교사가결과보기)

Route::resource('survey.respond', 'SurveyRespondController');
// index(설문보기-학생참여) store(응답저장) show(자기응답보기)


// ******************** 콘텐츠 *********************
// 콘텐츠 패키지 공유 저장
Route::post('contents/block', 'ContentsController@block')->name('contents.block');

// 창작마당
Route::get('/contents/share', 'ContentsController@share')->name('contents.share');

// 콘텐츠 상세보기
Route::get('contents/shareDetail/{packageId}', 'ContentsController@shareDetail')
      ->name('contents.shareDetail');

// 콘텐츠 공유하기
Route::get('contents/shareShare', 'ContentsController@shareShare')->name('contents.shareShare');
Route::post('contents/sharePackages','ContentsController@sharePackages')->name('contents.sharePackages');

Route::post('contents/example', 'ContentsController@example')->name('contents.example');

// 콘텐츠 다운로드
Route::post('contents/shareDownload', 'ContentsController@shareDownload')->name('contents.shareDownload');

// Route::get('contents/shareDownload/{choiceContentsName}/{choiceContentsId}', 'ContentsController@shareDownload')->name('contents.shareDownload');

//콘텐츠를 현장학습에 저장
Route::get('contents/registerToPlan','ContentsController@registerToPlan')->name('contents.registerToPlan');

//콘텐츠를 현장학습에 저장 -> DB
Route::get('contents/registerToPlanDB','ContentsController@registerToPlanDB')->name('contents.registerToPlanDB');

//패키지 선택에 따른 컨텐츠 출력하기
Route::get('contents/packages/{package_id}','ContentsController@extractContents')->name('contents.extractContents');

//콘텐츠 저장하기
Route::get('contents/storageNewContent','ContentsController@storageNewContent')->name('contents.storageNewContent');

Route::get('contents/downloadShareContent','ContentsController@downloadShareContent')->name('contents.downloadShareContent');

Route::get('contents/searchContents','ContentsController@searchContents')->name('contents.searchContents');
// 콘텐츠 메인
Route::get('contents/', 'ContentsController@index')->name('contents');

// ******************** 가정 통신문 *********************
// 가정통신문 리스트, 작성, 열람
Route::resource('notice', 'NoticeController');

// 앱 - 리스트보기

Route::post('app/noticeList', 'AppRequestController@getNoticeList')->name('app.noticelist');
Route::post('app/noticeDetail', 'AppRequestController@getNoticeDetail')->name('app.noticedetail');
Route::post('app/respondStore', 'AppRequestController@noticeRespondStore')->name('app.respondstore');
Route::post('app/respondUpdate', 'AppRequestController@noticeRespondUpdate')->name('app.responddate');


// *******************  소감문 *********************
// 소감문 목록
Route::get('report', 'ReportController@index')->name('report');

// 소감문 작성
Route::get('report/write', 'ReportController@write')->name('report.write');

// 소감문 열람
Route::get('report/view', 'ReportController@view')->name('report.view');

// 소감문 평가
Route::get('report/evaluation', 'ReportController@evaluation')->name('report.evaluation');


// *******************  위원회 *********************
// 위원회 목록
Route::get('staff', 'StaffController@index')->name('staff');

// 위원회 결과
Route::get('staff/result', 'StaffController@result')->name('staff.result');

// 위원회 멤버 추가
Route::get('staff/memberadd', 'StaffController@memberAdd')->name('staff.memberadd');


// *******************  체크리스트 *********************
// 체크리스트 목록
Route::get('checklist', 'ChecklistController@index')->name('checklist');

// 체크리스트 작성
Route::get('checklist/write', 'ChecklistController@write')->name('checklist.write');

// 체크리스트 열람
Route::get('checklist/view', 'ChecklistController@view')->name('checklist.view');


// *******************  앱 히스토리 *********************

// Route::resource('app/history', 'AppHistoryController');




Route::post('app/writeHistoryContent', 'HistoryController@historyStore');



Route::post('app/writeHistoryContent', 'HistoryController@historyStore')->name('historyStore');


// 히스토리 보기
Route::post('app/getHistoryContent', 'HistoryController@getHistoryContent')->name('getHistoryContent');


// *******************  앱 체크리스트 *********************

Route::post('app/getCheckList', 'ChecklistController@getCheckList')->name('getChecklist');

Route::post('app/upload', function (Request $request) {

});


Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[
    'as' => 'addentry', 'uses' => 'FileEntryController@add']);

