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

        return $request->ajax;
    }
}
