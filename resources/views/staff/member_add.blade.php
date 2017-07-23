
@extends('master')

@section('title','위원회 관리')

@section('content')

  <script type="text/javascript">
  $(document).ready(function(){
      // 1 검색

    $(document).on("click","#searchBtn",function search(){
      $("#search").find('tr').remove();
      @for ($i=0; $i < 5; $i++)
        $("#search").append(
        "<tr><td>"+
        "이름<input type='checkbox' name='add[]' value='각각이름'>"+
        "<input type='hidden' name='name_id[]' value='{{$i}}'>"+
        "</td></tr>")
      @endfor

    });
    // 1- 2 검색후 조건이 있을경우 div를 비움
    // 1- 3 없을경우 안내 멘트


    // 2 대기
    // 2-1 대기자들은 체크박스로 구분
    // 2-2 버튼을 누르면 체크된 항목은 지워지고 추가할 목록에 표시

    //3
  });
  </script>
  <div class="bluedecobar">

  </div>
  <style media="screen">
    .panel-heading{
      height: 55px;
    }
    .panel-body{
      min-height: 300px;
    }
    .scrollspy {
      position: relative;
      height: 200px;
      overflow: auto;
    }
    .body {
      position: relative;
    }

  </style>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{route('staff.memberadd')}}" method="POST">
        {{ csrf_field() }}
        <div class="col-lg-5">
          <div class="panel panel-default">
            <div class="panel-heading">

                <div class="form-group col-sm-9">
                  <input type="text" class="form-control" placeholder="이름을 검색 해주세요">
                </div>

                  <button type="button" id="searchBtn" class="btn btn-default">검색</button>

            </div>

            <div class="clearfix"></div>
            <div class="panel-body scrollspy">
              {{-- Step 1 :검색 --}}

              {{-- Step 2 : 데이터 추가
                   검색 안 했을시 담당 반의 학생의 학부모 출력
                   담당 반이 없는 교사의경우 .. 아몰랑

              --}}
              <table id="search"class="table table-bordered table-hover">
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td>
                      박성원
                      {{--<input type="checkbox" name="staff_name[]" value="각각이름">--}}
                      <input type="hidden" name="staff_id[]" value="숫자">
                    </td>
                  </tr>
                @endfor
                {{-- 서버에서 추가된 이름 과 아이디를 저장한다. --}}
              </table>
              {{-- Step 3 : 선택 --}}
            </div>
          </div>
        </div>

        {{-- Step 4 : 이동 --}}
        <div class="col-sm-2">

          <div class="text-center">
            <button  type="btnSubmit" class="btn btn-lg btn-default">
              추가
              <span class="glyphicon glyphicon-forward"></span>
            </button>
          </div>
        </form>

        <form class="form" action="{{route('staff.memberadd')}}" method="post">
          {{ csrf_field() }}
          <div class="text-center">
            <a role="button" type="btnSubmit" class="btn btn-lg btn-default">
              삭제
              <span class="glyphicon glyphicon-backward"></span>
            </a>
          </div>
        </div><!-- /.panel .chat-panel -->

          {{-- Step 5 : 처리 --}}
          <div class="col-lg-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                현재 위원회
              </div><!-- /.panel-heading -->
                <div class="panel-body scrollspy">
                  <table class="table table-bordered table-hover ">

                    @for ($i=0; $i <10 ; $i++)
                      <tr>
                        <td>
                          박성원
                          {{--<input type="checkbox" name="delete[]" value="각각이름">--}}
                          <input type="hidden" name="name_id[]" value="숫자">
                        </td>
                      </tr>
                    @endfor
                  </table>
               </div><!-- /.panel-body -->
              </div>
            </div><!-- /.panel .chat-panel -->
        </form><!-- ㅇㅇㅇㅇ/.col-lg-4 -->
      </div>
    </div>
@endsection
