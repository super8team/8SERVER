<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\getParameter;
header('Content-Type: text/xml');
class UserController extends Controller {

    public function index(Request $request) {

        $inputId = $request->input('id');
        $inputPw = $request->input('password');
        if($inputId== 'duswp' ||$inputPw=='1') {
            $request->session()->put('id', $inputId);
            $request->session()->put('pass', $inputPw);

            return view('ProjectBlockCode.blockfactory.block',['id'=>$inputId]);
        }else if($inputId='tngus' || $inputPw=='1'){
            $request->session()->put('id',$inputId);
            $request->session()->put('pass',$inputPw);

            return view('ProjectBlockCode.blockfactory.block',['id'=>$inputId]);
        }
        else{
            return;
        }
        // var_dump($request->session()->get('id'));
    }
    public function contentDetail(Request $request){
        //적용!!!
        // $users = App\User::where('active', 1)->get();
        //
        // foreach ($users as $user) {
        //   echo $user->name;
        // }

        $package_id = $request['package_id'];


        return view('ProjectBlockCode.blockfactory.tool_share_detail',['id'=>$package_id]);

        // return $request['xml'];
    }

    public function blockMain(){
        $xml =   '<xml xmlns="http://www.w3.org/1999/xhtml">'.
            '<block type="factory_base" id="jsJbcVlNT:#E9,M-7V(1" deletable="false" movable="false" x="0" y="0">'.
            '<mutation connections="null"></mutation>'.
            '<field name="NAME">fef</field>'.
            '<value name="VERTICAL">'.
            '<block type="vertical" id="5VQix4TOuX6BV_lv^#;r" deletable="false">'.
            '<field name="VERTICAL"></field>'.
            '</block>'.
            '</value>'.
            '<value name="HORIZONTAL">'.
            '<block type="horizontal" id="C)e#DB8cz`+Bo-9o4~0[" deletable="false">'.
            '<field name="HORIZONTAL"></field>'.
            '</block>'.
            '</value>'.
            '<value name="VISIONABLE">'.
            '<block type="logic_boolean" id="e@4|/*}pCo~#aYE8Fr15" deletable="false">'.
            '<field name="BOOL">TRUE</field>'.
            '</block>'.
            '</value>'.
            '<value name="C?LICKABLE">'.
            '<block type="logic_boolean" id="d[._igq{x2w7zubn4[Af" deletable="false">'.
            '<field name="BOOL">FALSE</field>'.
            '</block>'.
            '</value>'.
            '<value name="DISABLE">'.
            '<block type="logic_boolean" id="nDYlY2Z{v$2K|XI`c5T^">'.
            '<field name="BOOL">TRUE</field>'.
            '</block>'.
            '</value>'.
            '</block>'.
            '</xml>';
        $ownerContents = ['fef'=>$xml];
        // $packages      = ['first','second','third'];
        // $name ='dropdown_second';
        // $xml = '<xml xmlns="http://www.w3.org/1999/xhtml">'.
        //   '<block type="factory_base" id="jsJbcVlNT:#E9,M-7V(1" deletable="false" movable="false" x="0" y="0">'.
        //   '<mutation connections="null"></mutation>'.
        //   '<field name="NAME">fef</field>'.
        //   '<value name="VERTICAL">'.
        //     '<block type="vertical" id="5VQix4TOuX6BV_lv^#;r" deletable="false">'.
        //       '<field name="VERTICAL"></field>'.
        //     '</block>'.
        //   '</value>'.
        //   '<value name="HORIZONTAL">'.
        //     '<block type="horizontal" id="C)e#DB8cz`+Bo-9o4~0[" deletable="false">'.
        //       '<field name="HORIZONTAL"></field>'.
        //     '</block>'.
        //   '</value>'.
        //   '<value name="VISIONABLE">'.
        //     '<block type="logic_boolean" id="e@4|/*}pCo~#aYE8Fr15" deletable="false">'.
        //       '<field name="BOOL">TRUE</field>'.
        //     '</block>'.
        //   '</value>'.
        //   '<value name="CLICKABLE">'.
        //     '<block type="logic_boolean" id="d[._igq{x2w7zubn4[Af" deletable="false">'.
        //       '<field name="BOOL">FALSE</field>'.
        //     '</block>'.
        //   '</value>'.
        //   '<value name="DISABLE">'.
        //     '<block type="logic_boolean" id="nDYlY2Z{v$2K|XI`c5T^">'.
        //       '<field name="BOOL">TRUE</field>'.
        //     '</block>'.
        //   '</value>'.
        //   '</block>'.
        //   '</xml>';
        return view('ProjectBlockCode.blockfactory.block',['ownerContents'=>$ownerContents]);

    }

    public function plist(){
        // $users = App\User::where('active', 1)->get();
        //
        // foreach ($users as $user) {
        //   echo $user->name;
        // }

        $cons = ['first','second','third'];
        return view('ProjectBlockCode.blockfactory.block',['cons'=>$cons]);
    }


