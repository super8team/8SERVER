@extends('master')

@section('title','소감문 보기')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
            {{-- 제목 가저오기 --}}
            {{ $report_title }}
            소감문 데스
        </div>
        <div class="panel-body" style="min-height:500px">
          <div class="col-sm-12">
            {{-- 내용 표시 칸 --}}
            {{ $report_text}}
          </div>
        </div>
        <a href="{{route('report_list',$plan_no)}}"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          뒤로 가기
        </a>
      </div>
    </div>
  </div>
@endsection
