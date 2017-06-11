@extends('master')

@section('title','설문조사 결과')

@section('content')
  @php
  //   //임시값


  // * * * * * * * * * * * * * *  문제 1 * * * * * * * * * * * * * *
  $q_title[0][0] = "ox";
  //제목 값
  $q_title[0][1] = "ox 테스트 1";
  //선택값
  $resp[0] = 'false';
  // * * * * * * * * * * * * * *  문제 2 * * * * * * * * * * * * * *
  //타입
  // $result[1] = {"ox","ox 테스트 2",50,30};
  $q_title[1][0] = "ox";
  //제목 값
  $q_title[1][1] = "ox 테스트 2";
  //선택값
  $resp[1] = 'true';

  // * * * * * * * * * * * * * *  문제 3 * * * * * * * * * * * * * *
  //타입
  $q_title[2][0] = "obj";

  //객관식 제목 값
  $q_title[2][1] = "다음중 제일 까만 사람은?";
  // $r_tilte[2][1] = "obj 제목 1";

  //항목 제목
  $q_title[2][2] = ["권유성","김선중","조경현","박현경"];

  //선택 값
  $resp[2] = 0 ;

  // * * * * * * * * * * * * * *  문제 3 * * * * * * * * * * * * * *
  //타입
  $q_title[3][0] = "subjec";

  //서술형 제목 값
  $q_title[3][1] = "될까 제발...";
  // $r_tilte[2][1] = "obj 제목 1";
  $resp[3] = "내용내용내용내용내용내용내용내용내용내용내용내용내용";

  // 선택한 값을 DB 에 저장 하기
  // 1-1 DB 에서 넘어오는 정보 총 문제수를 받아옴
  //view -> 선택한 결과 를 저장하는곳

  // 필요한 값
  // $q_title
  // $resp

  for ($num = 0; $num < 4; $num++) {
    // 문제가 ox 인가?
     $result[$num][0] = $q_title[$num][0];
     $result[$num][1] = $q_title[$num][1];
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
    if($result[$num][0] == "subjec"){
      $result[$num][2] = $resp[$num];
    }
  }

  // 1-2 DB에서 받아오는 정보
  @endphp

<script src="../public/js/highcharts.js"></script>
<script src="../public/js/modules/exporting.js"></script>
<script type="text/javascript">

$(document).ready(function () {

  // Build the chart
  @for ($i=0; $i < 4; $i++)
    // OX 일 경우
    @if ($result[$i][0] == "ox")
    $("#graph").append("<div class='panel panel-default'><div class='panel-heading'></div><div class='panel-body'> <div id='{{$i}}' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div></div></div>")
    Highcharts.chart('{{$i}}', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            // text: 'Browser market shares January, 2015 to May, 2015'
            text: '{{$result[$i][1]}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [ {
                name: '찬성',
                y: {{$result[$i][2]}}
            }, {
                name: '반대',
                y: {{$result[$i][3]}}
            }]
        }]
    });
    @endif
    // 객관식 일 경우
    @if ($result[$i][0] == "obj")
    $("#graph").append("<div class='panel panel-default'><div class='panel-heading'></div><div class='panel-body'> <div id='{{$i}}' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div></div></div>")
    Highcharts.chart('{{$i}}', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            // text: 'Browser market shares January, 2015 to May, 2015'
            text: '{{$result[$i][1]}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
              @for ($t=0; $t <count($result[$i][2]) ; $t++)
              {
                name: '{{$result[$i][2][$t]}}',
                y:    {{$result[$i][3][$t]}}
              }
                @if($i != count($result[$i][2])-1)
                {{","}}
                @endif
              @endfor

            ]
        }]
    });
    @endif
    @if ($result == "subjec")
      $("#graph").append("<div class='panel panel-default'><div class='panel-heading'>{{$result[$i][1]}}</div><div class='panel-body'>{{$result[$i][2]}} </div></div>")
    @endif
  @endfor

});
  </script>

  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">설문 결과
             <a role="button" href="javascript:history.back()" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              뒤로 돌아가기
            </a>
          </h3>
        </div>
        <div class="panel-body" style="min-height:500px;">
          <div id = "graph" class ='panel-body'>
            {{-- 그래프 --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
