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
                  "no" => "",
                  "id" => "",
                  "name" => "",
                  "type" => "",
                  "child" => array(),
                  "grade" => "",
                  "class" => "",
                  "schoolName" => "",
                  "password" => "",
                );

      if(Auth::attempt(['id'=>$inputId, 'password'=>$inputPw])) {
        $user = DB::table('users')->where('id', '=', $inputId)->first();


        $result["loginSuccess"] = true;
        $result["no"] = $user->no;
        $result["id"] = $user->id;
        $result["name"] = $user->name;
        $result["type"] = $user->type;
        $result["password"] = $user->password;

        if ($user->type == "parents") {
            $childs = DB::table('users')
                        ->join('students', 'students.student', '=', 'users.no')
                        ->where('parents', $user->no)
                        ->get();
            // $result["childID"] = $childs->toArray();
            for($i=0; $i<count($childs); $i++) {
              $result["child"]["child".($i+1)] = ["id"=>$childs[$i]->id, "name"=>$childs[$i]->name, "no"=>$childs[$i]->no];
            }
        } else if ($user->type == "student") {
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
          } else if ($user->type == "teacher") {
            $grade_class = DB::table('grade_classes')
                              ->where('teacher', $user->no)
                              ->first();
            $result["grade"] = $grade_class->grade;
            $result["class"] = $grade_class->class;

            $school = DB::table('schools')
                        ->where('no', $grade_class->school)
                        ->first()->name;

            $result["schoolName"] = $school;
         }
        // dd($result);
        return json_encode($result);
      }

    return json_encode($result);
    }
}
