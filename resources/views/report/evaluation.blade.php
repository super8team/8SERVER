@extends('master')

@section('title','소감문 보기')

@section('content')
  @php
    $report_list = "http://localhost/Code/8SERVER/public/reportlist";
  @endphp
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form " action="{{----}}" method="post">
      <div class="panel panel-default">
          <div class="panel-heading">
            {{-- 제목 가저오기 --}}
            {{-- $notice_title --}}
            <div class="col-sm-7">
              <h4>소감문 평가 데스</h4>

            </div>
            <div class="input-group">

              <input type="text" class="form-control pull right col-sm-3 col-sm-offset-12" name="grade" placeholder="점수를 입력해주세요" value="">
            </div>
          </div>
        <div class="panel-body" style="min-height:500px">
          <div class="col-sm-12">
            {{-- 내용 표시 칸 --}}
            {{-- $notice_--}}
            으아ㅏ아아아아 내용내용내용내용내용내용내용내용내용내용내용내용내용내용내내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            으아ㅏ아아아아 내용내용내용내용내용내용내용내용내용내용내용내용내용내용내내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            으아ㅏ아아아아 내용내용내용내용내용내용내용내용내용내용내용내용내용내용내내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            으아ㅏ아아아아 내용내용내용내용내용내용내용내용내용내용내용내용내용내용내내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            으아ㅏ아아아아 내용내용내용내용내용내용내용내용내용내용내용내용내용내용내내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
            내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용내용
          </div>
        </div>
        <a href="{{route('report')}}"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          뒤로 가기
        </a>
        <a href="{{route('report')}}"role="btnsubmit" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          평가 완료
        </a>
      </div>
    </form>
    </div>
  </div>
@endsection
