<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ContentsController extends Controller
{
    public function index($id)
    {
//
//       //no -> 사용자 primary key
//         // 연제한테 어떻게 값을 받을지 물어볼것(id? no?)
// <<<<<<< HEAD
// //        $user = DB::table('users')->where('no', $no)->first();
//
//         $packagesName = DB::table('contents_packages')->where();
//
//
//
//
// /////////////////////////////////// for 연제 /////////////////////////////////////////////
//
// // 한 유저(선생님)가 가지고 있는 패키지와 콘텐츠 전체!
//
// // $packages = 여러 패키지들이 담겨있는 배열
// // $packages[번호] = 각 패키지 연관배열
// // $packages[번호]['name'] = 패키지이름
// // $packages[번호]['id'] = 패키지아이디
// // $packages[번호]['contents'] = 포함된 컨텐츠들의 배열
// // $packages[번호]['contents'][번호] = 패키지에 포함된 컨텐츠 연관배열
// // $packages[번호]['contents'][번호]['id'] = 컨텐츠 아이디
// // $packages[번호]['contents'][번호]['name'] = 컨텐츠 이름
//
//
// $userNo = $request->input('user_id'); // 서버한테 post로 현재 유저 아이디를 주고
// $packages = [];
// $owndedPackages = \DB::table('contents_packages')->where('owner', $userNo)->get();
// $packageCount = count($owndedPackages);
//
// for($i=0; $i<$packageCount; $i++) {
//   $packages[$i]['name'] = $owndedPackages[$i]->name;
//   $packages[$i]['id'] = $owndedPackages[$i]->no;
//
//   $contents = \DB::table('contents')->where('contents_package', $packages[$i]['id'])->get();
//   $contentCount = count($contents);
//
//   for($j=0; $j<$contentCount; $j++) {
//     $packages[$i]['contents'][$j]['id'] = $contents[$j]->no;
//     $packages[$i]['contents'][$j]['name'] = $contents[$j]->name;
//   }
// }
//
// return view('', ['packages' => $packages]);
//
//
// /////////////////////////////////// for 연제 /////////////////////////////////////////////
//
//
//         return view('blockfactory.block')->with('packages_name', '')
//                                           ->with('packages_id', '')
//                                           ->with('contents_name', '')
//                                           ->with('contents_id', '');
//
// =======
//         $package_infor = [];
//         $user = DB::table('users')->where('no','=',$id)->get();
//         // dd($user);
//         $packages  =  DB::table('contents_packages')->where('no','=',$id)->first();
//
//         $contents  =  DB::table('contents')->where('contents_package','=',$packages->no)->get();
//         // dd($contents);
//         //
//         // 패키지 번호를 알아냄
//         // 그 패키지 번호를 사용해서
//         // 외래키를 사용해서 콘텐츠들의 리스트들을 추출함
//         // $contenst  = DB::table('contents')->where('no','=',$no)->get();
//         #251 (1) { ["items":protected]=> array(1)
//
//         array_push($package_infor, array('ids'=>$packages->no,'name'=>$packages->name));
//
//
//         // var_dump($packages);
//         // var_dump($packagesx);
//         return view('ProjectBlockCode.blockfactory.block')->with('contents_xml',  $contents[0]->xml)
//                                                           ->with('contents_name', '첫번째이야기..')
//                                                           ->with('block_myungse', $contents[0]->spec)
//                                                           ->with('contents_id',   $contents[0]->no)
//                                                           ->with('package_name', $package_infor);
// >>>>>>> 19f1c7ac845580e62f2a5be159c2ee0b35d6ff4c

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
