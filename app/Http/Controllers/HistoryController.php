<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HistoryController extends Controller
{

      // url: writeHistoryContent
      // post: userId,placeNum,content,weather
      // 히스토리에 저장할 글과 날씨
    public function historyStore(Request $request) {
      $placeNo  = $request->input('placeNum');
      $content  = $request->input('content');
      $weather  = $request->input('weather');

      $user     = $request->input('userId');
      // $user     = "Illum"; // teacher 더미
      $user     = DB::table('users')->where('id', $user)->first();

      $plan     = DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();
      $historyNo  = DB::table('histories')->where('plan', $plan->no)->value('no');

      if ($historyNo == '') {
        $historyNo = DB::table('histories')->insertGetId([
          'plan'       => $plan->no,
          'register'   => $user->no,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      }

      $substanceNo = DB::table('history_substances')->insertGetId([
        'history' => $historyNo,
        'place'   => $placeNo,
        'substance' => $content,
        'weather' => $weather,
      ]);

      $imgUri = $request->file('image')->storeAs('public/historyImgs', "$historyNo-$substanceNo.png");

      DB::table('history_imgs')->insert([
        'substance' => $substanceNo,
        'img_url' => $imgUri,
      ]);
    }


    // url: getHistoryContent
    // post: userId,placeNum
    // return : place{
    //              content1{ content : 내용, weather : sunny }
    //              content2{ ........
    // 히스토리에 저장한 글과 날씨

    public function getHistoryContent (Request $request) {
      $user     = $request->input('userId');
      // $user     = "Illum";
      $user     = DB::table('users')->where('id', $user)->first();
      $placeNo  = $request->input('placeNum');
      // $placeNo  = 7;

      switch ($user->type) {
        case 'student':
          return json_encode($this->getStudentHistoryContent($user, $placeNo));
          break;

        case 'parents':
          return json_encode($this->getParentsHistoryContent($user, $placeNo));
          break;

        case 'teacher':
          return json_encode($this->getTeacherHistoryContent($user, $placeNo));
          break;

        default:
          # code...
          break;
      }

    }

    private function getStudentHistoryContent($user, $place) {
      $plan = DB::table('groups')->where('joiner', $user->no)->first();
      $history  = DB::table('histories')->where('plan', $plan->plan)->first();
      $historySubstances = DB::table('history_substances')->where('history', $history->no)->where('place', $place)->get();

      $result = ["place" => []];
      $historyIndex = 1;
      foreach ($historySubstances as $history) {
        $result["place"]["content".$historyIndex] = ["content" => $history->substance, "weather" => $history->weather];
        $historyIndex++;
        $img = DB::table('history_imgs')->where('substance', $history->no)->first();
        $result["url"] = "http://163.44.166.91/LEARnFUN/public/storage/historyImgs/$img->img_url";
      }
      // dd($result);
      return $result;
    }


    private function getParentsHistoryContent($user, $place) {
      $user = DB::table('students')->where('parents', $user->no)->first();
      $plan = DB::table('groups')->where('joiner', $user->student)->first();
      $history  = DB::table('histories')->where('plan', $plan->plan)->first();
      $historySubstances = DB::table('history_substances')->where('history', $history->no)->where('place', $place)->get();

      $result = ["place" => []];
      $historyIndex = 1;
      foreach ($historySubstances as $history) {
        $result["place"]["content".$historyIndex] = ["content" => $history->substance, "weather" => $history->weather];
        $historyIndex++;
        $img = DB::table('history_imgs')->where('substance', $history->no)->first();
        $result["url"] = "http://163.44.166.91/LEARnFUN/storage/historyImgs/$img->img_url";
      }
      dd($result);
      return $result;
    }

    private function getTeacherHistoryContent($user, $place) {
      $plan     = DB::table('field_learning_plans')->where('teacher', $user->no)->orderBy('no', 'desc')->first();
      $history  = DB::table('histories')->where('plan', $plan->no)->first();
      $historySubstances = DB::table('history_substances')->where('history', $history->no)->where('place', $place)->get();

      $result = ["place" => []];
      $historyIndex = 1;
      foreach ($historySubstances as $history) {
        $result["place"]["content".$historyIndex] = ["content" => $history->substance, "weather" => $history->weather];
        $historyIndex++;
        $img = DB::table('history_imgs')->where('substance', $history->no)->first();
        $result["url"] = "http://163.44.166.91/LEARnFUN/storage/historyImgs/$img->img_url";
      }
      // dd($result);
      return $result;
    }
}
?>
