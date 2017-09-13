@extends('master')

@section('title','体験学習リスト')

@section('content')
  
  @php
    $lang = 'jp';
    
    if($lang == 'kr'){
      $lang_plan_list         = '계획 리스트';
      $lang_create_plan       = '계획 작성하기';
      $lang_create_mission    = '미션 작성하기';
      $lang_plan_name         = '체험학습 제목';
      $lang_plan_date         = '체험학습 실시일';
      $lang_short_cut         = '바로가기';
      $lang_back              = '뒤로가기';
      $lang_sheet             = '서류작성';
      $lang_staff             = '위원회';
      $lang_survey            = '설문조사';
      $lang_notice            = '가정통신문';
      $lang_checklist         = '체크리스트';
      $lang_report            = '소감문';
      $lang_share             = '공유';
      $lang_modal_share_title = '공유하기';
      $lang_modal_share_btn   = '계획 공유하기';
      $lang_modal_cancle_btn  = '취소';
    }
    if($lang == 'jp'){
      $lang_plan_list         = '計画リスト';
      $lang_create_plan       = '計画作成';
      $lang_create_mission    = 'ミッション作成';
      $lang_plan_name         = '体験学習タイトル';
      $lang_plan_date         = '体験学習実行日';
      $lang_short_cut         = 'ショットカット';
      $lang_back              = 'もどる';
      $lang_sheet             = '書類作成';
      $lang_staff             = '委員会';
      $lang_survey            = 'アンケート';
      $lang_notice            = 'お知らせ';
      $lang_checklist         = 'チェックリスト';
      $lang_report            = '感想文';
      $lang_share             = '共有';
      $lang_modal_share_title = '共有する';
      $lang_modal_share_btn   = '計画共有';
      $lang_modal_cancle_btn  = '取り消し';
    }
                                      
  @endphp
  {{-- 공간 나누기용 꾸미기 바  --}}


  {{-- 주 내용 --}}
  {{-- 총 레코드 수를 가저오기 --}}
  {{--  fufufufufufuck! 페이징은 나중에 한다!
  라라벨 페이지네이트 사용하기--}}
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{$lang_plan_list}}
             <a role="button" href="{{route('main')}}" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              {{$lang_back}}
            </a>
          </h3>

        </div>
        <div class="panel-body  panel-custom">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>{{$lang_plan_name}}</th>
                <th>{{$lang_plan_date}}</th>
                <th>{{$lang_short_cut}}</th>
              </tr>
            </thead>
            <tbody>
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

            {{-- 레코드를 10개 출력  --}}
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
            
            @for ($count=0; $count < count($plan_title) ; $count++)
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>{{$plan_title[$count]}}</td>
                    <td>{{$plan_date[$count]}}</td>
                    @if($user_info['type'] == 'student')
                      <td colspan="2" class="text-center">
                        <a role="button" href="{{ route('survey.index') }}" class="btn btn-sm btn-info">
                          {{$lang_survey }}
                        </a>
                        <a role="button" href="{{ route('notice_list', $plan_no[$count])}}" class="btn btn-sm btn-warning">
                          {{$lang_notice}}
                        </a>
                        <a role="button" href="{{ route('checklist') }}" class="btn btn-sm btn-danger">
                          {{$lang_checklist}}
                        </a>
                        {{-- <a role="button" href="{{ route('report_list',$plan_no) }}" class="btn btn-sm btn-danger ">
                          소감문
                        </a> --}}
                      </td>     
                    @elseif($user_info['type'] == 'parents')
                      <td colspan="2" class="text-center">
                        <a role="button" href="{{ route('staff', $plan_no[$count])}}" aria-label="Left Align" class="btn btn-sm btn-default ">
                          {{$lang_staff}}
                        </a>
                        <a role="button" href="{{ route('survey.index') }}" class="btn btn-sm btn-info">
                          {{$lang_survey}}
                        </a>
                        <a role="button" href="{{ route('notice_list', $plan_no[$count])}}" class="btn btn-sm btn-warning">
                          {{$lang_notice}}
                        </a>
                        <a role="button" href="{{ route('checklist') }}" class="btn btn-sm btn-danger">
                          {{$lang_checklist}}
                        </a>
                        {{-- <a role="button" href="{{ route('report_list',$plan_no) }}" class="btn btn-sm btn-danger ">
                          {{-- $lang_report  --}}
                        </a> --}}
                      </td>
                      {{-- 센세가 셋킨시타토키  테수토 용 --}}
                  
                    @endif
                    
                 </tr>
            @endfor
          </tbody>
          </table>      
          {{-- 페이지 네이션 --}}
          <nav class="page text-center">
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>{{-- panel-body --}}
      </div>{{-- pannel panel-body --}}
    </div>{{-- container --}}
  </div>{{-- bluebg --}}
@endsection
