<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChecklistController extends Controller
{

//   getCheckList
// checkList { check1 { title : bigsort : smallsort : substance}
//                      check2 { title : ......
  public function getCheckList(Request $request) {
    $checklists = DB::table('checklists')->where('smallsort', '')->get();
    // dd(count($checklists));
    $result = [];

    // checklist 별로 묶어서 출력하려고 하던 코드
    // $substancesCount = count($checklists);
    // $checkTitlePlag = 1;
    // for ($i=0; $i<$substancesCount; $i++) {
    //   $result["check".$checkTitlePlag] = [$checklists[$i]->];
    // }

    // 데모용
    $checkIndex = 1;
    foreach ($checklists as $check_substance) {
      $result["check".$checkIndex] = ["title" => $check_substance->title,
                                      "bigsort" => $check_substance->bigsort,
                                      "substance" => $check_substance->substance];
      $checkIndex++;
    }

    // dd($result);
    return json_encode($result);
  }
}
