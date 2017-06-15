<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ContentsController extends Controller
{
    public function index($id)
    {

    }



    // 공유하기 페이지에서 나오는 항목들을 서버로 넘김 -> redirect 메인

    public function block(Request $request)
    {

        // 경로
        $destinationPath = public_path().'/img/';
        $name            = $request->package_img->getClientOriginalName();    //name값
        $packageSubs     = $request->input('package_subs');     //explain
        $packageName     = $request->input('package_name');     //
        $contentsId      = $request->input('contents_id');
        //contentsid가 여러개가 될 수 있ㅇ므
        $contentsOwnerNo = $request->input('contents_owner_no');
        $views           = 0;                                   //views
        $downloads       = 0;


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

      Input::file('album_picture')->move($destinationPath, $name);

      // 완료 후 앨범 리스트로 이동

    }

    public function registerToPlan()
    {
      $picnic = ['first'=>'경북궁','second'=>'왕릉','third'=>'첨성대'];
      return view('ProjectBlockCode.blockfactory.tool_confirm',['picnic'=>$picnic]);
    }
    public function share()
    {
        $popularPackageIds   = [];
        $popularPackageImgs = [];
        $otherPackageInfor  = [];
        $popularPackageInfor  = [];
        $popularPackages  = DB::table('contents_package_Shares')->orderBy('views', 'desc')->take(3)->get();

        $otherPackages    = DB::table('contents_package_Shares')->orderBy('views', 'asc ')->take(6)->get();

        foreach ($popularPackages as $popularPackage ) {
            array_push($popularPackageInfor, array('ids'=>$popularPackage->no,'imgs'=>$popularPackage->img_url));
        }

        foreach ($otherPackages as $otherPackage ) {
              array_push($otherPackageInfor, array('ids'=>$otherPackage->no,'imgs'=>$otherPackage->img_url));
        }

        return view('ProjectBlockCode.blockfactory.tool_share_main')->with('popularPackage',$popularPackageInfor)
                                                                    ->with('otherPackage',$otherPackageInfor);

      }
    public function shareDetail($package_id)
    {

        $contentsName = [];
        $contentsId = [];

        // packageId를 가지는 contents_pacage_share 가져옴

        $contentsPackageShare= DB::table('contents_package_shares')->where('no','=', $package_id)->first();

        $contentsPackage = DB::table('contents_packages')->where('no','=', $contentsPackageShare->contents_package)->first();

        // contents_package onwer컬럼과 일치하는 user 가져오기
        $user = DB::table('users')->where('no','=', $contentsPackage->owner)->first();
        // dd($contentsPackage->no);
        // 현재 콘텐츠에 포함된 콘텐츠
        $contents = DB::table('contents')->where('contents_package','=', $contentsPackage->no)->get();


        foreach($contents as $content){
            array_push($contentsName, array('name'=>$content->name,'id'=>$content->no));
        }

        return view('ProjectBlockCode.blockfactory.tool_share_detail')->with('package_id', $contentsPackageShare->no)
                                                     ->with('package_name', '경주로 2박 3일')
                                                     ->with('package_img', $contentsPackageShare->img_url)
                                                     ->with('package_subs', $contentsPackageShare->explain)
                                                     ->with('write_date', $contentsPackageShare->created_at)
                                                     ->with('view', $contentsPackageShare->views)
                                                     ->with('writer', $user->name)
                                                     ->with('download_count', $contentsPackageShare->downloads)
                                                     ->with('contents_name', $contentsName);

    }
    public function shareRegister(Request $request)
    {

    }
    public function shareShare(Request $request)
    {


        return view('ProjectBlockCode.blockfactory.tool_share_share')->with('contents_name', '')
                                                    ->with('contents_id', '');

    }

    public function shareDownload(Request $request)
    {
      $choices = $request->input('choice_content');
      $choice_content = [];


      foreach($choices as $choice){
        array_push($choice_content,$choices['0']);
      }

      return view('ProjectBlockCode.blockfactory.tool_share_download')->with('choice_content', $choice_content);


      //
      // $newPackageName = $request->input('new_package_name');
      // $packageName = $request->input('package_name');
      // $packageId = $request->input('package_id');
      // $contenstId = $request->input('contenst_id');
    }
}
