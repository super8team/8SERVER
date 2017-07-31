<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use File;



class ContentsController extends Controller
{
    public function index()
    {
      // Request $request
/////////////////////////////////// for 연제 /////////////////////////////////////////////
//
// // 한 유저(선생님)가 가지고 있는 패키지와 콘텐츠 전체!
//
// $packages = 여러 패키지들이 담겨있는 배열
// $packages[번호] = 각 패키지 연관배열
// $packages[번호]['name'] = 패키지이름
// $packages[번호]['id'] = 패키지아이디
// $packages[번호]['contents'] = 포함된 컨텐츠들의 배열
// $packages[번호]['contents'][번호] = 패키지에 포함된 컨텐츠 연관배열
// $packages[번호]['contents'][번호]['id'] = 컨텐츠 아이디
// $packages[번호]['contents'][번호]['name'] = 컨텐츠 이름

// dd($id);
// $userNo   = $request->input('user_id'); // 서버한테 post로 현재 유저 아이디를 주고
// dd(Auth::user());
//

$userNo   = Auth::user()->no; // 서버한테 post로 현재 유저 아이디를 주고

//유저 타입이 선생님이 아니면 경고창을 띄우기
// $user_bool = DB::table('users')->where('no',$userNO)->first();
// if($user_bool->type != 'teacher'){
//
// }
$packages = [];
// $owndedPackages = \DB::table('contents_packages')->where('owner', $userNo)->get();
$owndedPackages = \DB::table('contents_packages')->where('owner', $userNo)->get();

$content_count = DB::table('contents')->where('contents_package',$owndedPackages[0]->no)->get();
// dd($content_count);
$content_count = count($content_count);

$packageCount  = count($owndedPackages);

for($i = 0; $i<$packageCount;$i++){
  $packages[$i]['name'] = $owndedPackages[$i]->name;
  $packages[$i]['id']   = $owndedPackages[$i]->no;

  $contents     = \DB::table('contents')->where('contents_package', $packages[$i]['id'])->get();
  $contentCount = count($contents);

  for($j=0; $j<$contentCount; $j++) {
    $packages[$i]['contents'][$j]['id']   = $contents[$j]->no;
    $packages[$i]['contents'][$j]['name'] = $contents[$j]->name;
    $packages[$i]['contents'][$j]['xml']  = $contents[$j]->xml;
    $packages[$i]['contents'][$j]['spec'] = $contents[$j]->spec;
  }
}
// dd($packages);
// dd($packages[0]['contents'][0]['xml']);
return view('ProjectBlockCode.blockfactory.block', ['packages' => $packages,'contentsize'=>$content_count,'index'=>0,'user'=>Auth::user()->name]);



// for($i=0; $i<$packageCount; $i++) {
//   $packages[$i]['name'] = $owndedPackages[$i]->name;
//   $packages[$i]['id']   = $owndedPackages[$i]->no;
//
//   $contents     = \DB::table('contents')->where('contents_package', $packages[$i]['id'])->get();
//   $contentCount = count($contents);
//
//   for($j=0; $j<$contentCount; $j++) {
//     $packages[$i]['contents'][$j]['id']   = $contents[$j]->no;
//     $packages[$i]['contents'][$j]['name'] = $contents[$j]->name;
//     $packages[$i]['contents'][$j]['xml']  = $contents[$j]->xml;
//     $packages[$i]['contents'][$j]['spec'] = $contents[$j]->spec;
//   }
// }


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


      //no -> 사용자 primary key
        // 연제한테 어떻게 값을 받을지 물어볼것(id? no?)
        // $package_infor = [];


        // $user      = DB::table('users')->where('no','=',$id)->get();
        // dd($user);


        // 콘텐츠 패키지에서 주인을 인식하기 위한 컬럼은 owner 컬럼이다
        // $packages  = DB::table('contents_packages')->where('owner','=',$id)->get();
        //$packages에서 사용자가 가지고 있는 패키지를 가져올 수 있다
        //그렇기 때문에 밑의 커리도 맘대로 하면 안된다 생각을 해고 쿼리를 때려야 한다
        //

        // $contents  =  DB::table('contents')->where('contents_package','=',$packages->no)->get();
        //$packages->no 값을 가져온다. 이 값을 이용해 contents_테이블에 외래키로 가져온 다음
        //contents테이블의 contents_package 로 도킹한다
        //그럼 결과값은 배열로 처리를 한다

        // 패키지 번호를 알아냄
        // 그 패키지 번호를 사용해서
        // 외래키를 사용해서 콘텐츠들의 리스트들을 추출함
        // $contenst  = DB::table('contents')->where('no','=',$no)->get();
        #251 (1) { ["items":protected]=> array(1)

        // array_push($package_infor, array('ids'=>$packages->no,'name'=>$packages->name));



        // $package_name    = new Array();
        //packages->no도 빼와야 함

        // $contents_xml     = new Array();
        // $contents_myungse = new Array();
        // $contents_name     = new Array();
        // 사용자가 여러개의 패키지를 가지고 있고
        // 하나의 패키지가 가지고 있는 컨텐츠는 여러개 이다


        // for()
        // {
        //
        // }
        // return view('ProjectBlockCode.blockfactory.block')->with('contents_xml',  $contents[3]->xml)
        //                                                   ->with('contents_name', $contents[3]->name)
        //                                                   ->with('block_myungse', $contents[3]->spec)
        //                                                   ->with('contents_id',   $contents[3]->no)
        //                                                   ->with('package_name', $package_infor);

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
        $newContentsPackage = DB::table('contents_packages')->orderBy('no', 'desc')->first();


        // contents 추가
        for($i = 0; $i < sizeof($contentsId); $i++) {

            $oldContents = DB::table('contents')->where('no', $contentsId[$i])->first();

         // 새로운 콘텐츠패키지에 기존 콘텐츠 복사본이 생김
            DB::table('contents')->insert([
                ['spec' => $oldContents->spec, 'xml' => $oldContents->xml, 'avg' => 0, 'contents_packages' => $newContentsPackage->no, 'copy' => 1]
            ]);

        }


        // contents_package_shares 추가
        DB::table('contents_package_shares')->insert([
            ['contents_packages' => $newContentsPackage->no, 'img_url' => $packageImg, 'explain' => $packageSubs, 'views' => 0, 'downloads' => 0]
        ]);

      Input::file('album_picture')->move($destinationPath, $name);

      // 완료 후 앨범 리스트로 이동

    }


