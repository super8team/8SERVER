@extends('master')

@section('title','가정 통신문 작성')

@section('content')
  <script type="text/javascript">
  $(document).ready(function(){
    var check = 0;
  //최상단 체크박스 클릭
  $(document).on('click',"#checkall",function(){
    //클릭되었으면
    if(check == 0){
        //input태그의 name이 filter인 태그들을 찾아서 checked옵션을 true로 정의
        $("input[name=filter]").prop("checked",true);
        check = 1;
        //클릭이 안되있으면
    }else{
        //input태그의 name이 filter인 태그들을 찾아서 checked옵션을 false로 정의
        $("input[name=filter]").prop("checked",false);
        check = 0;
    }
  });  
});

  </script>
  @php
    //컨트롤러에서 보내는 정보
    // 반 갯수
    $class_count = 5;
    //학생정보
    //students[no][class][name]
  @endphp
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{route('group.store',$plan_no)}}" method="POST">
        {{ csrf_field() }}
        <div class="well">
          @for ($i=0; $i < $class_count ; $i++)
            <label class="checkbox-inline">
              <input type="checkbox" value="{{$i}}" name="filter"> {{$i+1}}
            </label> 
          @endfor
          <button class="btn btn-sm btn-default pull-right" type="button" id="checkall" name="select_all_btn">
            전체선택
          </button>
          <button class="btn btn-sm btn-default pull-right" type="button" id="filter_btn">
            체크한 반 학생 리스트 가져오기
          </button>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              {{-- 필터링 할 항목 만들기 --}}
              
            </div>
            <input type="hidden" name="plan_no" value="{{$plan_no}}">
              <button type="btnSubmit" aria-label="Right Align"
              class="btn btn-sm btn-default pull-right " style="margin-right:15px; margin-top20px;">
               {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
               수정완료
             </button>
             <a  href="{{route('group_list',$plan_no)}}" role="button" class="btn btn-sm btn-default margin-right-10 pull-right">
               {{-- <span class="glyphicon glyphicon-open-file"></span> --}}
               뒤로 가기
             </a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
