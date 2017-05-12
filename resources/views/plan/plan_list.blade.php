@extends('YAYAME.page.master')

@section('title','planlist')

@section('content')
  {{-- 공간 나누기용 꾸미기 바  --}}
  <div class="bluedecobar">
  </div>

  {{-- 주 내용 --}}
  {{-- 총 레코드 수를 가저오기 --}}
  {{--  fufufufufufuck! 페이징은 나중에 한다!
  라라벨 페이지네이트 사용하기--}}
  @php
    $plan_write = "http://localhost/Code/laravel/public/plan";

    $planlist_rec = 17;

    $planlist['data']['name'] = '소백산 뻐킹 체험학습';
    $planlist['data']['date'] = '2017/05/06';

  @endphp
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">계획 리스트
             <a role="button" href="{{-- --}}" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
              뒤로 돌아가기
            </a>
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
                    <a role="button"  href="{{$plan_write}}" aria-label="Right Align"
                     class="btn btn-sm btn-default ">
                      <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                      계획 작성
                    </a>
                </th>
              </tr>
            </thead>
            <tbody>
            {{-- 현장 체험학습 추가시 여기 테이블 추가 코드넣기 --}}

            {{-- 레코드를 10개 출력  --}}

            @for ($count=0; $count < 10 ; $count++)
                @if ($planlist['data']['name'] != null)
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>{{$planlist['data']['name']}}</td>
                    <td>{{$planlist['data']['date']}}</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{----}}" aria-label="Left Align" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        계획 수정
                      </a>

                      <a role="button" href="{{----}}" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        서류 작성
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        설문조사
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-info">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        상세 계획작성
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-warning">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        콘텐츠 제작
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-danger">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        폭파
                      </a>
                    </td>
                 </tr>
                @else
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>으앙아아아앙</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{----}}" aria-label="Left Align" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        계획 수정
                      </a>

                      <a role="button" href="{{----}}" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        서류 작성
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        설문조사
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-info">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        상세 계획작성
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-warning">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        콘텐츠 제작
                      </a>
                      <a role="button" href="{{----}}" class="btn btn-sm btn-danger">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        폭파
                      </a>
                    </td>
                  </tr>
                @endif
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
