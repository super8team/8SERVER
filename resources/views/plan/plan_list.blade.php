@extends('master')

@section('title','체험학습 리스트')

@section('content')
  {{-- 공간 나누기용 꾸미기 바  --}}
  {{-- 주 내용 --}}
  {{-- 총 레코드 수를 가저오기 --}}
  {{--  페이징은 나중에 한다!
  라라벨 페이지네이트 사용하기--}}

<div class="bluedecobar"></div>
<div class="bluebg">
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">계획 리스트
           <a role="button"  href="{{route('plan.create')}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             새 계획 작성
           </a>
           <a role="button" href="{{route('contents')}}" aria-label="Left Align" class="btn btn-sm btn-default pull-right">
             콘텐츠 만들기
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
              <th>바로가기
                <a role="button" href="{{route('main')}}" aria-label="Right Align"
                 class="btn btn-sm btn-default pull-right">
                 <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                   뒤로 돌아가기
                 </a>
              </th>
            </tr>
          </thead>
          <tbody>
          {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

          {{-- 레코드를 10개 출력  --}}

          @for ($count=0; $count < count($plan_title) ; $count++)
                <tr>
                  <td>{{$plan_no[$count]}}</td>
                  <td>{{$plan_title[$count]}}
                    <a role="button" href="{{route('plan.edit',$plan_no[$count])}}" class="btn btn-sm btn-default">
                      수정
                    </a>
                  </td>
                  <td>{{$plan_date[$count]}}</td>

                  <td colspan="2" class="text-center">
                    <a role="button" href="{{route('plan.show',$plan_no[$count])}}" class="btn btn-sm btn-default">
                      서류작성
                    </a>
                    <a role="button" href="{{route('staff')}}" aria-label="Left Align" class="btn btn-sm btn-default ">
                      위원회
                    </a>

                    <a role="button" href="{{ route('survey.index')}}" class="btn btn-sm btn-default">
                      설문조사
                    </a>
                    <a role="button" href="{{ route('notice_list', $plan_no[$count])}}" class="btn btn-sm btn-default">
                    {{-- <a role="button" href="{{route('notice.index')}}" class="btn btn-sm btn-default"> --}}
                      가정통신
                    </a>
                    {{-- <a role="button" href="{{route('group_list', $plan_no[$count])}}" class="btn btn-sm btn-default">
                      참여 그룹
                    </a> --}}


                    <a role="button" href="{{route('map.edit', $plan_no[$count])}}" class="btn btn-sm btn-danger">
                        상세 계획
                    </a>
                    <a role="button" href="{{route('checklist')}}" class="btn btn-sm btn-default">
                      체크리스트
                    </a>
                    {{-- <a role="button" href="{{route('report_list',$plan_no[$count])}}" class="btn btn-sm btn-default"> --}}
                    <a role="button" href="{{route('report_list',$plan_no)}}" class="btn btn-sm btn-default">
                      소감문
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#share">
                      공유
                    </button>

                    <div class="modal modal fade " id="share" tabindex="-1"
                    role="dialog" aria-labelledby="shareLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="shareLabel">공유하기</h4>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" action="" method="post">
                              {{ csrf_field() }}
                                <input type="text" class="form-control" placeholder="팁을 입력 하세요">
                                <input type="hidden" class="form-control" value="{{--$plan_no--}}">
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default">계획 공유하기</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
          @endfor
        </tbody>
        </table>        
        {{-- 페이지 네이션 --}}        
      </div>{{-- panel-body --}}
    </div>{{-- pannel panel-body --}}
  </div>{{-- container --}}
</div>{{-- bluebg --}}
@endsection
