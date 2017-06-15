@extends('master')

@section('title','체험학습 리스트')

@section('content')
  {{-- 공간 나누기용 꾸미기 바  --}}


  {{-- 주 내용 --}}
  {{-- 총 레코드 수를 가저오기 --}}
  {{--  페이징은 나중에 한다!
  라라벨 페이지네이트 사용하기--}}
  @php
    $planlist_rec = 17;

    $planlist_arr['data']['name'] = '소백산  체험학습';
    $planlist_arr['data']['date'] = '2017/05/06';
    $planid = "?planid="+ $planlist_arr['data']['id'] = 1;
  @endphp
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">계획 리스트
             {{-- <a role="button" href="{{route('main')}}" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
              뒤로 돌아가기
            </a> --}}
          </h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>체험 학습 이름</th>
                <th>작성일</th>
                <th>바로가기
                    <a role="button"  href="{{route('plan')}}" aria-label="Right Align"
                     class="btn btn-sm btn-default">
                      {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
                      새 계획 작성
                    </a>
                </th>
              </tr>
            </thead>
            <tbody>
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

            {{-- 레코드를 10개 출력  --}}

            @for ($count=0; $count < 10 ; $count++)
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
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>{{$planlist_arr['data']['name']}}</td>
                    <td>{{$planlist_arr['data']['date']}}</td>

                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('staff')}}" aria-label="Left Align" class="btn btn-sm btn-default ">
                        위원회
                      </a>
                      <a role="button" href="{{route('plan.modify')}}" class="btn btn-sm btn-primary">
                        수정
                      </a>
                      <a role="button" href="{{route('plan.sheet')}}" class="btn btn-sm btn-success">
                        서류작성
                      </a>
                      <a role="button" href="{{ route('survey.index')}}" class="btn btn-sm btn-info">
                        설문조사
                      </a>
                      <a role="button" href="{{route('notice.index')}}" class="btn btn-sm btn-warning">
                        가정통신
                      </a>
                      <a role="button" href="{{route('plan.map')}}" class="btn btn-sm btn-danger">
                        상세 계획
                      </a>
                      <a role="button" href="{{route('checklist')}}" class="btn btn-sm btn-danger">
                        체크리스트
                      </a>
                      <a role="button" href="{{route('report')}}" class="btn btn-sm btn-danger ">
                        소감문
                      </a>

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#share">
                        공유
                      </button>

                      <!-- Modal -->
                      <div class="modal modal fade " id="share" tabindex="-1" role="dialog" aria-labelledby="shareLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="shareLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="" method="post">
                                  <input type="text" class="form-control" placeholder="팁을 입력 하세요">
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary">계획 공유하기</button>
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
          <a role="button" href="{{----}}" aria-label="Left Align" class="btn btn-sm btn-default disabled">
            콘텐츠 툴
          </a>
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
