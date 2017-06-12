<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Exception\ErrorException;
use Faker\Factory;

class AppRequestController extends Controller
{

    public function getStudentList (Request $request) {
        $inputId = $request->input('userID');
      //  $inputId = 'Illum' ; // teacher 임의값
       $inputId = DB::table('users')->where('id', $inputId)->value('no');

        $school = DB::table('works')->where('teacher', $inputId)->first();
        $school = DB::table('schools')->where('no', $school->school)->first();

        $result = array('school' => array());
        // $result = array("school" => $school->name);
        // $result["school"]

        $grade_classes = DB::table('grade_classes')->where('school', $school->no)->where('grade', 1)->get();
        // dd($grade_classes);

        foreach ($grade_classes as $grade) {
          if($grade->grade != '1학년') continue;
            $result['school']['class'.str_split($grade->class, 1)[0]] = array();

                $students = DB::table('students')->where('grade_class', $grade->no)->get();
                foreach ($students as $student) {
                    $user = DB::table('users')->where('no', $student->student)->first();
                    array_push($result['school']['class'.str_split($grade->class, 1)[0]], ["student" => ["id"=>$user->id, "name"=>$user->name]]);
                    // ["studentId" => $user->id, "studentName" => $user->name]);
                }
        }

        // dd($result);
        return json_encode($result);
    }


    public function getPlan (Request $request) {
        $userid = $request->input('userID');
      //  $userid = 'Illum' ; // teacher 임의값
       $userid = DB::table('users')->where('id', $userid)->value('no');


        $plan = DB::table('field_learning_plans')->where('teacher', $userid)->first();
        $details = DB::table('detail_plans')->where('plan', $plan->no)->get();

        $result = array();
        $result["gps"] = array();

        foreach ($details as $detail) {
            $place = DB::table('places')->where('no', $detail->place)->first();
            array_push($result["gps"], array("place"=>array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng)));
            // $result["place"] = array("name"=>$place->name, "lat"=>$place->lat, "lng"=>$place->lng);
            // $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
        }

        // dd($result);
        return json_encode($result);
    }
}
