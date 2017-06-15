@extends('master')

@section('title','체크 리스트')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">선택한 체험학습의 체크리스트
            <a role="button" href="{{route('plan.teacher')}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           <a role="button" href="{{route('checklist.write')}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            체크리스트 작성
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
                <th>결과보기</th>
              </tr>
            </thead>
            <tbody>
              {{-- 안전사고 예방 체크리스트 --}}
                  <tr>
                    <td>1</td>
                    <td>(기본)안전사고 예방 체크리스트</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
                  {{-- 수학여행 용역 업체 제안서 평가 항목 배점  --}}
                  <tr>
                    <td>2</td>
                    <td>(기본)수학여행 용역 업체 제안서 평가 항목 배점</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
                  {{-- 컨설팅 체크리스트(컨설팅 내용) --}}
                  <tr>
                    <td>3</td>
                    <td>(기본)컨설팅 체크리스트(컨설팅 내용)</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
                  {{-- 컨설팅 체크리스트(조치 결과) --}}
                  <tr>
                    <td>4</td>
                    <td>(기본)컨설팅 체크리스트(조치 결과)</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
                  {{-- 시민감사관 현장체험학습 체크리스트 --}}
                  <tr>
                    <td>5</td>
                    <td>(기본)시민감사관 현장체험학습 체크리스트</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
          </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">이전에 작성한 체크리스트 리스트
          </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>체험 학습 이름</th>
                <th>작성일</th>
                <th>바로가기</th>
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
                    <td>으앙아아아앙</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{----}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
            @endfor
          </tbody>
          </table>
          {{-- 여기 페이징 기능점요 ㅋ --}}
        </div>
      </div>
    </div>
  </div>
@endsection
