@extends('master')

@section('title','가정 통신문 작성')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{route('notice.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="text" class="form-control" name="notice_title"  placeholder="가정 통신문 제목을 입력해주세요 ">
              </div>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="simekiri"  placeholder="기한 입력">
              </div>
            </div>
          </div>
          <div class="panel-body  panel-custom">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" rows="25" name="notice_text" placeholder="내용을 입력해 주세요"></textarea>
              </div>
            </div>
            <input type="hidden" name="plan_no" value="{{$plan_no}}">
              <button type="btnSubmit" aria-label="Right Align"
              class="btn btn-sm btn-default pull-right " style="margin-right:15px; margin-top20px;">
               {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
               작성 완료
             </button>
             <a  href="{{route('notice_list',$plan_no)}}" role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
               {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
               뒤로 가기
             </a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
