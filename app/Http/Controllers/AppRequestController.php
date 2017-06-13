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
        $school = DB::table('schools')->where('no', $school->school)->first();

        $result = array('school' => array());
        // $result = array("school" => $school->name);
        // $result["school"]

        $grade_classes = DB::table('grade_classes')->where('school', $school->no)->where('grade', 1)->get();
        // dd($grade_classes);

        foreach ($grade_classes as $grade) {
          $result['school']['class'.str_split($grade->class, 1)[0]] = array();

              $students = DB::table('students')->where('grade_class', $grade->no)->get();
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

        //  dd($result);
        return json_encode($result);
    }


    public function getPlan (Request $request) {
        $userid = $request->input('userID');
      //  $userid = 'Illum' ; // teacher 임의값
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

    private function getTeacherPlan($teacher) {
      $plan = DB::table('field_learning_plans')->where('teacher', $teacher->no)->first();
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
      $plan = DB::table('groups')->where('joiner', $child->no)->orderBy('plan', 'desc')->first();
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

      return $result;
    }

    private function getStudentPlan($student) {
      $plan = DB::table('groups')->where('joiner', $student->no)->orderBy('plan', 'desc')->first();
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

      return $result;
    }
}