    public function share()
    {
        $popularPackageIds    = [];
        $popularPackageImgs   = [];
        $otherPackageInfor    = [];
        $popularPackageInfor  = [];
        $popularPackages      = DB::table('contents_package_shares')->orderBy('views', 'desc')->take(3)->get();

        $otherPackages        = DB::table('contents_package_shares')->orderBy('views', 'asc ')->take(6)->get();

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
        $package_contents_sum = 0;
        // packageId를 가지는 contents_pacage_share 가져옴
        $contentsPackageShare  = DB::table('contents_package_shares')->where('no',$package_id)->first();

        $contentsPackage       = DB::table('contents_packages')->where('no','=', $contentsPackageShare->contents_package)->first();

        // contents_package onwer컬럼과 일치하는 user 가져오기
        $user = DB::table('users')->where('no','=', $contentsPackage->owner)->first();
        // dd($contentsPackage->no);
        // 현재 콘텐츠에 포함된 콘텐츠
        $contents = DB::table('contents')->where('contents_package','=', $contentsPackage->no)->get();


        foreach($contents as $content){
            $package_contents_sum=$package_contents_avg + $content->avg;
            array_push($contentsName, array('name'=>$content->name,'id'=>$content->no));
        }
        dd($contents);
        $package_contents_avg = $package_contents_sum / sizeof($contents);

        return view('ProjectBlockCode.blockfactory.tool_share_detail')->with('package_id', $contentsPackageShare->no)
                                                     ->with('package_name',$contentsPackage->name )
                                                     ->with('package_img', $contentsPackageShare->img_url)
                                                     ->with('package_subs', $contentsPackageShare->explain)
                                                     ->with('write_date', $contentsPackageShare->created_at)
                                                     ->with('view', $contentsPackageShare->views)
                                                     ->with('writer', $user->name)
                                                     ->with('download_count', $contentsPackageShare->downloads)
                                                     ->with('contents_name', $contentsName)
                                                     ->with('package_avg',$package_contents_avg);

    }
    public function shareRegister(Request $request)
    {

    }
    public function shareShare(Request $request)
    {

      $teacher_packages       = DB::table('contents_packages')->where('owner',Auth::user()->no)->get();
      $teacher_packages_no = [];
      for($i = 0; $i<count($teacher_packages); $i++){
        $teacher_packages_no[$i] = $teacher_packages[$i]->no;
      }

      $teacher_contents = [];
      $arr = [];
      for($i = 0; $i<count($teacher_packages_no);$i++){
        $teacher_contents[$i] = DB::table('contents')->where('contents_package',$teacher_packages_no[$i])
                                                     ->where('copy',0)
                                                     ->get();

        for($j = 0; $j<count($teacher_contents[$i]);$j++){
          array_push($arr,$teacher_contents[$i][$j]);
        }
      }
      return view('ProjectBlockCode.blockfactory.tool_share_share')->with('teacher_contents', $arr);

    }

