@extends('master')

@section('title','感想文リスト')

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
          <h3 class="panel-title">選んだ体験学習の感想文
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             戻る
           </a>
           
           @if ($user_info['type'] == 'student')
             <a role="button" href="{{route('report_create',$plan_no)}}" aria-label="Right Align"
             class="btn btn-sm btn-default pull-right">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              感想文作成
            </a>   
          @else
            <a role="button" href="" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right disabled">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              感想文作成
           </a>   
           @endif
           
         </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>感想文タイトル</th>
                {{-- <th>작성일</th> --}}
                @if ($user_info['type'] == 'teacher')
                <th>点数</th>
                @endif
                <th>すぐ行く</th>
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
                          @if (isset($report_score[0][$count]) )
                            <td>{{$report_score[0][$count]}}</td>
                          @else
                            <td>未評価感想文です。</td>
                          @endif
                        @endif
                                        
                        <td colspan="2" class="text-center">
                          <a role="button" href="{{route('report.show',$report_no[$count])}}" class="btn btn-sm btn-warning">
                            見る
                          </a>
                          @if ($user_info['type'] == 'teacher')                          
                          <a role="button" href="{{route('report_view_evaluation',$report_no[$count])}}" class="btn btn-sm btn-warning">
                            評価する
                          </a>
                          @endif
                        </td>
                      </tr>
                @endfor
              @else
                <tr>
                  <td>まだ作成した感想文が</td>
                  <td>ないです。</td>
                  @if ($user_info['type'] == 'teacher')
                    <td>ㅎㅎ</td>
                  @endif
                    
                  <td colspan="2" class="text-center">
                    <a role="button"  class="btn btn-sm btn-warning disabled">
                      見る
                    </a>
                    @if ($user_info['type'] == 'teacher')                          
                    <a role="button" class="btn btn-sm btn-warning disabled">
                      評価する
                    </a>
                    @else
                    @endif
                  </td>
                </tr>
              @endif
          </tbody>
          </table>
          <div class="">
          </div>
        </div>
      </div>
    
    </div>
  </div>
@endsection
