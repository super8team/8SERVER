@extends('master')

@section('title','위원회 항목')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">선택한 체험학습
            <a role="button" href="{{route('plan.teacher')}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
         </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>체험 학습 이름</th>
                <th>체험학습 실시일</th>
                <th>바로가기</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{$current_plan_no}}</td>
              <td>{{$current_plan_title}}</td>
              <td>{{$current_plan_date}}</td>
              <td colspan="2" class="text-center">
                <a role="button" href="{{route('staff.memberAdd', ['count'=>$count])}}" class="btn btn-sm btn-default">
                  위원 관리
                </a>
                <a role="button" href="{{route('staff.result', ['count'=>$count])}}" class="btn btn-sm btn-default">
                  심의 결과 보기
                </a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
          {{--<h3 class="panel-title">이전 체험학습--}}
          {{--</h3>--}}

        {{--</div>--}}
        {{--<div class="panel-body">--}}
          {{--<table class="table table-bordered table-hover">--}}
            {{--<thead>--}}
              {{--<tr>--}}
                {{--<th>#</th>--}}
                {{--<th>체험 학습 이름</th>--}}
                {{--<th>체험학습 실시일</th>--}}
                {{--<th>바로가기</th>--}}
              {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}
            {{-- 이전 체험학습 리스트 --}}
            {{-- 레코드를 10개 출력  --}}

{{--              @for ($count=0; $count < 10 ; $count++)--}}
{{--              @for ($count=0; $count < count($plan_title) ; $count++)--}}
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
                  {{--<tr>--}}
                    {{--<td>$no</td>--}}
                    {{--<td>{{$plan_no[$count]}}</td>--}}
                    {{--<td>$previous_plan_name</td>--}}
                    {{--<td>{{$plan_title[$count]}}</td>--}}
                    {{--<td>$day</td>--}}
                    {{--<td>{{$plan_date[$count]}}</td>--}}
                    {{--<td colspan="2" class="text-center">--}}
                      {{--<a role="button" href="{{route('staff.memberadd')}}" class="btn btn-sm btn-default">--}}
                        {{--위원 관리--}}
                      {{--</a>--}}
                      {{--<a role="button" href="{{route('staff.result')}}" class="btn btn-sm btn-default">--}}
                        {{--심의 결과 보기--}}
                      {{--</a>--}}
                    {{--</td>--}}
                  {{--</tr>--}}
            {{--@endfor--}}
          {{--</tbody>--}}
          {{--</table>--}}
        {{--</div>--}}
      {{--</div>--}}
    </div>
  </div>
@endsection
