@extends('master')

@section('title','체크 리스트 작성')

@section('content')
  {{--
  자바스크립트 변수는 카멜
  라라벨도 카멜
  html 의 name 값은 스네이크
   --}}
  <head>
    <script type="text/javascript">
    //몇 개의 항목이 생성 되었는지 확인하는 변수
    var countQuestion = 0;
    var clickedQuestion = {};
    var allString = new Array;

    $(document).ready(function() {
        //보류 기능
        // $('[data-toggle="popover"]').popover({container: "body"});

        // OX 퀴즈  추가 부분
        $(document).on("click","#addOx",function make_ox() {

          // var elementId = "Q"+countQuestion;
          allString[countQuestion] =
          "<div id='"+ countQuestion +"' class='col-sm-12 OX'>"+
           "<div class='panel panel-default'>"+
             "<div class='panel-heading'style='height:55px;'>"+
               "<div class='col-sm-1'><h4><label class='col-sm-1 text-left'>"+"Q"+ (countQuestion+1) +"</label></h4>"+
               "</div>"+
             "<div class='col-sm-9'>"+
               "<input type='hidden' name ='q_title["+countQuestion+"][0]' value='ox'>"+
               "<input type='text' class='form-control col-sm-9' name='q_title["+countQuestion+"][1]' placeholder='찬성 반대 질문 입력'>"+
             "</div>"+
             "</div>"+
             "<div class='panel-body'>"+
             "</div>"+
           "</div>"+
          "</div>"+
          "</div>"
           $("#createForm").append(allString[countQuestion])
          //  $("#createForm").append("<input type='hidden' name ='hidden_arry[]' value='"+allString[countQuestion]+"'>")
          countQuestion++;
        });
        // 객관식 설문 추가 부분
        $(document).on("click", "#addObjTest",function make_obj() {

        allString[countQuestion] =
        "<div id='"+countQuestion +"'class='col-sm-12 Obj'>"+
           "<div class='panel panel-default'>"+
             "<div class='panel-heading'style='height:55px;'>"+
               "<div class='col-sm-1'>"+
                 "<h4><label class='col-sm-1 text-left'>Q"+(countQuestion+1)+"</label></h4>"+
               "</div>"+
             "<div class='col-sm-9'>"+
             "<input type='hidden' name ='q_title["+countQuestion+"][0]' value='obj'>"+
               "<input type='text' class='form-control col-sm-9' name='q_title["+countQuestion+"][1]'  placeholder='객관식 설문 제목 입력'>"+
             "</div>"+
           "</div>"+
           "<div class='panel-body'>"+
             "<div class='form-group col-sm-12'>"+
               "<a role='button' class='addSubObjBtn btn btn-default'>질문 문항 추가</a>"+
             "</div>"+
           "</div>"+
           "</div>"+
          "</div>"
          $("#createForm").append(allString[countQuestion])

           countQuestion++;
        });
          //객관식 설문 항목 추가
          $(document).on("click", ".addSubObjBtn",function make_objq() {
            //1. 클릭한 위치 구하기
            //.addSubObjBtn 를 가진 버튼의 위치를 가져와서 저장
            var index = $(".addSubObjBtn").index(this);

            //몇번째 설문의 버튼이 클릭됫는지 구분하기위해 설문 종류의 ID 값을 가져옴
            var id = $(".Obj:eq(" + index + ")").attr('id');

            // 값이 없거나 null 인경우에 0을 입력하도록 초기화
            if(clickedQuestion[id] == "" || clickedQuestion[id] == null){
              clickedQuestion[id] = 0;
            }
            // 별다른 이유없이 10개로 제한 하고 픔
            if(clickedQuestion[id] > 9){
              alert("질문 개수는 10개를 넘을 수 없습니다.");
            }else{


             $(".addSubObjBtn:eq(" + index + ")").parent().parent().append(
               "<div class='form-group col-sm-12'>"+
               "<div class='input-group'>"+
               "<span class='input-group-addon'>"+(clickedQuestion[id]+1) +"</span>"+
                "<input type='text' class='form-control' name='q_title["+id+"][2]["+clickedQuestion[id]+"]' placeholder='질문을 입력 해 주세요'>"+
                "</div>"+
               "</div>"
             )
            }
           clickedQuestion[id]++;
          });

        // 주관식 설문 추가 부분
        $(document).on("click","#addSubjective",function make_subjec() {
          allString[countQuestion] =
          "<div id='"+countQuestion +"'class='col-sm-12 Subjec'><div class='panel panel-default'>"+
            "<div class='panel-heading'style='height:55px;'>"+
              "<div class='col-sm-1'>"+
                "<h4><label class='col-sm-1 text-left'>Q"+(countQuestion+1)+"</label></h4>"+
              "</div>"+
            "<div class='col-sm-9'>"+
              /*서술형 제목 입력 란*/
              "<input type='hidden' name ='q_title["+countQuestion+"][0]' value='subjec'>"+
              "<input type='text' class='form-control' name='q_title["+(countQuestion)+"][1]'  placeholder='서술형 질문 입력 란'>"+
            "</div>"+
          "</div>"+
            "<div class='panel-body'>"+
            "<textarea class='form-control' rows='5' name='notice_text' placeholder='내용을 입력해 주세요' ></textarea>"+
            "</div>"+
          "</div>"
          $("#createForm").append(allString[countQuestion])
          countQuestion++;
          // .append("<input type='hidden' name ='hidden_arry["+countQuestion+"]' value='"+allString[countQuestion]+"'>")
          // var string ="<input type='hidden' name ='hidden_arry["+countQuestion+"]' value='"+allString[countQuestion]+"'>";
          // $('#createForm').text(string).html();
        });

        $(document).ready("click","#submit",function() {
          //   for (var i = 0; i < allString.length; i++) {
          //   $("#createForm").append(
          //       "<input type='hidden' name ='allString' value='"+ allString[i]+"'>"
          //   )
          // }
          end();
      });
        function end(){
          document.survey_write_submit.action = "http://localhost/Code/8SERVER/public/surveyview";
          document.survey_write_submit.submit();
        }
    });
    </script>
  </head>
  <div class="bluedecobar">
  </div>
  <div class="bluebg">
    <div class="container">
      <form class="form-horizontal" name="survey_write_submit" action="http://localhost/Code/8SERVER/public/surveyview"  method="POST">
        {{ csrf_field() }}
        <div class="panel panel-default">
          <div class="panel-heading" style="height:55px;">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="text" class="form-control" name="survey_title"  placeholder="체크리스트 제목을 입력해주세요 ">
              </div>
              {{-- 항목을 추가 할 수있는 드롭 다운 박스 問題を追加 --}}
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                  항목 추가 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li id="addOx"><a>OX 퀴즈 추가 </a></li>
                  <li id="addObjTest"><a>객관식 문항 추가</a></li>
                  <li id="addSubjective"><a>주관식 문항 추가</a></li>
                </ul>
              </div>
              <a role="button" href="javascript:history.back()"class="btn btn-default"> 뒤로가기</a>
              {{-- <div class="col-sm-3">
                <input type="date" class="form-control" name="simekiri"  placeholder="기한 입력">
              </div> --}}
            </div>
          </div>
          <div class="panel-body" style="min-height:500px;">
            {{-- 추가되는 항목이 들어가는곳  --}}
            {{-- 테스트용 미리보기 입력 되어있음 --}}
          <div id="createForm">

          </div>
            <button type="btnSubmit" id="submit" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right" style="margin-right:15px; margin-top20px;">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             작성 완료
           </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
