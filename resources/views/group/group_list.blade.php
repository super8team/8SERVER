@extends('master')

@section('title','소감문 리스트')

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
            $back_route = 'plan.student';
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
           <a role="button" href="{{route('group_create',$plan_no)}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            참여자 정하기
          </a>
         </h3>
        </div>
        <div class="panel-body">
          <div class="row">
            @for ($i=0; $i < $division ; $i++)
              @if($i%4 == 0 && $i >1 )
                <div class="">
              @endif
                <div class="col-sm-3">
                  <ul class="list-group">
                    @for ($t=($i*25); $t <25+(25*$i) ; $t++)
                      @if ($t < $students_count )
                        <li class="list-group-item">{{$students[$t][1]}} ____ {{$t}} ____</li>
                      @endif
                    @endfor
                  </ul>
                </div>
              @if($i%4 == 0 && $i >1)
              </div>
              @endif
            @endfor
            {{-- <div class="col-sm-12"> --}}
              {{-- <table class="table table-bordered table-hover">
                <thead>
                  <th>미참여 학생 명단 넣기</th>
                  <th>추가 빼기 버튼 넣기</th>
                  <th>동적으로 안해도 되겠지?ㅎㅎ</th>
                </thead>
                <tbody>
                  <td>반 선택하기 창 넣기</td>
                  <td>그안에 체크박스 넣기</td>
                  <td>ㅅㅅ</td>
                </tbody>
              </table> --}}
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
