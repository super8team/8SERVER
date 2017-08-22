@extends('master')

@section('title','가정 통신문 보기')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
            {{-- 제목 가저오기 --}}
            {{ $notice_title }}
            
        </div>
        <div class="panel-body" style="min-height:500px">
          <div class="col-sm-12">
            {{-- 내용 표시 칸 --}}
            {{ $notice_text}}
            
          </div>
        </div>
        @php
        $user_info = Auth::user();
        
        if($user_info['type'] == 'student'){
          $back_route = 'plan.student';
        }elseif ($user_info['type'] == 'teacher'){
          $back_route = 'plan.student';
        }else{
          $back_route = 'plan.parents';
        }              
        @endphp
        <a href="{{route('notice_list',$plan_no)}}"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          뒤로 가기
        </a>
      </div>
    </div>
  </div>
@endsection
