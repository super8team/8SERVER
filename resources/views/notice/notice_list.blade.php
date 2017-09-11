@extends('master')

@section('title','가정 통신문 리스트')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">선택한 체험학습의 가정통신문
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
            
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           <a role="button" href="{{route('notice_create',$plan_no)}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            가정 통신문 작성
          </a>
         </h3>

        </div>
        <div class="panel-body  panel-custom">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>가정통신문 제목 이름</th>
                <th>작성일</th>
                <th>바로가기</th>
              </tr>
            </thead>
            <tbody>
              @if ($notice_title)
                @for ($count=0; $count < count($notice_title) ; $count++)
                      <tr>
                        <td>{{$count+1}}</td>
                        <td>{{$notice_title[$count]}}</td>
                        <td>{{$notice_date[$count]}}</td>
                        <td colspan="2" class="text-center">
                          <a role="button" href="{{route('notice.show',$notice_no[$count])}}" class="btn btn-sm btn-warning">
                            보기
                          </a>
                        </td>
                      </tr>
                @endfor
              @else
                <tr>
                  <td>아직</td>
                  <td>작성된 가정통신문이</td>
                  <td>하나도 없답니다 ㅎㅎ</td>
                  <td colspan="2" class="text-center">
                    <a role="button"  class="btn btn-sm btn-warning disabled">
                      보기
                    </a>
                  </td>
                </tr>
              @endif
          </tbody>
          </table>
          <div class="">
            {{$notices->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
