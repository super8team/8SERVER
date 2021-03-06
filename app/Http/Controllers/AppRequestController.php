<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Exception\ErrorException;
use Faker\Factory;
use Carbon\Carbon;

class AppRequestController extends Controller
{

    public function getStudentList (Request $request) {
        $inputId = $request->input('userID');
        // $inputId = 'Illum' ; // teacher 임의값

       $inputId = DB::table('users')->where('id', $inputId)->value('no');

        $school = DB::table('works')->where('teacher', $inputId)->first();
        // dd($school);
        $school = DB::table('schools')->where('no', $school->school)->first();

        $result = array('school' => array());
        // $result = array("school" => $school->name);
        // $result["school"]

        $grade_classes = DB::table('grade_classes')->where('school', $school->no)->where('grade', 1)->get();
        // dd($grade_classes);

        foreach ($grade_classes as $grade) {
		if(str_split($grade->class, 1)[0] > 3) break;        
  $result['school']['class'.str_split($grade->class, 1)[0]] = array();

              $students = DB::table('students')->where('grade_class', $grade->no)->take(5)->get();
              // dd($students);
              $stdIndex = 1;
              foreach ($students as $student) {
                  $user = DB::table('users')->where('no', $student->student)->first();
                  $result['school']['class'.$grade->class]["student".$stdIndex] = ["id"=>$user->id, "name"=>$user->name];
                  // array_push($result['school']['class'.str_split($grade->class, 1)[0]], ["student" => ["id"=>$user->id, "name"=>$user->name]]);
                  // ["studentId" => $user->id, "studentName" => $user->name]);

                  $stdIndex++;
              }
        }

        // dd($result);
        return json_encode($result);
    }


    public function getPlan (Request $request) {
        $userid = $request->input('userID');
      //  $userid = 'Illum' ; // teacher 임의값
      // $userid = 'dicta' ; // std 임의값
      // $userid = 'desmond21' ; // parents 임의값
       $user = DB::table('users')->where('id', $userid)->first();

       switch ($user->type) {
         case 'student':
           return json_encode($this->getStudentPlan($user));
           break;

         case 'parents':
           return json_encode($this->getParentsPlan($user));
           break;

         case 'teacher':
           return json_encode($this->getTeacherPlan($user));
           break;

         default:
           # code...
           break;
       }
    }


