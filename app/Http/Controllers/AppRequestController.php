<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppRequestController extends Controller
{
    public function getPlan (Requst $request) {
        $userid = $request->input('userId');
        $plan = DB::table('field_learning_plans')->where('teacher', $userid)->first();
        $details = DB::table('detail_plans')->where('plan', $plan->no)->get();

        $result = array();

        $details->each( function ($detail) {
            $place = DB::table('place')->where('no', $detail->place);
            $result["$detail->name"] = array("lat"=>$place->lat, "lng"=>$place->lng);
        });

        return json_encode($result);
    }

    public function getStudentList (Request $request) {
        $inputId = $request->input('userID');

        $school = DB::table('works')->where('teacher', $inputId)->first();
        $result = array($school->name => array());
        $grade_classes = DB::table('grade_classes')->where('school', $school->no)->get();
        $grade_classes->each(function ($grade) {
            global $result, $school;
            array_push($result[$school->name], array($grade->grade.$grade->class => array()));
        $students = DB::table('students')>where('grade_class', $grade)->get();
        $students->each(function ($student) {
            global $result, $school, $grade;
            $user = DB::table('users')->where('no', $student->student)->first();
            array_push($result[$school->name][$grade->grade.$grade->class], array('studentName' => $user->name));
        });
      });

        return json_encode($result);
    }
}
