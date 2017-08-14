@extends('master')

@section('title','소감문 보기')

@section('content')

  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form " action="{{route('report_evaluation',$report_no)}}">
        {{csrf_field()}}
      <div class="panel panel-default">
          <div class="panel-heading">
            {{-- 제목 가저오기 --}}
            {{ $report_title }}
            <div class="col-sm-7">
              <h4>소감문 평가 데스</h4>

            </div>
            <div class="input-group">
              <input type="text" class="form-control pull right col-sm-3 col-sm-offset-12" name="report_score" placeholder="점수를 입력해주세요" value="">
            </div>
          </div>
        <div class="panel-body" style="min-height:500px">
          <div class="col-sm-12">
            {{-- 내용 표시 칸 --}}
            {{ $report_text }}
            
          </div>
          <input type="hidden" name="plan_no" value="{{$plan_no}}">
        </div>
        <a href="{{route('report.index',$plan_no)}}"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          뒤로 가기
        </a>
        <a href="{{route('report_evaluation')}}"role="btnsubmit" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          평가 완료
        </a>
      </div>
      <input type="hidden" name="report_no" value="{{$report_no}}">
    </form>
    </div>
  </div>
@endsection