    public function home(Request $request){
        // $users = App\User::where('active', 1)->get();
        //
        // foreach ($users as $user) {
        //   echo $user->name;
        // }
        // '현장체험학습 장소 :'.$request['name'].'명세:'.$request['myungse'];
        return '넘어온 데이터 db에 저장하도 창 닫기';
    }

    public function tool_share()
    {
        // $users = App\User::where('active', 1)->get();
        //
        // foreach ($users as $user) {
        //   echo $user->name;
        // }
        $popularPackageNames = ['1.src'=>['id'=>'1'],'2.src'=>['id'=>'2'],'3.src'=>['id'=>'3']];
        $mainPackageName     = ['package1','package2','package3'];

        $serbPackageNames = ['1.src'=>['id'=>'1'],'2.src'=>['id'=>'2'],'3.src'=>['id'=>'3']];
        $serbPackageName  = ['package4','package5','package6'];

        //src => packageName
        return view('ProjectBlockCode.blockfactory.tool_share_main',
            ['popularPackageNames'=>$popularPackageNames,
                'serbPackageNames'=>$serbPackageNames,
                'serbPackageName'=>$serbPackageName,
                'mainPackageName'=>$mainPackageName
            ]);
    }

    public function share(){
        return view('ProjectBlockCode.blockfactory.tool_share_share');
    }

    public function store(Request $request){
        // $package_name  =  $_GET['content_xml_num0'];

        $name         = $_GET['contents_name'];

        for($i = 0 ; $i < count($name) ; $i++){
            if($name[$i])
            {

            }
        }

    }
    //
    // public function packcon(Request $request){
    //   // $pid = $request['pid'];
    //   $name ='hihi';
    //   $xml = '<xml xmlns="http://www.w3.org/1999/xhtml">'.
    //     '<block type="factory_base" id="jsJbcVlNT:#E9,M-7V(1" deletable="false" movable="false" x="0" y="0">'.
    //     '<mutation connections="null"></mutation>'.
    //     '<field name="NAME">fef</field>'.
    //     '<value name="VERTICAL">'.
    //       '<block type="vertical" id="5VQix4TOuX6BV_lv^#;r" deletable="false">'.
    //         '<field name="VERTICAL"></field>'.
    //       '</block>'.
    //     '</value>'.
    //     '<value name="HORIZONTAL">'.
    //       '<block type="horizontal" id="C)e#DB8cz`+Bo-9o4~0[" deletable="false">'.
    //         '<field name="HORIZONTAL"></field>'.
    //       '</block>'.
    //     '</value>'.
    //     '<value name="VISIONABLE">'.
    //       '<block type="logic_boolean" id="e@4|/*}pCo~#aYE8Fr15" deletable="false">'.
    //         '<field name="BOOL">TRUE</field>'.
    //       '</block>'.
    //     '</value>'.
    //     '<value name="CLICKABLE">'.
    //       '<block type="logic_boolean" id="d[._igq{x2w7zubn4[Af" deletable="false">'.
    //         '<field name="BOOL">FALSE</field>'.
    //       '</block>'.
    //     '</value>'.
    //     '<value name="DISABLE">'.
    //       '<block type="logic_boolean" id="nDYlY2Z{v$2K|XI`c5T^">'.
    //         '<field name="BOOL">TRUE</field>'.
    //       '</block>'.
    //     '</value>'.
    //     '</block>'.
    //     '</xml>';
    //   return view('ProjectBlockCode.blockfactory.block',['xml'=>$xml,'name'=>$name]);
    // }
    public function download(Request $request){

        $package_primary = $request['package_num'];
        //패키지 프라이머리키를 가지고 있는 컨텐츠들을 디비를 통해서 불러온다.
        //그러면 컨텐츠 번호, 이름

        $contents        = ['1'=>'happy','2'=>'execellent'];

        return view('ProjectBlockCode.blockfactory.tool_share_download',['contents'=>$contents]);

        // 이것은!  download창에서 선택한 컨텐츠들의 아이디 값을 받아와서 패키지에 추가 해 준다
    }

    public function newPackage(Request $request){
        // var_dump($request);
        if($request->input('new_package')){
            $package_name    = $request->input('new_package');
            $choice_contents = $request->input('content');


            for($i=0;$i<count($choice_contents);$i++){
                $content_name[$i] = $choice_contents[$i];
                print_r("패키지에 추가 할 콘텐츠 이름");
                print_r($content_name[$i]);
            }
        }
        if($request->input('package_name')){
            $package_name    = $request->input('package_name');
            $choice_contents = $request->input('content');
            print_r($package_name);
            for($i=0;$i<count($choice_contents);$i++){
                $content_name[$i] = $choice_contents[$i];
                print_r("패키지에 추가 할 콘텐츠 이름");
                print_r($content_name[$i]);
            }
        }

        //새로 생성한 패키지이름과 그 패키지에 담을 컨텐츠들 추출
    }
}
?>