    public function shareDownload(Request $request)
    {
      $choices_no = $request->input('choice_content');
      $content_arr = [];
      foreach($choices_no as $no){
        $content = DB::table('contents')->where('no',$no)->first();

        array_push($content_arr,['no'=>$no,'name'=>$content->name]);
      }

      return view('ProjectBlockCode.blockfactory.tool_share_download')->with('choice_content', $content_arr);
      // $newPackageName = $request->input('new_package_name');
      // $packageName = $request->input('package_name');
      // $packageId = $request->input('package_id');
      // $contenstId = $request->input('contenst_id');
    }
    public function registerToPlan()
    {

      // dd(Auth::user()->no);
      //체험현장학습 리스트를 뽑아내는 쿼리
      $field_list_array   = [];
      $package_list_array = [];
      $teacher_no = Auth::user()->no;
      $field_lists = DB::table('field_learning_plans')->where('teacher','=',$teacher_no)->get();

      foreach($field_lists as $field_list){
        array_push($field_list_array, array('no'=>$field_list->no,'name'=>$field_list->name));
      }
      // dd($field_list_array);

      $packages = DB::table('contents_packages')->where('owner',$teacher_no)->get();

      foreach($packages as $package ){
        array_push($package_list_array,array('no'=>$package->no,'name'=>$package->name));
      }

      //교사가 가지고 있는 패키지를 담습니다.


      // $picnic = ['first'=>'경북궁','second'=>'왕릉','third'=>'첨성대'];
      return view('ProjectBlockCode.blockfactory.tool_confirm',
                [
                  'field_lists'=>$field_list_array,'package'=>$package_list_array,
                  'package_count'=>count($package_list_array),'field_count'=>count($field_list_array)
                ]);
    }



    public function registerToPlanDB(Request $request)
    {

      $packages = $request->input('package');
      $fields   = $request->input('field_list');
      // dd($fields);
      //현장체험 리스트를 담는 변수
      $planField = [];
      $planField_second = [];
      // dd($packages);
      // dd($fields);
      //패키지를 등록할 현장학습리스트를 추출한다
      for($i = 0; $i<10; $i++){
        if(array_key_exists($i, $packages)){
          array_push($planField,$fields[$i],$packages[$i]);
        }
      }
      $pack = count($packages);
      // dd(count($planField)-1);
      // dd($planField);
      // dd(count($pack));
      // dd($planField);
      // dd($packages);
      // dd($planField);
      for($i = 0 ; $i < count($planField)-1 ; $i++){
        //체험학습 리스트
        $fieldList  =   $planField[$i];
        // dd(count($planField));
        for($j = 0; $j < $pack; $j++){
          $package = $planField[$i+1][$j];
          DB::table('field_learning_plans')
                            ->where([
                              ['teacher','=', Auth::user()->no],
                              ['name', '=',$fieldList],
                            ])->update(['contents_package'=>$package]);
        }
      }
        // $package    =   $planField[$i+1]
          // DB::table('field_learning_plans')
          //             ->where('teacher',Auth::user()->no)
          //             ->where('name',$fields[$i])
          //             ->update(['contents_package'=>$packages[$i][$j]]);
        // }

      // for($i = 0; $i < $contents_xml_sizeof; $i++)
      // {
      //   DB::table('contents')->insert([
      //       ['spec' => $contents_mgs[$i], 'xml' => $contents_xml[$i], 'avg'=>0,'contents_package'=>2,'copy'=>0,'name'=>'070615']
      //   ]);
      //   //
      //   //
      // }
      echo "<script>window.close();</script>";
    }

