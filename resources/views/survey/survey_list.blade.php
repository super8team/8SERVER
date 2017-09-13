@extends('master')

@section('title','アンケートリスト')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
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
      <div class="panel panel-default panel-custom">
        <div class="panel-heading">
          <h3 class="panel-title" style="display: inline-block;">選んだ体験学習のアンケート調査
            
         </h3>
         <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
         class="btn btn-sm btn-default pull-right">
          {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
          戻る
        </a>
        <a role="button" href="{{route('survey.create')}}" aria-label="Right Align"
        class="btn btn-sm btn-default pull-right">
         {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
         アンケート作成
       </a>
          {{-- <h3 class="panel-title">이전에 작성한 설문조사 리스트
          </h3> --}}

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>体験学習タイトル</th>
                <th>作成日</th>
                <th>すぐ行く</th>
              </tr>
            </thead>
            <tbody>
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}
            @php
            //임시로 최신순으로 불러오기 위해 배열 뒤집기
            // $survey_title = array_reverse($survey_title);
            // $survey_date  = array_reverse($survey_date);
            // $surveies     = array_reverse($surveies);
            @endphp
            @if($user_info['type'] == 'teacher')
              @for ($count=0; $count < count($survey_title) ; $count++)
                    <tr>
                      <td>{{$count+1}}</td>
                      <td>{{$survey_title[$count]}}</td>
                      <td>{{$survey_date[$count]}}</td>
                      <td colspan="2" class="text-center">
                        <a role="button" href="{{route('survey.show',$survey_no[$count])}}" class="btn btn-sm btn-warning">
                          見る
                        </a>
                        <a role="button" href="{{route('survey.total.respond',$survey_no[$count])}}" class="btn btn-sm btn-danger">
                          結果見る
                        </a>
                      </td>
                    </tr>
              @endfor
            @else
              @for ($count=0; $count < count($survey_title) ; $count++)
                    <tr>
                      <td>{{$count+1}}</td>
                      <td>{{$survey_title[$count]}}</td>
                      <td>{{$survey_date[$count]}}</td>
                      <td colspan="2" class="text-center">
                        <a role="button" href="{{route('survey.show',$survey_no[$count])}}" class="btn btn-sm margin-right-10 btn-warning">
                          見る
                        </a>
                        <a role="button" href="{{route('survey.stdResult',$survey_no[$count])}}" class="btn btn-sm margin-right-10 btn-danger">
                          結果見る
                        </a>
                      </td>
                    </tr>
              @endfor
            @endif
          
          </tbody>
          </table>
          {{-- 여기 페이징 기능점요 ㅋ --}}
          <div class="">
            {{$surveies->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
