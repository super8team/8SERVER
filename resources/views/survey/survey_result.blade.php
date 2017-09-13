@extends('master')

@section('title','アンケート結果')

@section('content')
  @php
  //   //임시값


  // 1-2 DB에서 받아오는 정보
  @endphp

<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/modules/exporting.js')}}"></script>
<script type="text/javascript">

$(document).ready(function () {

  // Build the chart
  @for ($i=0; $i < count($q_title); $i++)
    
    // OX 일 경우
    @if ($q_title[$i][0] == "ox")
    
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
            text: '{{$q_title[$i][1]}}'
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
                name: '賛成',
                y: {{$q_title[$i][2]}}
            }, {
                name: '反対',
                y: {{$q_title[$i][3]}}
            }]
        }]
    });
    @endif
    // 객관식 일 경우
    @if ($q_title[$i][0] == "obj")
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
            text: '{{$q_title[$i][1]}}'
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
              @for ($t=0; $t <count($q_title[$i][2]) ; $t++)
              {
                name: '{{$q_title[$i][2][$t]}}',
                y:    {{$q_title[$i][3][$t]}}
              },
              @endfor

            ]
        }]
    });
    @endif
    @if ($q_title[$i][0] == "sub")
    // $("#graph").append("<div class='panel panel-default'><div class='panel-heading'>{{--$q_title[$i][1]--}}</div><div class='panel-body'>{{--$q_title[$i][2]--}} </div></div>")
      $("#graph").append("<div class='panel panel-default'><div class='panel-heading'>{{$q_title[$i][1]}}</div><div class='panel-body'>"+    
      "<table class='table table-bordered table-hover'>"+        
        @for ($t=0; $t < count($q_title[$i][2]); $t++)
        "<tr><td>{{$q_title[$i][2][$t]}}</td></tr>"+
        @endfor          
      "</table>"+
      "</div></div>");
    @endif
  @endfor

});
  </script>

  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">アンケート結果
             <a role="button" href="javascript:history.back()" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              戻る
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
