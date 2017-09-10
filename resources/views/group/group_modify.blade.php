@extends('master')

@section('title','그룹 수정')

@section('content')
  <script type="text/javascript">
  $(document).ready(function(){
    var check  = false;
    var check2 = false;

  //필터링 장소 섵택
  //필터링 장소 전체 선택
  $(document).on('click',"#checkall",function(){
    //클릭되었으면
    if(check == false){
        //input태그의 name이 filter인 태그들을 찾아서 checked옵션을 true로 정의
        $("input[name=group]").prop("checked",true);
        check = true;
        //클릭이 안되있으면
    }else{
        //input태그의 name이 filter인 태그들을 찾아서 checked옵션을 false로 정의
        $("input[name=group").prop("checked",false);
        check = false;
    }
  });
  //목록 불러오기
  // $(document).on('click',"#load_student",function(){
  //   if($("input[name=filter_class]").prop("checked",true)){
  //     select_chkbox();
  //   }
  // });

  //리스트뽑기
  //체크된 반 체크
  //UI 생성
  //생성된 학생들 전체 선택
  //서브밋

  // 사용 함수
  //처음 학생 리스트를 뽑는 함수
  function select_chkbox() {
    //체크된 항목 검사

    //이름을 이용해서 filter 크기를 알아내기

      // $student[0]['no']       = 12
      // $student[0]['class']    = 1
      // $student[0]['name']     = '김개똥'

      //체크된 값의 정보를 가저옴

      //체크된 정보와 비교하여 해당 값을 가져옴

      // for(var i = 0; i < size; i++){
      //     for (var t = 0; t < [i]; t++) {
      //         $('create_zone').append(
      //           "<tr>"+
      //           "<td>"+1+"</td>"+
      //           "<td>"+1+"</td>"+
      //           "<td>"+1+"</td>"+
      //           "<label class='checkbox-inline'>"+
      //             "<input type='checkbox' value='"+1+"' name='std_select[]'>"+1+"반"+
      //           "</label>"+
      //           "</tr>"
      //         );
      //     }
      //
      // }
      }
    });




  </script>
  @php
    //컨트롤러에서 보내는 정보
    // 반 갯수

    //학생정보
    //students[no][class][name]
  @endphp
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{route('group_create',$plan_no)}}">
        {{ csrf_field() }}
        <div class="well">
          年生選択
          @for ($i=0; $i < $grade_count; $i++)
            <label class="checkbox-inline">
              <input type="radio" value="{{$i+1}}" name="filter_grade"> {{$i+1}}年生&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
          @endfor


          <button class="btn btn-sm btn-default pull-right" type="btnSubmit">
            チェックしたクラスの生徒リスト取る
          </button>
          <br>
          班別にフィルタリング
          @for ($i=0; $i < $class_count ; $i++)
            <label class="checkbox-inline">
              <input type="checkbox" value="{{$i+1}}" name="filter_class[]"> {{$i+1}}クラス&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
          @endfor
        </div>
        <input type="hidden" name="grade_class" value="{{$grade_class_no[$i]}}">
      </form>
      <form class="form" action="{{route('group.store')}}">
      <div class="panel panel-default">
        <div class="panel-heading">
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
          <h3 class="panel-title">生徒取る
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             バック
           </a>
           <a role="button" href="{{route('group.store',$plan_no)}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            参加者の確定
          </a>
          <button class="btn btn-sm btn-default pull-right" type="button" id="checkall" name="select_all_btn">
            全体選択
          </button>
         </h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <th>#</th>
              <th>クラス</th>
              <th>名前</th>
            </thead>
            <tbody>
              @if ($student_no)
                @for ($i=0; $i <count($student_no) ; $i++)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$student_class[$i]}}</td>
                    <td>{{$student_name[$i]}}
                      <input type="checkbox" name="group" value="{{$student_no[$i]}}">
                    </td>
                  </tr>
                @endfor
              @else
                <tr>
                  <td>000</td>
                  <td>上の機能を使用して生徒</td>
                  <td>リストを抜いてください</td>
                </tr>
              @endif
            </tbody>
          </table>
          <input type="hidden" name="plan_no" value="{{$plan_no}}">
        </div>
      </div>
    </form>
      </div>
  </div>

@endsection
