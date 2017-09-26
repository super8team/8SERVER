@extends('master')

@section('title','感想文作成')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{ route('report.store') }}" method="POST">
        {{csrf_field()}}
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="text" class="form-control" name="report_title" placeholder="感想文タイトルを入力してください">
              </div>
            </div>
          </div>
          <div class="panel-body  panel-custom">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" rows="25" name="report_text" placeholder="内容を入力してください"></textarea>
              </div>
            </div>
              <button href="#" type="btnSubmit" aria-label="Right Align"
              class="btn btn-sm btn-default pull-right" style="margin-right:15px; margin-top20px;">
               {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
               作成完了
             </button>
             <a href="javascript:history.back()"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
               {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
               戻る
             </a>
          </div>
          <input type="hidden" name="plan_no" value="{{$plan_no}}">
        </div>
      </form>
    </div>
  </div>
@endsection