    public function extractContents($package_id)
    {
      $contents_array = [];

      //패키지 번호에 해당하는 컨텐츠들을 가져온다
      $contents = DB::table('contents')->where('contents_package','=',$package_id)->get();
      if($contents){
            $contentsCount = count($contents);

            for($i = 0; $i<$contentsCount; $i++){
              $contents_array[$i]['name'] = $contents[$i]->name;
              $contents_array[$i]['id']   = $contents[$i]->no;
              $contents_array[$i]['xml']  = $contents[$i]->xml;
              $contents_array[$i]['spec'] = $contents[$i]->spec;
            }
            return $contents_array;

      }

    }

    public function storageNewContent(Request $request)
    {

        //패키지를 저장하기 위한, 패키지 이름
        $package_name = $request->package_name;

        //콘텐츠를 저장하기 위한, 콘텐츠 정보들
        $content_xml  = $request->xml;
        $content_spec = $request->spec;
        $content_name = $request->name;

        dd($contents_spec);
        $results = DB::select('select * from contents_packages where name = :name', ['name' => $package_name]);
        if($results){
          $package_key              = DB::table('contents_packages')->where('name','=', $package_name)->first();
          $contents_count   = DB::table('contents')->where('contents_package',$package_key->no)->get();
          $contents_count   = count($contents_count) + 1;

          $json = json_decode($content_spec,true);
          $json['number'] = $contents_count;
          $content_spec = json_encode($json);

          DB::table('contents')->insert([
              ['spec' => $content_spec, 'xml' => $content_xml, 'avg' => 0,
              'contents_package' => $package_key->no, 'copy' => 0,'name'=>$content_name]
          ]);

          return null;
        }else
        {
            //새로운 패키지를 저장한다
            DB::table('contents_packages')->insert([
                ['owner'=>Auth::user()->no,'name'=>$package_name]
            ]);
            //저장한 패키지의 primary key 값을 얻어온다
            $package_key = DB::table('contents_packages')->where('name','=', $package_name)->first();
            //정보들을 가지고 콘텐츠를 저장한다
            DB::table('contents')->insert([
                ['spec' => $content_spec, 'xml' => $content_xml, 'avg' => 0,
                'contents_package' => $package_key->no, 'copy' => 0,'name'=>$content_name]
            ]);
            //사용자의 패키지를 담을 배열 변수
            $package_array = [];
            //유저가 가지고 있는 패키지들을 가져온다
            $packages      = DB::table('contents_packages')->where('owner','=',Auth::user()->no)->get();

            //배열의 크기를 담는다
            $packageCount = count($packages);

            for($i = 0; $i<$packageCount;$i++){
              $package_array[$i]['name'] = $packages[$i]->name;
              $package_array[$i]['id']   = $packages[$i]->no;
            }
            return $package_array;
      }
    }

