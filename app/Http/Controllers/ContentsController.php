<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index($no)
    {


        // 연제한테 어떻게 값을 받을지 물어볼것(id? no?)
//        $user = DB::table('users')->where('no', $no)->first();

        $packagesName = DB::table('contents_packages')->where();





        return view('blockfactory.block')->with('packages_name', '')
                                          ->with('packages_id', '')
                                          ->with('contents_name', '')
                                          ->with('contents_id', '');

    }


    // 공유하기 페이지에서 나오는 항목들을 서버로 넘김 -> redirect 메인
    public function block(Request $request)
    {
        $packageImg = $request->input('package_img');
        $packageSubs = $request->input('package_subs');
        $packageName = $request->input('package_name');
        $contentsId = $request->input('contents_id');
        $contentsOwnerNo = $request->input('contents_owner_no');



        // img 파일 업로드
        //나중에


        // contents_packages 추가
        DB::table('contents_packages')->insert([
            ['owner' => $contentsOwnerNo, 'name' => $packageName]
        ]);


        // 가장최근에 만든 콘텐츠 패키지
        $newContentsPackage = DB::table('contents_packages')->ordeyBy('no', 'desc')->first();


        // contents 추가
        for($i = 0; $i < sizeof($contentsId); $i++) {

            $oldContents = DB::table('contents')->where('no', $contentsId[$i])->first();

         // 새로운 콘텐츠패키지에 기존 콘텐츠 복사본이 생김
            DB::table('contents')->insert([
                ['spec' => $oldContents->spec, 'xml' => $oldContents->xml, 'like' => 0, 'contents_packages' => $newContentsPackage->no, 'copy' => 1]
            ]);

        }


        // contents_package_shares 추가
        DB::table('contents_package_shares')->insert([
            ['contents_packages' => $newContentsPackage->no, 'img_url' => $packageImg, 'explain' => $packageSubs, 'views' => 0, 'downloads' => 0]
        ]);




        // 이미지는 업로드 한 img 파일의 서버에 저장된 경로


    }


    public function share(Request $request)
    {
        $packageIds = [];
        $packageNames = [];
        $packageImgs = [];

        $contentsPackageShares= DB::table('contentsPackageShares')->get();

        foreach ($contentsPackageShares as $contentsPackageShare ) {

            array_push($packageIds, $contentsPackageShare->no);
            array_push($packageNames, $contentsPackageShare->name);
            array_push($packageImgs, $contentsPackageShare->img_url);

        }

        return view('blockfactory.tool_share_main')->with('package_id', $packageIds)
                                                   ->with('package_name', $packageNames)
                                                   ->with('pacakge_img', $packageImgs);
    }

    public function shareDetail($packageId)
    {

        $contentsName = [];
        $contentsId = [];

        // packageId를 가지는 contents_pacage_share 가져옴
        $contentsPackageShare= DB::table('contents_package_share')->where('no', $packageId)->first();

        // $contentsPackageShare가 가지고 있는 패키지 번호
        $contentsPackage = DB::table('contents_packages')->where('no', $contentsPackageShare->contents_packages)->first();

        // contents_package onwer컬럼과 일치하는 user 가져오기
        $user = DB::table('users')->where('no', $contentsPackage->owner)->first();


        // 현재 콘텐츠에 포함된 콘텐츠
        $contents = DB::table('$contents')->where('contents_package', $contentsPackage->no)->get();


        foreach($contents as $content){

            array_push($contentsName, $content->name);
            array_push($contentsId, $content->no);

        }


        return view('blockfactory.tool_share_detail')->with('package_id', $packageId)
                                                     ->with('package_name', $contentsPackage->name)
                                                     ->with('package_img', $contentsPackageShare->img_url)
                                                     ->with('package_subs', $contentsPackageShare->explain)
                                                     ->with('write_date', $contentsPackageShare->created_at)
                                                     ->with('writer', $user->id)
                                                     ->with('download_count', $contentsPackageShare->downloads)
                                                     ->with('contents_name', $contentsName)
                                                     ->with('contents_id', $contentsId);

    }

    public function shareShare(Request $request)
    {


        return view('blockfactory.tool_share_share')->with('contents_name', '')
                                                    ->with('contents_id', '');



    }

    public function shareDownload(Request $request)
    {


        return view('blockfactory.tool_share_download')->with('choice_contents_name', '')
                                                        ->with('choice_contents_id', '');


        $newPackageName = $request->input('new_package_name');
        $packageName = $request->input('package_name');
        $packageId = $request->input('package_id');
        $contenstId = $request->input('contenst_id');





    }
}
