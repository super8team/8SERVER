@extends('master')

@section('title','그룹리스트')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          @php
          $user_info = Auth::user();
          
          if($user_info['type'] == 'student'){
            $back_route = 'plan.student';
          }elseif ($user_info['type'] == 'teacher'){
            $back_route = 'plan.teacher';
          }else{
            $back_route = 'plan.parents';
          }              
          @endphp
          <h3 class="panel-title">선택한 체험학습의 참여명단 
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           <a role="button" href="{{route('team_list', $plan_no)}}" class="btn btn-sm btn-default pull-right">
             팀 정하기
           </a>
           <a role="button" href="{{route('group_create',$plan_no)}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            참여자 정하기
          </a>
         </h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
              <thead>
                <th>#</th>
                <th>반</th>
                <th>이름</th>
              </thead>
              <tbody>
                @if ($student_name)
                  @for ($i=0; $i <count($student_name) ; $i++)
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
                    <td>위의 기능을 사용해서 학생</td>
                    <td>리스트를 뽑아주세요</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
