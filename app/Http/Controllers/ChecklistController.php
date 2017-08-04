<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChecklistController extends Controller
{

    public function index()
    {
        return view('check.list');
    }

    public function write()
    {
        return view('check.write');
    }

    public function view()
    {
        return view('check.view');
    }

}