    public function getBeforePlanHistory(Request $request) {
      $details = DB::table('detail_plans')->where('plan', $request->input('planNo'))->get();

      $result = [];
      $result["gps"] = [];

      $placeIndex = 1;
      foreach ($details as $detail) {
          $place = DB::table('places')->where('no', $detail->place)->first();
          $result["gps"]["place".$placeIndex]=["no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng];
          // array_push($result["gps"], array("place".$i=>array("no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng)));
          // $result["place"] = array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng);
          // $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
          $placeIndex++;
      }
      // dd($result);
      return $result;
    }


    private function getTeacherPlan($teacher) {
      // $plan = DB::table('field_learning_plans')->where('teacher', $teacher->no)->first();
      $plan = DB::table('field_learning_plans')->where('no', 5)->first();
      $details = DB::table('detail_plans')->where('plan', $plan->no)->get();

      $result = [];
      $result["gps"] = [];

      $placeIndex = 1;
      foreach ($details as $detail) {
          $place = DB::table('places')->where('no', $detail->place)->first();
          $result["gps"]["place".$placeIndex]=["no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng];
          // array_push($result["gps"], array("place".$i=>array("no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng)));
          // $result["place"] = array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng);
          // $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
          $placeIndex++;
      }
      // dd($result);
      return $result;
    }

    private function getParentsPlan($parents) {

      //  자식이 여러명인 경우, 우선 보류
      // $children = DB::table('students')->where('parents', $parents->no)->get();
      // foreach ($children as $child) {
      //   $plan = DB::table('groups')->where('joiner', $child->no)->orderBy('plan', 'desc')->first();
      // }

      // $plan = DB::table('field_learning_plans')->where('teacher', $user->no)->first();

      $child = DB::table('students')->where('parents', $parents->no)->first();
      // $plan = DB::table('groups')->where('joiner', $child->student)->orderBy('plan', 'asc')->first();
      $plan = DB::table('groups')->where('plan', 5)->first();
      $details = DB::table('detail_plans')->where('plan', $plan->plan)->get();

      $result = [];
      $result["gps"] = [];

      $placeIndex = 1;
      foreach ($details as $detail) {
          $place = DB::table('places')->where('no', $detail->place)->first();
          $result["gps"]["place".$placeIndex]=["no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng];
          // array_push($result["gps"], array("place".$i=>array("no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng)));
          // $result["place"] = array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng);
          // $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
          $placeIndex++;
      }
      // dd($result);
      return $result;
    }

    private function getStudentPlan($student) {
      // $plan = DB::table('groups')->where('joiner', $student->no)->orderBy('plan', 'asc')->first();
      $plan = DB::table('groups')->where('plan', 5)->first();
      $details = DB::table('detail_plans')->where('plan', $plan->plan)->get();

      $result = [];
      $result["gps"] = [];

      $placeIndex = 1;
      foreach ($details as $detail) {
          $place = DB::table('places')->where('no', $detail->place)->first();
          $result["gps"]["place".$placeIndex]=["no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng];
          // array_push($result["gps"], array("place".$i=>array("no"=>$place->no, "name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng)));
          // $result["place"] = array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng);
          // $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
          $placeIndex++;
      }
      // dd($result);
      return $result;
    }

    public function getNoticeList(Request $request) {
      // @request 부모 정보
      // return 자녀의 플랜에 해당하는 가정통신문!
      // [{no: (int), title: (string), answer:(string), answerDate: (string)}, {}, {} ...]
      $result = [];
      $newNotice = [];
      // 해당 학부모의 자식과 숫자를 얻음
      $children = $request->input('child');
      $children = json_decode($children);
      $cCount   = count($children);
//children[0];
      // test용
      // $children = array(
      //   "child1" => array(
      //     "id" => "dicta",
      //     "name" => "창수",
      //     "no" => "159",
      //   ),
      // );
//	return(json_encode($children));

//      for ($i=1; $i<=$cCount; $i++) {
      foreach($children as $child) {
	      $no = $child->no;
        $planNo = \DB::table('groups')->where('joiner', $no)->first()->plan;
        $notices = \DB::table('notices')->where('plan', $planNo)->get();

        foreach($notices as $notice) {
          $newNotice['no'] = (string)$notice->no;
          $newNotice['title'] = $notice->title;
          $respond = \DB::table('notice_responds')
            ->where('notice', $notice->no)->where('parents', $request->input('no'))->first();

          if ($respond != null) {
            $newNotice['respond'] = $respond->respond;
            $newNotice['respondDate'] = $respond->updated_at;
          } else {
            $newNotice['respond'] = "미응답";
            $newNotice['respondDate'] = "";
          }
        }
        $result[] = $newNotice;
      }

      return json_encode($result);

    }

    /**
    * @param
    * no, notice
    * @return
    * notice, responds
    */
    public function getNoticeDetail(Request $request) {
      $notice = \DB::table('notices')->where('no', $request->input('notice'))->first();
      $respond = \DB::table('notice_responds', $notice->no)->where('parents', $request->input('no'))->first();

      $user = \DB::table('users')->where('no', $notice->writer)->first()->name;

      $result = array(
        'notice' => $notice->no,
        'title' => $notice->title,
        'substance' => $notice->substance,
        'writer' => $user,
        'date' => $notice->created_at,
        // 'limitDate' => $notice->limit_date,
      );

      if ($respond != null) {
        $result['respond'] = $respond->respond;
        $result['respondDate'] = $respond->updated_at;
      } else {
        $result['respond'] = "";
        $result['respondDate'] = "";
      }

      // dd($result);
      return json_encode($result);
    }

    /**
    * @param
    * no, notice, respond
    */
    public function noticeRespondStore(Request $request) {
      $userNo = $request->input('no');
      $noticeNo = $request->input('notice');
      $respond = $request->input('respond');

      \DB::table('notice_responds')->insert([
        'notice'  => $noticeNo,
        'parents' => $userNo,
        'respond' => $respond,
        'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }

    public function noticeRespondUpdate(Request $request) {
      $userNo = $request->input('no');
      $noticeNo = $request->input('notice');
      $respond = $request->input('respond');

      \DB::table('notice_responds')->where('notice', $noticeNo)->where('parents', $userNo)
        ->update([
          'respond' => $respond,
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }

    public function logStore(Request $request) {
      $userNo = $request->input('userNo');
      $logMsg = $request->input('log');

      // 실용 코드
      // $plan = \DB::table('groups')->where('joiner', $userNo)->get(); // 이 중 날짜가 맞는 하나만 고르기!

      // 시연 코드
      $group = \DB::table('groups')->where('joiner', $userNo)->first();

      \DB::table('schedule_logs')->insert([
        "in_out_substance" => $logMsg,
        "plan"             => $group->plan,
        "time"             => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }

    public function logView(Request $request) {
      $userNo = $request->input('userNo');

      // 자녀 한명용 코드
      if($request->input('userType') == "parents") {
        $userNo = \DB::table('students')->where('parents', $userNo)->first()->student;

        //실제 여러 자녀가 가능한 경우의 코드
        // $userNo = $request->input('childNo');
      }

      $group = \DB::table('groups')->where('joiner', $userNo)->first();
      $logs = \DB::table('schedule_logs')->where('plan', $group->plan)->get();

      $result = '';

      foreach ($logs as $log) {
        $result .= $log->in_out_substance."\n";
      }
      // dd(array("log" => $result));
      return json_encode(array("log" => $result));
    }


    // getHistoryList
    // data: userId
    // 사용자가 다녀온 체험학습 목록

    public function getPlanList(Request $request) {
      $userNo = $request->input('userNo');
      $result = [];

      if ($request->input('userType') == "parents") {
        // dd($userNo);
        $children = \DB::table('students')->where('parents', $userNo)->get();
        $groups = [];
        // dd($childGroups);
        foreach ($children as $child) {
          $childGroups = \DB::table('groups')->where('joiner', $child->student)->get();
          // dd($childGroups);
          foreach ($childGroups as $childGroup) {
            $groups[] = $childGroup;
          }
        }
        // dd($groups);
      } else {
        $groups = \DB::table('groups')->where('joiner', $userNo)->get();
      }
      // dd($groups);
      foreach ($groups as $group) {
        # code...
        $plan = \DB::table('field_learning_plans')->where('no', $group->plan)->first();
        $result[] = array(
          "no" => $plan->no,
          "title" => $plan->name,
          "date" => $plan->at,
        );
      }
      // dd($result);
      return json_encode($result);
      // dd($result);
    }




    public function getContents (Request $request) {
      $result = [];
      $userNo = $request->input('inputID');

      // 시연용코드
      $group = \DB::table('groups')->where('joiner', $userNo)->first();
      $plan = \DB::table('field_learning_plans')->where('no', $group->plan)->first();
      $contents = \DB::table('contents')->where('contents_package', $plan->contents_package)->get();

      foreach ($contents as $content) {
        # code...
        $result[] = json_decode($content->spec);
      }
      // var_dump($result);
      return json_encode($result);
    }

    public function getSurveyList(Request $request) {
      $result     = [];
      $newSurvey  = [];

      $userNo = $request->input('no');
      $responds = \DB::table('survey_responds')->where('respondent', $userNo)->get();
      $responds = \DB::table('surveies')->get();
      foreach ($responds as $respond) {
          // $survey = \DB::table('surveies')->where('no', $respond->survey)->first();
          $survey = \DB::table('surveies')->where('no', $respond->no)->first();
          $result[] = array(
            "no" => (String)$survey->no,
            "title" => $survey->title,
            "date"  => $respond->created_at,
            "update"=> $respond->updated_at, // 응답일!
          );
      }
      // dd($result);
      return json_encode($result);
    }

    public function getSurveyDetail(Request $request) {
      $surveyNo = $request->input('survey');
      $articles = \DB::table('survey_articles')->where('survey', $surveyNo)->get();
      $userNo = $request->input('no');
      // dd($surveyNo, $userNo);
      $respond = \DB::table('survey_responds')->where('survey', $surveyNo)
                          ->where('respondent', $userNo)->first();

      $result = array();

      $questionIndex = 0;
      foreach ($articles as $article) {
        $newSurvey = array(
          "no" => $article->no,
          "question" => $article->article,
          "answers" => "",
          "selected" => "",
        );
        if ($article->type == "obj") {
          $answers = \DB::table('survey_answers')->where('survey_article', $article->no)->get();
          foreach ($answers as $answer) {
            $newSurvey['answers'][] = $answer->substance;
          }
        } elseif ($article->type == "ox") {
          $newSurvey['answers'][] = "o";
          $newSurvey['answers'][] = "x";
        }
        if($respond != null) {
          $respondContent = \DB::table('survey_respond_contents')
                        ->where('survey_respond', $respond->no)
                        ->where('survey_article', $article->no)->first();
          //  dd($respond, $article);
          if($respondContent!=null)
            $newSurvey['selected'] = $respondContent->respond;
        }
        $result[] = $newSurvey;
      } // end of foreache, articles
      //  dd($result);
      return json_encode($result);
    }

    public function setContentScore(Request $request) {
      $user = $request->input('userNo');
      $content = $request->input('contentNo');
      $score = $request->input('score');

      \DB::table('contents_evalutions')->insert([
        "content" => $content,
        "student" => $user,
        "score" => $score,
      ]);

      $avgScrore = \DB::table('contents_evalutions')->where('content', $content)->avg('score');

      \DB::table('contents')->where('no', $content)->update(["avg" => $avgScrore]);

      return json_encode([
        "content" => $content,
        "input-score" => $score,
        "avg-score" => $avgScore
      ]);
    }

    // getCheckList
    // checkList { check1 { title : bigsort : smallsort : substance}
    //                      check2 { title : ......
    public function getCheckList(Request $request) {
      $userNo = $request->input('userNo');
      $plan = DB::table('groups')->where('joiner', $userNo)->orderBy('plan', 'desc')->first();

      // $checklists = DB::table('checklists')->where('smallsort', '')->get();
      $checklists = DB::table('checklists')->get();

      // dd($checklists);
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
        $planChecklist = DB::table('plan_checklists')
        ->where('plan', $plan->plan)->where('checklist', $check_substance->no)->first();
          // ->where('plan', 6)->where('checklist', $check_substance->no)->first();
        $respond = DB::table('checklist_responds')->where('checklist', $planChecklist->no)->first();
        // dd($respond);
        // var_dump($check_substance->substance."<br>");
        // dd($check_substance->smallsort);
        if ($check_substance->smallsort != null)
          $smallsort = $check_substance->smallsort;
        else $smallsort = '';
        $result["check".$checkIndex] = ["title" => $check_substance->title,
                                        "no" => $planChecklist->no,
                                        "bigsort" => $check_substance->bigsort,
                                        "smallsort" => $smallsort,
                                        "substance" => $check_substance->substance,
                                        "respond" => $respond->respond];

        $checkIndex++;
      }

      // dd($result);
      return json_encode($result);
    }

    public function setChecklist(Request $request) {
      $user = $request->input('userNo');
      $checked = $request->input('checked'); // 1, 2, 4, 3...
      $noChecked = $request->input('noChecked'); // 7, 5, 6...

      foreach ($checked as $checklist) {
        \DB::table('checklist_responds')->where('checklist', $checklist)->update([
          "respond" => "1",
        ]);
      }
      foreach ($noChecked as $checklist) {
        \DB::table('checklist_responds')->where('checklist', $checklist)->update([
          "respond" => "0",
        ]);
      }
    }

    public function surveyRespondStore(Request $request) {
      // 0814.1026 항상 responds 가 만들어져 있다는 설정하에 코드 수정할 것
      $userNo = json_decode($request->input('userNo'));
      $surveyNo = json_decode($request->input('survey'));
      $answers = $request->input('answer');

      $resp = \DB::table('survey_responds')->where([['respondent', '=', $userNo], ['survey', '=', $surveyNo]])->first();
      if ($resp != null)
        $this->updateSurveyRespond($answers, $userNo, $resp->no);
      else $this->insertSurveyRespond($userNo, $surveyNo, $answers);
    }

    private function updateSurveyRespond($answers, $userNo, $respNo) {
        \DB::table('survey_responds')->where('no', $respNo)
                  ->update(['updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')]);

        foreach ($answers as $key => $value) {
          try {
            \DB::table('survey_respond_contents')
                      ->where([['survey_respond', '=', $respNo],
                              ['survey_article', '=', $key]])
                      ->update(['respond'=>$value]);
          } catch (Exception $e) {
            \DB::table('survey_respond_contents')
                      ->insert(['survey_respond' => $respNo,
                              'survey_article' => (int) $key,
                              'respond'=>$value]);
          }
        }
    }

    private function insertSurveyRespond($userNo, $surveyNo, $answers) {
        $respNo = \DB::table('survey_responds')->insertGetId([
                      'respondent' => $userNo,
                      'survey' => $surveyNo,
                      'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                      'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    ]);

        foreach ($answers as $key => $value) {
          \DB::table('survey_respond_contents')
                    ->insert(['survey_respond' => $respNo,
                            'survey_article' => (int) $key,
                            'respond'=>$value]);
        }
    }
}
