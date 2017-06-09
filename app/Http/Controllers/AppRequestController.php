<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Exception\ErrorException;

class AppRequestController extends Controller
{

    public function getStudentList (Request $request) {
        $inputId = $request->input('userID');
//        $inputId = ; // teacher 임의값

        $school = DB::table('works')->where('teacher', $inputId)->first();
        $school = DB::table('schools')->where('no', $school->school)->first();

        $result = array($school->name => array());
        $grade_classes = DB::table('grade_classes')->where('school', $school->no)->get();

        foreach ($grade_classes as $grade) {
            $result[$school->name][$grade->grade . $grade->class] = array();

                $students = DB::table('students')->where('grade_class', $grade->no)->get();
                foreach ($students as $student) {
                    $user = DB::table('users')->where('no', $student->student)->first();
                    array_push($result[$school->name][$grade->grade . $grade->class], $user->name);
                }
        }
dd($result);
        return json_encode($result);
    }


    public function getPlan (Request $request) {
        $userid = $request->input('userID');
//        $userid = ; // teacher 임의값
        $plan = DB::table('field_learning_plans')->where('teacher', $userid)->first();
        $details = DB::table('detail_plans')->where('plan', $plan->no)->get();

        $result = array();

        foreach ($details as $detail) {
            $place = DB::table('places')->where('no', $detail->place)->first();
            $result["$place->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
        }
        dd($result);

        return json_encode($result);
    }
}