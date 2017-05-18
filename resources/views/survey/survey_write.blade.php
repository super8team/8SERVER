@extends('master')

@section('title','설문조사 리스트')

@section('content')
  @php
    $ox ="<div class='panel panel-default'><div class='panel-heading'>객관식 문제</div><div class='panel-body'>객관식 문제 작성란</div></div>";
  @endphp
  <head>
    <script type="text/javascript">
    //몇 개의 항목이 생성 되었는지 확인하는 변수
    var count_question = 0;

    $(document).ready(function() {
        //보류 기능
        // $('[data-toggle="popover"]').popover({container: "body"});

        // OX 퀴즈  추가 부분
        $(" #addox ").click(function() {
          count_question++;
           $("#create_form").append(
             //id = count_question + "question";
             "<div class='form-group'><div class='panel panel-default'> <div class='panel-heading>OX quiz </div><div class='panel-body'><div class='col-sm-9'><input type='text' class='form-control' name='survey_title'  placeholder='OX 문제를 입력해주세요.'></div><br><h3>정답을 정해주세요</h3><label class='checkbox-inline margin-right-3'><input type='raidio' value='true' name='bool'>참</label><label class='checkbox-inline margin-right-3'><input type='raidio' value='false' name='bool'거짓</label></div></div></div>"
           )
        });
        // 객관식 문제 추가 부분
        $(document).on("click", "#addobjtest",function() {
          count_question++;
          $("#create_form").append(
             //id = count_question + "question";
            "<div class='form-group'><div class='panel panel-default'><div class='panel-heading'style='height:55px;'><div class='col-sm-9'><input type='text' class='form-control' name='notice_title'  placeholder='객관식 문제 제목 입력'></div></div><div class='panel-body'><div class='col-sm-12'><a role='button' class='addsubobjtest btn btn-default'>질문 문항 추가</a><input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'></div></div></div></div>"
          )
        });
          //객관식 문제 항목 추가
          $(document).on("click", ".addsubobjtest",function() {
            // var index = $("#addobjtest").parentsUntil.index(this);
            //  var target = $(event.target);
            // var location = count_question
            // var tag = $(event.target.nodeName).prev();
            //
            // alert(tag);
            // $("#secon").prev().append(
            //   // "<input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'>"
            // )
            // // $(".addsubobjtest:eq(" + index + ")").append(
            // //   "<h2>추가</h2>"
            // // )
            //
            // // id의 value 값 가저오기
            // var click_val = $("#id").val();
            // // 가저온 value 값 가지고
            // // 까지                        부터  찾아 올라감
            // $(".form-group").parentsUntil(click_val)
             var index = $(".addsubobjtest").index(this);
             //부모요소를 선택 할 떄
             $(".addsubobjtest:eq(" + index + ")").parentsUntil(".panel-body").append(
               "<input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'>"
             )

            //자식 요소를 선택할 떄
            // $(".addsubobjtest:eq(" + index + ")").children(".panel-body").append(
            //   "<div class='col-sm-12'><input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'></div>"
            // )
            //형제 요소를 선택
            //  $(".addsubobjtest:eq(" + index + ")").siblings(".panel-body").append(
            //    "<div class='col-sm-12'><input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'></div>"
            //  )
          });
        // 주관식 문제  추가 부분
        $(" #addsubjective ").click(function() {
          $("#create_form").append(
            "<div class='form-group'><div class='panel panel-default'><div class='panel-heading'>주관식</div><div class='panel-body'>주관식 작성란</div></div></div>"
          )
        });
    });
    </script>
  </head>

  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <form class="form" action="{{-- route(notice_write) --}}">
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="text" class="form-control" name="survey_title"  placeholder="설문조사 제목을 입력해주세요 ">
              </div>
              {{-- 항목을 추가 할 수있는 드롭 다운 박스 問題を追加 --}}
              <div class="btn-group col-sm-3">
                <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                  항목 추가 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li id="addox"><a>OX 퀴즈 추가 </a></li>
                  <li id="addobjtest"><a>객관식 문항 추가</a></li>
                  <li id="addsubjective"><a>주관식 문항 추가</a></li>
                </ul>
              </div>
              {{-- <div class="col-sm-3">
                <input type="date" class="form-control" name="simekiri"  placeholder="기한 입력">
              </div> --}}
            </div>
          </div>
          <div class="panel-body" style="min-height:500px;">
            <div id="create_form">
              <div class='form-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>OX quiz </div>
                  <div class='panel-body'>
                    <div class='col-sm-12'>
                      <input type='text' class='form-control' name='survey_title'  placeholder='OX 문제를 입력해주세요.'>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputHelpBlock">정답을 정해 주세요</label>
                      <label class='checkbox-inline margin-right-3'><input type='radio' value='true' name='true'>참</label>
                      <label class='checkbox-inline margin-right-3'><input type='radio' value='false' name='true'>거짓</label>
                    </div>
                    </div>
                  </div>
                </div>

                 <div class='form-group'>
                  <div class='panel panel-default'>
                    <div class='panel-heading'style="height:55px;">
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="notice_title"  placeholder="객관식 문제 제목 입력">
                      </div>
                    </div>

                    <div class='panel-body'>
                      <div class='col-sm-12'>
                        <a role="button" class="addsubobjtest btn btn-default">
                          질문 문항 추가
                        </a>
                        <input type='text' class='form-control' name='survey_title'  placeholder='질문을 입력 해 주세요'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button href="#" type="submit" aria-label="Right Align"
              class="btn btn-sm btn-default pull-right disabled" style="margin-right:15px; margin-top20px;">
               {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
               작성 완료
             </button>
          </div>
        </div>
      </form>
    </div>


        	{{-- <h2>팝오버</h2>
          <button type="button" class="btn btn-default" title="Popover title"
           data-container="body" data-toggle="popover" data-placement="right"
           data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
        	Popover on right
        	</button> --}}

        </div>
      </div>
    </div>
  </div>
@endsection
