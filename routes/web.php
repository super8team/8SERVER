<?php
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;

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
  // return view('._student_result');
  $ch = new CheckRole();
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
Route::get('plan/teacher', 'PlanController@teacher')->name('plan.teacher')
            ->middleware('role:teacher'); // -->index
// Route::get('plan/teacher', 'PlanController@teacher')->name('plan.teacher')->;
Route::get('plan/parents', 'PlanController@parents')->name('plan.parents')
            ->middleware('role:parents'); // -->index
Route::get('plan/students', 'PlanController@student')->name('plan.student')
            ->middleware('role:student'); // -->index

Route::get('plan/download', 'PlanController@download')->name('plan.download');
Route::resource('plan', 'PlanController');
Route::resource('map', 'MapController');

// 앱 디테일플랜
Route::post('app/getPlanList', 'AppRequestController@getPlanList');
Route::post('app/getPlanDetail', 'MapController@getPlanDetial');
Route::post('app/getBeforePlanHistory', 'AppRequestController@getBeforePlanHistory');
Route::post('json/getTimeTable', 'MapController@getTimeTable')->name('map.getTimeTable');
Route::post('json/getDetailShare', 'MapController@getDetailShare')->name('map.search');


// ******************** 설문조사 *********************
// Route::get('/result', 'Controller@result');

// 설문조사 리스트, 작성, 열람
Route::resource('survey', 'SurveyController');
Route::get('survey/{survey}/total', 'SurveyController@total')->name('survey.total.respond');
// index(전체리스트) create(설문작성) store(설문저장) show(설문보기-교사가결과보기)

Route::get('survey/respond/{id}', 'SurveyRespondController@studentResultShow')->name('survey.stdResult');
Route::resource('survey.respond', 'SurveyRespondController');
// index(설문보기-학생참여) store(응답저장) show(자기응답보기)

Route::post('app/getSurveyList', 'AppRequestController@getSurveyList');
Route::post('app/getSurveyDetail', 'AppRequestController@getSurveyDetail');
Route::post('app/surveyRespondStore', 'AppRequestController@surveyRespondStore');


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
Route::post('contents/storageNewContent','ContentsController@storageNewContent')->name('contents.storageNewContent');

Route::post('contents/modifyContent','ContentsController@modifyContent')->name('contents.modifyContent');

Route::get('contents/downloadShareContent','ContentsController@downloadShareContent')->name('contents.downloadShareContent');

Route::get('contents/searchContents','ContentsController@searchContents')->name('contents.searchContents');
// 콘텐츠 메인
Route::get('contents/', 'ContentsController@index')->name('contents');

Route::post('app/getContents', 'AppRequestController@getContents');

// ******************** 가정 통신문 *********************
// 가정통신문 리스트, 작성, 열람
Route::get('noticelist/{plan_no}', 'NoticeController@custom_index')->name('notice_list');
Route::get('noticecreate/{plan_no}', 'NoticeController@custom_create')->name('notice_create');
Route::resource('notice', 'NoticeController');

// 앱 - 리스트보기

Route::post('app/noticeList', 'AppRequestController@getNoticeList')->name('app.noticelist');
Route::post('app/noticeDetail', 'AppRequestController@getNoticeDetail')->name('app.noticedetail');
Route::post('app/respondStore', 'AppRequestController@noticeRespondStore')->name('app.respondstore');
Route::post('app/respondUpdate', 'AppRequestController@noticeRespondUpdate')->name('app.responddate');


// *******************  소감문 *********************
// 소감문 목록
Route::get('reportlist/{plan_no}', 'ReportController@custom_index')->name('report_list');
Route::get('reportcreate/{plan_no}', 'ReportController@custom_create')->name('report_create');

//소감문 평가 뷰
Route::get('reportevaluationview/{report_no}', 'ReportController@view_evaluation')->name('report_view_evaluation');

// 소감문 평가
Route::get('reportevaluation', 'ReportController@evaluation')->name('report_evaluation');

// 소감문 기타
Route::resource('report','ReportController');

// *******************  위원회 *********************
// 위원회 저장
Route::post('staff/storage', 'StaffController@storage')->name('staff.storage');

// 위원회 멤버 추가
Route::get('staff/memberAdd/{count}', 'StaffController@memberAdd')->name('staff.memberAdd');

// 위원회 결과
Route::get('staff/result/{count}', 'StaffController@result')->name('staff.result');

// 위원회 목록
Route::get('staff/{count}', 'StaffController@index')->name('staff');






// 위원회 멤버 검색
Route::post('staff/memberSearch', 'StaffController@memberSearch')->name('staff.search');

Route::post('json/test', 'StaffController@ajax')->name('ajax');

// *******************  체크리스트 *********************
// 체크리스트 목록
Route::get('checklist', 'ChecklistController@index')->name('checklist');

// 체크리스트 작성
Route::get('checklist/write', 'ChecklistController@write')->name('checklist.write');

// 체크리스트 열람
Route::get('checklist/view', 'ChecklistController@view')->name('checklist.view');

Route::post('app/setCheckList', 'AppRequestController@setChecklist');


// *******************  앱 히스토리 *********************

// Route::resource('app/history', 'AppHistoryController');

Route::post('app/writeHistoryContent', 'HistoryController@historyStore');

// Route::post('app/writeHistoryContent', 'HistoryController@historyStore')->name('historyStore');

// 히스토리 보기
Route::post('app/getHistoryContent', 'HistoryController@getHistoryContent')->name('getHistoryContent');


// *******************  앱 체크리스트 *********************

Route::post('app/getCheckList', 'AppRequestController@getCheckList')->name('getChecklist');

Route::post('app/upload', function (Request $request) {

});

// Route::get('fileentry', 'FileEntryController@index');
// Route::get('fileentry/get/{filename}', [
//     'as' => 'getentry', 'uses' => 'FileEntryController@get']);
// Route::post('fileentry/add',[
//     'as' => 'addentry', 'uses' => 'FileEntryController@add']);


// *******************  앱 로그  *********************
Route::post('app/setLog', 'AppRequestController@logStore');


Route::post('app/getLog', 'AppRequestController@logView');




// *******************  워드 파일 다운로드  *********************
Route :: get ('word/{no}/{plan_number}', 'FieldLearningPlanDocumentController@generateDocx')->name('word');;


Route::post('json/test', 'StaffController@ajax')->name('ajax');


Route::get('/test23',function(){
    return view('test.ajax');
});


// ******************** 그룹  *********************
// 참여자 설정
Route::get('grouplist/{plan_no}' , 'GroupController@custom_index')->name('group_list');
Route::get('groupcreate/{plan_no}' , 'GroupController@custom_create')->name('group_create');
Route::resource('group', 'GroupController');

// ******************** 팀  *********************
// 팀 짜기 기능
Route::get('teamlist/{plan_no}', 'TeamController@custom_index')->name('team_list');
// Route::get('team', 'TeamController');
