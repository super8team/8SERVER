<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index()
    {

    }

    public function confirm()
    {

    }

    public function share(Request $request)
    {


        return view('blockfactory.tool_share_main')->with('package_id', '')
                                                   ->with('package_name', '')
                                                   ->with('pacakge_img', '');
    }

    public function shareDetail(Request $request)
    {


        return view('blockfactory.tool_share_detail')->with();
    }

    public function shareShare(Request $request)
    {


        return view('blockfactory.tool_share_share')->with();
    }

    public function shareDownload(Request $request)
    {


        return view('blockfactory.tool_share_download')->with();
    }
}
