@extends('master')

@section('title','소감문 리스트')

@section('content')
  @php
    $report_evaluation = "http://localhost/Code/8SERVER/public/reportevaluation";
    $report_write = "http://localhost/Code/8SERVER/public/reportwrite";
    $report_view  = "http://localhost/Code/8SERVER/public/reportview";
  @endphp
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">선택한 체험학습의 소감문
            <a role="button" href="javascript:history.back()" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           <a role="button" href="{{$report_write}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            감상문 작성
          </a>
         </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>체험 학습 명</th>
                <th>작성일</th>
                <th>바로가기</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($param as $value)
                <td>{{$count+1}}</td>
                <td>{{$value['data']['name']}}</td>
                <td>{{$value['data']['date']}}</td>
                  $num = $value['data']['id']
                  예시
                  <a role="button" href="{{$plan_modify + $num}}" class="btn btn-sm btn-primary">
                    수정
                  </a>
              @endforeach --}}
                  <tr>
                    <td>1</td>
                    <td>야 소백산 딱 좋다</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{$report_view}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>

          </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" style="height:55px">

          <h3 class="panel-title">이전 감상문 리스트

          </h3>
          <a role="button" href="{{$report_write}}" class="btn btn-sm btn-info pull-right">
            소감문 작성
          </a>
          <a role="button" href="{{----}}" class="btn btn-sm btn-info pull-right">
            돌아가기
          </a>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>소감문 학습 이름</th>
                <th>작성일</th>
                <th>점수</th>
                <th>바로가기</th>
              </tr>
            </thead>
            <tbody>
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

            {{-- 레코드를 10개 출력  --}}

            @for ($count=0; $count < 10 ; $count++)
              {{-- @foreach ($param as $value)
                <td>{{$count+1}}</td>
                <td>{{$value['data']['name']}}</td>
                <td>{{$value['data']['date']}}</td>
                  $num = $value['data']['id']
                  예시
                  <a role="button" href="{{$plan_modify + $num}}" class="btn btn-sm btn-primary">
                    수정
                  </a>
              @endforeach --}}
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>으앙아아아앙</td>
                    <td>0000/00/00</td>
                    <td>@php
                      (rand()*100)+1;
                    @endphp</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{$report_view}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                      <a role="button" href="{{$report_evaluation}}" class="btn btn-sm btn-danger">
                        평가하기
                      </a>
                    </td>
                  </tr>
            @endfor
          </tbody>
          </table>
          {{-- 여기 페이징 기능점요 ㅋ --}}
        </div>
      </div>
    </div>
  </div>
@endsection
