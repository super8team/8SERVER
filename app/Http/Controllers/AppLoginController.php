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

      $user = DB::table('users')->where('id', '=', $inputId)->first();
      $result = array("loginSuccess" => false,
                  "id" => $user->id,
                  "name" => $user->name,
                  "type" => $user->type,
                );

      if(Auth::attempt(['id'=>$inputId, 'password'=>$inputPw])) {
        $result["loginSuccess"] = true;
        return json_encode($result);
      }

      return json_encode($result);
    }
}
