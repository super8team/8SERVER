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

Route::get('/home', function () {
  // 배열로 홈페이지 값 전달하기
    return view('main');
});

//계획 리스트
Route::get('/planlist', function () {
    return view('plan.plan_list');
});

//계획 작성
Route::get('/plan', function () {
    return view('plan.plan');
});

//서류 작성
Route::get('/sheet', function () {

    return view('plan.plan_sheet');
});

//플랜 맵
Route::get('/plan_map', function () {
    return view('plan.plan_map');
});
