@extends('master')

@section('title','感想文見る')

@section('content')

  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form " action="{{route('report_evaluation')}}">
        {{csrf_field()}}
      <div class="panel panel-default">
          <div class="panel-heading">
            {{-- 제목 가저오기 --}}
            {{ $report_title }}
            <div class="col-sm-7">
              <h4>感想文評価</h4>

            </div>
            <div class="input-group">
              <input type="text" class="form-control pull right col-sm-3 col-sm-offset-12" name="report_score" placeholder="点数を入力してください" value="">
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
          戻る
        </a>
        <button type="btnSubmit" role="btnsubmit" class="btn btn-sm btn-default margin-right-10 pull-right">
          {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
          評価完了
        </button>
      </div>
      <input type="hidden" name="report_no" value="{{$report_no}}">
    </form>
    </div>
  </div>
@endsection
