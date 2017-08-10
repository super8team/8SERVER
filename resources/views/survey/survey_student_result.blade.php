@extends('master')

@section('title','설문조사 결과 확인(학생)')

@section('content')

    @php
        //   //임시값
        // * * * * * * * * * * * * * *  문제 1 * * * * * * * * * * * * * *
        // $q_title[0][0] = "ox";
        // //제목 값
        // $q_title[0][1] = "ox 테스트 1";
        // //선택값
        // $resp[0] = 'false';
        // * * * * * * * * * * * * * *  문제 2 * * * * * * * * * * * * * *
        //타입
        // // $result[1] = {"ox","ox 테스트 2",50,30};
        // $q_title[1][0] = "ox";
        // //제목 값
        // $q_title[1][1] = "ox 테스트 2";
        // //선택값
        // $resp[1] = 'true';
        //
        // // * * * * * * * * * * * * * *  문제 3 * * * * * * * * * * * * * *
        // //타입
        // $q_title[2][0] = "obj";
        //
        // //객관식 제목 값
        // $q_title[2][1] = "다음중 제일 까만 사람은?";
        // // $r_tilte[2][1] = "obj 제목 1";
        //
        // //항목 제목
        // $q_title[2][2] = ["권유성","김선중","조경현","박현경"];
        //
        // //선택 값
        // $resp[2] = 0 ;
        //
        // // * * * * * * * * * * * * * *  문제 3 * * * * * * * * * * * * * *
        // //타입
        // $q_title[3][0] = "sub";
        //
        // //서술형 제목 값
        // $q_title[3][1] = "될까 제발...";
        // // $r_tilte[2][1] = "obj 제목 1";
        // $resp[3] = "내용내용내용내용내용내용내용내용내용내용내용내용내용";

        // 선택한 값을 DB 에 저장 하기
        // 1-1 DB 에서 넘어오는 정보 총 문제수를 받아옴
        //view -> 선택한 결과 를 저장하는곳

        // 필요한 값
        // $q_title
        // $resp
        for ($num = 0; $num < count($q_title); $num++) {
          $result[$num][0] = $q_title[$num][0];
          $result[$num][1] = $q_title[$num][1];
          if(isset($resp)){
            //ox
            if($result[$num][0] == "ox"){
              //안에 빈값이면 0으로 초기화
              if(isset($result[$num][2]) == false || isset($result[$num][3]) == false) {
                    $result[$num][2] = 0;
                    $result[$num][3] = 0;
              }
              //ox 판단 후 해당 값 증가
              if ($resp[$num] == "true") {
                $result[$num][2]++;
                //DB 저장 코드
              }else{
                $result[$num][3]++;
                //DB 저장 코드
              }
            }
            //obj
            if($result[$num][0] == "obj"){
              //결과 값 안에 아무것 도 없을 경우 0 으로 초기화
              //선택항목 갯수
              $sub_obj_count = count($q_title[$num][2]);
              //선택한 값
              $selected = $resp[$num];
              //선택사항 제목 저장
              $result[$num][2] = $q_title[$num][2];

              for ($t=0; $t < $sub_obj_count ; $t++) {
                //빈 값일경우 전부 0 으로 초기화
                if(isset($result[$num][3][$t]) == false){
                  $result[$num][3][$t] = 0;
                }
                //선택한 값일 경우 +1
                if($selected == $t){
                  $result[$num][3][$t]++;
                  //DB 저장 코드
                }
              }
            }
            //서술형 저장
            if($result[$num][0] == "sub"){
              $result[$num][2] = $resp[$num];
            }
          }else{
            break;
          }
        }

        // 1-2 DB에서 받아오는 정보
    @endphp



    <div class="bluedecobar">
    </div>
    <div class="bluebg">
        <div class="container">
            <form class="form-horizontal" name="survey_write_submit" action=""  method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading" style="height:55px;">
                        <h3 class="panel-title">
                            <div class="well well-sm col-sm-4">
                                제목
                            </div>
                            <a role="button" class="btn btn-default pull-right" href="{{route('survey.index')}}" aria-label="Right Align"
                               class="btn btn-sm btn-default ">
                                 <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                                리스트로 돌아가기
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body read_form"  style="min-height:500px;">
                        @for ($i=0; $i < count($q_title) ; $i++)
                            @if ($q_title[$i][0] == "ox")
                                <div class='col-sm-12 OX'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'style='height:55px;'>
                                            <div class='col-sm-1'>
                                                <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                                            </div>
                                            <div class='col-sm-9'>
                                                <h4>{{$q_title[$i][1]}}</h4>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <div class='col-sm-2'>
                                                <label>정답을 정해 주세요</label>
                                            </div>
                                            <div class='col-sm-4'>
                                                <label class='checkbox-inline margin-right-3'>
                                                    <input type='radio' value='true' name='resp[{{$i}}]'>참
                                                </label>
                                                <label class='checkbox-inline margin-right-3'>
                                                    <input type='radio' value='false' name='resp[{{$i}}]'>거짓
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($q_title[$i][0]== "obj")
                                {{-- 객관식 질문 --}}
                                <div class='col-sm-12 Obj'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading' style='height:55px;'>
                                            <div class='col-sm-1'>
                                                <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                                            </div>
                                            <div class='col-sm-9'>
                                                <h4>{{$q_title[$i][1]}}</h4>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <div class='form-group col-sm-12'>
                                                 input 이 클릭만 되지 않도록 하기
                                                <ul class="list-group">
                                                    @for ($t=0 ; $t <count($q_title[$i][2]) ; $t++)
                                                         <input type='hidden' class='form-control ' name='q_result[{{$i}}][2][{{$t}}]'
                                                       value="{{$q_title[$i][2][$t]}}">
                                                        <div class="col-sm-12">
                                                            <li class="list-group-item col-sm-12">
                                                                 <blockquote>
                                                                <p>
                                                                <span class="badge"></span>
                                                                <h4>
                                                                    <span class="label label-default">{{$t+1}}</span>&nbsp;&nbsp;&nbsp;
                                                                    {{$q_title[$i][2][$t]}}
                                                                    <label class='checkbox-inline margin-right-3 pull-right'>
                                                                        <input type='radio' value='{{$t}}' name='resp[{{$i}}]'>선택
                                                                    </label>
                                                                </h4>
                                                                </p>
                                                                 </blockquote>
                                                            </li>
                                                        </div>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($q_title[$i][0] == "sub")
                                <div class='col-sm-12 Subjec'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'style='height:55px;'>
                                            <div class='col-sm-1'>
                                                <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                                            </div>
                                            <div class='col-sm-9'>
                                                <h4>{{$q_title[$i][1]}}</h4>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <textarea class='form-control' rows='5' name='resp[{{$i}}]' placeholder='디비 값' ></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </form>
          </div>
    </div>
@endsection
