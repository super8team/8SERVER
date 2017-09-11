@extends('master')

@section('title','体験学習リスト')

@section('content')
  {{-- 공간 나누기용 꾸미기 바  --}}
  {{-- 주 내용 --}}
  {{-- 총 레코드 수를 가저오기 --}}
  {{--  페이징은 나중에 한다!
  라라벨 페이지네이트 사용하기--}}
{{-- 언어 변경 --}}
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
    $lang_scheduel          = '스케쥴';
    $lang_checklist         = '체크리스트';
    $lang_report            = '소감문';
    $lang_share             = '공유';
    $lang_modal_share_title = '공유하기';
    $lang_modal_share_btn   = '계획 공유하기';
    $lang_modal_cancle_btn  = '취소';
    $lang_shortcut          = '자세히';
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
    $lang_scheduel          = 'スケージュール';
    $lang_checklist         = 'チェックリスト';
    $lang_report            = '感想文';
    $lang_share             = '共有';
    $lang_modal_share_title = '共有する';
    $lang_modal_share_btn   = '計画共有';
    $lang_modal_cancle_btn  = '取り消し';
    $lang_shortcut          = '詳しくは';
    
  }
                                    
@endphp

<div class="bluedecobar"></div>
<div class="bluebg">  
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
          <a role="button"  href="{{route('plan.create')}}" aria-label="Right Align"
           class="btn btn-lg btn-default pull-right">
             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
            {{$lang_create_plan}}
          </a>
          <a role="button" href="{{route('contents')}}" aria-label="Left Align" class="btn btn-lg btn-default pull-right">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
            {{$lang_create_mission}}
          </a>
        </div>
        <br>
    </div>
    
    <div class="panel panel-success">
      <div class="panel-heading">
        <h2 class="panel-title">{{$lang_plan_list}}</h2>
      </div>
      <div class="panel-body  panel-custom">     
  
          {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

          {{-- 레코드를 10개 출력  --}}

          @for ($count=0; $count < count($plan_title); $count++)
            <div class="panel panel-primary">
              <div class="panel-heading">
                # {{$plan_no[$count]}}　{{$plan_title[$count]}}
              </div>
              <div class="panel-body">
                
                  <a role="button" href="{{route('plan.show', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_sheet}}
                  </a>
                  <a role="button" href="{{route('staff', ['count'=>$plan_no[$count]])}}" aria-label="Left Align" class="btn   btn-default ">
                    {{$lang_staff}}
                  </a>
  
                  <a role="button" href="{{ route('survey.index', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_survey}}
                  </a>
                  
                  <a role="button" href="{{ route('notice_list', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_notice}}
                  </a>
                  
                  <a role="button" href="{{route('group_list', $plan_no[$count])}}" class="btn btn-default">
                    参加グループ
                  </a>
                  
                  <a role="button" href="{{route('map.edit', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_scheduel}}
                  </a>
                  
                  <a role="button" href="{{route('checklist', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_checklist}}
                  </a>
                  
                  <a role="button" href="{{route('report_list', ['count'=>$plan_no[$count]])}}" class="btn   btn-default">
                    {{$lang_report}}
                  </a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn   btn-default" data-toggle="modal" data-target="#share">
                    {{$lang_share}}
                  </button>
              </div>
            </div>
            {{-- 체험학습 상세 --}}
            
                  {{-- 공유하기 --}}
                  <div class="modal modal fade " id="share" tabindex="-1"
                  role="dialog" aria-labelledby="shareLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"
                          aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="shareLabel">{{$lang_modal_share_title}}</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="" method="post">
                            {{ csrf_field() }}
                              <input type="text" class="form-control" placeholder="アドバイスを書いてください。">
                              <input type="hidden" class="form-control" value="{{--$plan_no--}}">
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default">{{$lang_modal_share_btn  }}</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">{{$lang_modal_cancle_btn}}</button>
                        </div>
                      </div>
                    </div>
                  </div>
          @endfor
        </div>
        </div>      
          
          
          {{-- {{$plan_no[$count]}}
          {{$plan_title[$count]}}    
        {{$plan_date[$count]}} --}}

        {{-- 페이지 네이션 --}}        
      </div>{{-- panel-body --}}
    </div>{{-- pannel panel-body --}}
    {{-- <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
          1
        </div>
        <div class="panel-footer">
          2
        </div>
      </div>
      
    </div> --}}
  </div>{{-- container --}}
</div>{{-- bluebg --}}
@endsection
