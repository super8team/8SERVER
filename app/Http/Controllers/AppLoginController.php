<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppLoginController extends Controller
{
    public function login(Request $request) {
      $inputId = $request->input('inputID');
      $inputPw = $request->input('inputPASS');

      // $inputId='desmond21';
      // $inputPw='123456';

      $result = array(
                  "loginSuccess" => false,
                  "id" => "",
                  "name" => "",
                  "type" => "",
                  "childID" => array(),
                );

      if(Auth::attempt(['id'=>$inputId, 'password'=>$inputPw])) {
        $user = DB::table('users')->where('id', '=', $inputId)->first();


        $result["loginSuccess"] = true;
        $result["id"] = $user->id;
        $result["name"] = $user->name;
        $result["type"] = $user->type;

        switch ($user->type) {
          case "parents":
            $childs = DB::table('users')
                        ->join('students', 'students.student', '=', 'users.no')
                        ->where('parents', $user->no)
                        ->get();
            $result["childID"] = $childs->toArray();
            break;

          case "student":
            $grade_class = DB::table('students')
                             ->where('student', $user->no)
                             ->first()->grade_class;
            $grade_class = DB::table('grade_classes')
                             ->where('no', $grade_class)
                             ->first();
            $result["grade"] = $grade_class->grade;
            $result["class"] = $grade_class->class;

            $school = DB::table('schools')
                        ->where('no', $grade_class->school)
                        ->first()->name;

            $result["schoolName"] = $school;
            break;

          case "teacher":
            $grade_class = DB::table('grade_classes')
                              ->where('teacher', $user->no)
                              ->first();
            $result["grade"] = $grade_class->grade;
            $result["class"] = $grade_class->class;

            $school = DB::table('schools')
                        ->where('no', $grade_class->school)
                        ->first()->name;

            $result["schoolName"] = $school;
            break;

          default:
            # code...
            break;
        }
        // dd($result);
        return json_encode($result);
      }

    return json_encode($result);
    }
}
