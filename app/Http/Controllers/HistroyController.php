<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HistroyController extends Controller
{

      // url: writeHistoryContent
      // post: userId,placeNum,content,weather
      // 히스토리에 저장할 글과 날씨
    public function histroyStore(Request $request) {
      $placeNo  = $request->input('placeNum');
      $content  = $request->input('content');
      $weather  = $request->input('weather');

      $user     = $request->input('userId');
      $user     = "Illum"; // teacher 더미
      $user     = DB::table('users')->where('id', $user)->first();

      $plan     = DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();
      $historyNo  = DB::table('histories')->where('plan', $plan->no)->value('no');

      if ($historyNo == '') {
        $historyNo = DB::table('histroies')->insertGetId([
          'plan'       => $plan->no,
          'register'   => $user->no,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      }

      DB::table('history_substance')->insert([
        'history' => $historyNo,
        'place'   => $placeNo,
        'substance' => $content,
        'weather' => $weather,
      ]);
    }


    // url: getHistoryContent
    // post: userId,placeNum
    // return : place{
    //              content1{ content : 내용, weather : sunny }
    //              content2{ ........
    // 히스토리에 저장한 글과 날씨

    function getHistoryContent (Request $request) {
      $user     = $request->input('userId');
      // $user     = "Illum";
      $user     = DB::table('users')->where('id', $user)->first();
      $placeNo  = $request->input('placeNum');
      // $placeNo  = 7;
      $plan     = DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();

      $history  = DB::table('histories')->where('plan', $plan->no)->first();
      $historySubstances = DB::table('history_substances')->where('history', $history->no)->where('place', $placeNo)->get();

      $result = ["place" => []];
      $historyIndex = 1;
      foreach ($historySubstances as $history) {
        $result["place"]["content".$historyIndex] = ["content" => $history->substance, "weather" => $history->wheather];
        // ["content" => $history->substance, "weather" => $history->weather]];
        $historyIndex++;
      }

      // dd($result);
      return json_encode($result);
    }
}
