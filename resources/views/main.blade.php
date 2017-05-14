@extends('master')

{{-- TODO 뭔가 이름 바꾸는거 변수로 한페이지에서 관리하려면? -> --}}
@section('title' , 'LEAN&FUN')

@section('content')
  @php
    $planlist = "http://localhost/Code/8SERVER/public/planlist";
  @endphp
<head>
    <script src="../public/js/parallax.js"></script>
    {{-- <script src="js/custum.js"></script> --}}
  </head>
    {{-- 타이틀 이미지  --}}
       <div class="carousel-inner" role="listbox">
         <div class=" parallax-window" data-parallax="scroll" data-image-src="../public/img/titleimg.jpg"
         style="height:500px;width:101%;">
          {{-- 캐러셀 css 나중에 폰트 찾으면 수정 --}}
           <div class="carousel-caption">
             <img src="https://image-proxy.namuwikiusercontent.com/r/https%3A%2F%2Ftgd.kr%2Ffiles%2Fattach%2Fimages%2F248844%2F852%2F473%2F8a9deaef5fb4817b39f253cbafa79105.png" alt="로고자리야 으앙아앙아">
             <h1>LEARnFUN</h1>
          leleleelel
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
               <img class="img-circle" src="../public/img/familly01.jpg" alt="Generic placeholder image" style="width: 200px; height: 200x;">
               <h2>학부모</h2>
               <p>가정통신문, 설문</p>
               <p><a class="btn btn-default" href="#" role="button">상세보기 &raquo;</a></p>
             </div><!-- /.col-sm-4 -->
           </div>
         </div>
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
              <br>
              <img class="img-circle" src="../public/img/teacher01.jpg" alt="Generic placeholder image" style="width: 200px; height: 200px;">
              <h2>교사</h2>
              <p>서류 자동선택 현장체험학습 계획 만들기</p>
              <p><a class="btn btn-default" href="{{$planlist}}" role="button">상세보기 &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
         <div class="col-sm-4">
           <div class="span3">
             <div class="service-box ">
               <br>
               <img class="img-circle" src="../public/img/student01.jpg" alt="Generic placeholder image" style="width: 200px; height: 200px;">
               <h2>학생</h2>
               <p>학생이 즐기는 컨텐츠 </p>
               <p><a class="btn btn-default" href="#" role="button">상세보기 &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
       </div><!-- /.row -->
     </div>
   </section>
@endsection
