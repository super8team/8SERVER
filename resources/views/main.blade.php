@extends('master')

{{-- TODO 뭔가 이름 바꾸는거 변수로 한페이지에서 관리하려면? -> --}}
@section('title' , 'LEAN&FUN')

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

    {{-- 타이틀 이미지  --}}
       <div class="carousel-inner" role="listbox">
         <div class=" parallax-window" data-parallax="scroll" data-image-src="{{asset('img/titleimg.jpg')}}"
         style="height:500px;width:101%;">
          {{-- 캐러셀 css 나중에 폰트 찾으면 수정 --}}
           <div class="carousel-caption">
             <img src="{{asset('img/logo.png')}}" alt="로고자리야 으앙아앙아" style="width:400px;height:300px">
             <h1>LEARnFUN</h1>
             학부모, 교사, 학생을 위한 현장체험 학습 관련 서비스.
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
               <img class="img-circle" src="{{asset('img/familly01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200x;">
               <h2>학부모</h2>
               <p>가정통신문, 설문</p>
               <p><a class="btn btn-default" href="{{route('plan.parents')}}" role="button">상세보기 &raquo;</a></p>
             </div><!-- /.col-sm-4 -->
           </div>
         </div>
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
              <br>
              <img class="img-circle" src="{{asset('img/teacher01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200px;">
              <h2>교사</h2>
              <p>서류 자동선택 현장체험학습 계획 만들기</p>


              <p><a class="btn btn-default" href="{{route('plan.teacher')}}" role="button">상세보기 &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
               <br>
               <img class="img-circle" src="{{asset('img/student01.jpg')}}" alt="Generic placeholder image" style="width: 200px; height: 200px;">
               <h2>학생</h2>
               <p>학생이 즐기는 컨텐츠 </p>
               <p><a class="btn btn-default" href="{{route('plan.student')}}" role="button">상세보기 &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
       </div><!-- /.row -->
     </div>
   </section>
@endsection
