@extends('master')

{{-- TODO 뭔가 이름 바꾸는거 변수로 한페이지에서 관리하려면? -> --}}
@section('title' , 'LEARnFUN')

@section('content')
<head>
    <script src="../public/js/parallax.js"></script>
    {{-- <script src="js/custum.js"></script> --}}
  </head>
  {{-- 로그인에 따른 접속 에러 --}}
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script> --}}
  {{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> --}}
  <script type="text/javascript">
    // toastr.info("토스트");
    var log = "{{Session::get('fail')}}";
    if (log != "")
    alert(log);
  </script>
@php
$lang = 'kr';
  if($lang == 'kr'){
    $lang_learnfun      = 'LEARnFUN';
    $lang_learnfun_sub  = '학부모, 교사, 학생을 위한 현장 체험학습 서비스';
    $lang_parent        = '학부모';
    $lang_parent_sub    = '가정통신문, 설문,위원회 이용';
    $lang_teacher       = '교사';
    $lang_teacher_sub   = '서류 자동선택 현장체험학습 계획 만들기';
    $lang_student       = '학생';
    $lang_student_sub   = '학생이 즐기는 미션, 소감문 작성';
    $lang_shortcut      = '바로가기';
  }
  
  if($lang == 'jp'){
    $lang_learnfun      = 'LEARnFUN';
    $lang_learnfun_sub  = '父兄、教師、学生ための体験学習サービス。';
    $lang_parent        = '父兄';
    $lang_parent_sub    = 'お知らせ、アンケート、委員会';
    $lang_teacher       = '教師';
    $lang_teacher_sub   = '書類自動作成、体験学習スケージュール作成。';
    $lang_student       = '学生';
    $lang_student_sub   = '学生が楽しめるミッション, 感想文作成。';
    $lang_shortcut      = '詳しくは';
  }
@endphp
    {{-- 타이틀 이미지  --}}
       <div class="carousel-inner" role="listbox">
         <div class=" parallax-window" data-parallax="scroll" data-image-src="{{asset('img/titleimg.jpg')}}"
         style="height:500px;width:101%;">
          {{-- 캐러셀 css 나중에 폰트 찾으면 수정 --}}
           <div class="carousel-caption">
             <img src="{{asset('img/logo.png')}}" alt="img load fail" style="width:400px;height:300px">
             <h1>{{$lang_learnfun}}</h1>
             {{$lang_learnfun_sub}}
           </div>
         </div>
       </div>
  {{-- 교사 학부모 학생 구간 --}}
  <section id="services" class="section blue">
     <div class="container" >
       <div class="row text-center">
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box">
               <br>
               <a href="{{route('plan.parents')}}">
                 <img class="img-circle" src="{{asset('img/familly01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200x;">
               </a>
               <h2>{{$lang_parent}}</h2>
               <p>{{$lang_parent_sub}}</p>
               <p><a class="btn btn-default" href="{{route('plan.parents')}}" role="button">{{$lang_shortcut}} &raquo;</a></p>
             </div><!-- /.col-sm-4 -->
           </div>
         </div>
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
              <br>
              <a href="{{route('plan.teacher')}}">
              <img class="img-circle" src="{{asset('img/teacher01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200px;">
              </a>
              <h2>{{$lang_teacher}}</h2>
              <p>{{$lang_teacher_sub}}</p>
              <p><a class="btn btn-default" href="{{route('plan.teacher')}}" role="button">{{$lang_shortcut}} &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
               <br>
               <a href="{{route('plan.student')}}">
               <img class="img-circle" src="{{asset('img/student01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200px;">
               </a>
               <h2>{{$lang_student}}</h2>
               <p>{{$lang_student_sub}}</p>
               <p><a class="btn btn-default" href="{{route('plan.student')}}" role="button">{{$lang_shortcut}} &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
       </div><!-- /.row -->
     </div>
   </section>
@endsection
