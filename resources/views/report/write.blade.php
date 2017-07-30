@extends('master')

@section('title','소감문 작성')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{ route('report.store') }}">
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="text" class="form-control" name="report_title" placeholder="소감문 제목을 입력해주세요 ">
              </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" rows="25" name="report_text" placeholder="내용을 입력해 주세요"></textarea>
              </div>
            </div>
              <button href="#" type="btnSubmit" aria-label="Right Align"
              class="btn btn-sm btn-default pull-right" style="margin-right:15px; margin-top20px;">
               {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
               작성 완료
             </button>
             <a href="javascript:history.back()"role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
               {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
               뒤로 가기
             </a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
