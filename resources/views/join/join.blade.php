@extends('master')

@section('title' , 'LEAN&FUN')

@section('content')
  @php
  $join_parent = "http://localhost/Code/8SERVER/public/joinparent";
  $join_teacher = "http://localhost/Code/8SERVER/public/jointeacher";
  $join_student = "http://localhost/Code/8SERVER/public/joinstudent";
  @endphp
<head>
    <script src="../public/js/parallax.js"></script>
    {{-- <script src="js/custum.js"></script> --}}
  </head>
    {{-- 타이틀 이미지  --}}
       <div class="bluedecobar">

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
               <p><a class="btn btn-default" href="{{$join_parent}}" role="button">상세보기 &raquo;</a></p>
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
              <p><a class="btn btn-default" href="{{$join_teacher}}" role="button">상세보기 &raquo;</a></p>
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
               <p><a class="btn btn-default" href="{{$join_student}}" role="button">상세보기 &raquo;</a></p>
             </div>
           </div>
         </div><!-- /.col-sm-4 -->
       </div><!-- /.row -->
     </div>
   </section>
@endsection
