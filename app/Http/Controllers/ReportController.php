<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.list');
    }

    public function write()
    {
        return view('report.write');
    }

    public function view()
    {
        return view('report.view');
    }

    public function evaluation()
    {
        return view('report.evaluation');
    }
}
