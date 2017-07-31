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
          <h3 class="panel-title">선택한 체험학습의 소감문            
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           
           @if ($user_info['type'] == 'student')
             <a role="button" href="{{route('report_create',$plan_no)}}" aria-label="Right Align"
             class="btn btn-sm btn-default pull-right">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              감상문 작성
            </a>   
          @else
            <a role="button" href="" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right disabled">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             감상문 작성
           </a>   
           @endif
           
         </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>소감문 제목</th>
                {{-- <th>작성일</th> --}}
                @if ($user_info['type'] == 'teacher')
                <th>점수</th>
                @endif
                <th>바로가기</th>
              </tr>
            </thead>
            <tbody>
              @if ($report_title)
                @for ($count=0; $count < count($report_title) ; $count++)
                      <tr>
                        <td>{{$count+1}}</td>
                        <td>{{$report_title[$count]}}</td>
                        {{-- <td>{{$report_date[$count]}}</td> --}}
                        @if ($user_info['type'] == 'teacher')
                          @if ($report_score[$count])
                            <td>{{$report_score[$count]}}</td>
                          @else
                            <td>미평가 감상문입니다.</td>
                          @endif
                        @endif
                                        
                        <td colspan="2" class="text-center">
                          <a role="button" href="{{route('report.show',$report_no[$count])}}" class="btn btn-sm btn-warning">
                            보기
                          </a>
                          @if ($user_info['type'] == 'teacher')                          
                          <a role="button" href="{{route('reportevaluationview',$report_no[$count])}}" class="btn btn-sm btn-warning">
                            평가하기
                          </a>
                          @endif
                        </td>
                      </tr>
                @endfor
              @else
                <tr>
                  <td>아직</td>
                  <td>작성된 감상문이 </td>
                  <td>하나도 없답니다 ㅎㅎ</td>
                  <td colspan="2" class="text-center">
                    <a role="button"  class="btn btn-sm btn-warning disabled">
                      보기
                    </a>
                    @if ($user_info['type'] == 'teacher')                          
                    <a role="button" class="btn btn-sm btn-warning disabled">
                      평가하기
                    </a>
                    @endif
                  </td>
                </tr>
              @endif
          </tbody>
          </table>
          <div class="">
            {{$reports->links() }}
          </div>
        </div>
      </div>
    
    </div>
  </div>
@endsection