    public function sharePackages(Request $request)
    {
      $img_name   =   $request->file('image');

      // $imgUri = $request->file('image')->storeAs('historyImgs', "$historyNo-$substanceNo.png");

      //공유 패키지 이름
      $package_name    =  $request->input('package_name');
      $package_img     =  $request->file('package_image')->getClientOriginalName();


      //공유 패키지 이미지
      Storage::putFileAs('public/packageImgs', $package_img,Auth::user()->no);
      dd('이미지 저정 방법 알아보기');
      //공유 패키지 설명
      $explain         =  $request->input('package_explain');
      //공유 패키지를 구성할 콘텐츠
      $downContents    =  $request->input('downContents');

      //공유할 패키지를 새로 등록한다.
      DB::table('contents_packages')->insert([
          [
           'owner'  => Auth::user()->no,
           'name'   => $package_name,
           'explain'=> $explain
          ]
      ]);

      // 가장최근에 만든 콘텐츠 패키지
      $newContentsPackage = DB::table('contents_packages')->orderBy('no', 'desc')->first();

      // contents 추가
      for($i = 0; $i < sizeof($downContents); $i++) {
          $oldContents = DB::table('contents')->where('no', $downContents[$i])->first();

       // 새로운 콘텐츠패키지에 기존 콘텐츠 복사본이 생김
          DB::table('contents')->insert([
              ['name'=>$oldContents->name,'spec' => $oldContents->spec, 'xml' => $oldContents->xml, 'avg' => 0, 'contents_package' => $newContentsPackage->no, 'copy' => 1]
          ]);
      }

      DB::table('contents_package_shares')->insert([
          ['contents_package' => $newContentsPackage->no, 'img_url' => "packageImgs/$package_name.png", 'explain' => $explain, 'views' => 0, 'downloads' => 0]
      ]);
      // Input::file('picture')->move($destinationPath, $img);

     echo "<script>window.close();</script>";
    }


    public function downloadShareContent(Request $request)
    {
      // 선생님이 새로운 패키지에 컨텐츠를 저장 할려고 하는 경우
      // dd($request->input());
      $user        = Auth::user()->no;
      if($request->input('new_package')){
        $package     = $request->input('new_package');
        $contents    = $request->input('content');
        $content_arr = [];

        DB::table('contents_packages')->insert([
                                                  'owner'=>$user,'name'=>$package
                                               ]);
        $new_package    =    DB::table('contents_packages')->orderBy('no', 'desc')->first();

        //다운받으려는 콘텐츠의 spec, xml을 저장하기 위함
        for($i = 0; $i<count($contents); $i++){
          $content_arr[$i]=DB::table('contents')->where('no',$contents[$i])->first();
        }
        //새로운 컨텐츠 패키지를 갖는 컨텐츠들을 저장한다.
        for($i = 0; $i<count($content_arr); $i++){
          DB::table('contents')->insert([
            'spec'=>$content_arr[$i]->spec,'xml'=>$content_arr[$i]->xml,'avg'=>0,
            'contents_package'=>$new_package->no,'copy'=>0,'name'=>$content_arr[$i]->name
          ]);
        }
        echo "<script>opener.parent.location.reload();window.close();</script>";
      }
      //선생님이 자신이 가지고 있는 패키지에 콘텐츠를 저장 할려고 하는 경우
      else{
        $package_num      = $request->input('package_name');
        $content          = $request->input('content');
        $contents_infor   = [];

        //자신의 패키지에 다운받으려먼 콘텐츠의 정보들을 가져온다.
        for($i=0; $i<count($content); $i++){
          $contents_infor[$i] = DB::table('contents')->where('no',$content[$i])->first();
        }

        //자신의 패키지에 콘텐츠를 저장한다.
        for($i=0; $i<count($contents_infor); $i++){
          DB::table('contents')->insert([
            'spec'=>$contents_infor[$i]->spec,'xml'=>$contents_infor[$i]->xml,'avg'=>0,
            'contents_package'=>$package_num,'copy'=>0,'name'=>$contents_infor[$i]->name
          ]);
        }
        echo "<script>opener.parent.location.reload();window.close();</script>";

      }

    }

    public function searchContents(Request $request)
    {
      $searchWord = $request->searchWord1;

      $result_array = [];

      $result = DB::table('contents_package_shares')->where('explain',$searchWord)->first();
      array_push($result_array,$result);

      $package_serial = $result->contents_package;

      $package_name = DB::table('contents_packages')->where('no',$package_serial)->first();
      array_push($result_array,$package_name->name);



      return $result_array;
    }
}
