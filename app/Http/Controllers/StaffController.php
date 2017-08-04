<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.staff_list');
    }

    public function result()
    {
        return view('staff.result');
    }

    public function memberAdd()
    {

        return view('staff.member_add');
    }

    public function memberSearch()
    {

    }

    public function ajax(Request $request)
    {
//        $json = "박";
        $json = $request->input('search');
//        dd($json);
        // 값을 비교 하는 쿼리
        $searches = \DB::table('users')->where('name', 'like', "%$json%")->get();
        $result = [];
        foreach ($searches as $search) {
            $result[] = array("no" => $search->no, "id" => $search->id, "name" => $search->name);
        }

        return $result;

    }
}
