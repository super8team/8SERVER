@extends('master')

@section('title','설문조사 리스트')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      {{-- <div class="panel panel-default">
        <div class="panel-heading">
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
                  <tr>
                    <td>1</td>
                    <td>으앙아아아앙</td>
                    <td>0000/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('survey.show', 2)}}" class="btn btn-sm btn-danger">
                        보기
                      </a>
                    </td>
                  </tr>
          </tbody>
          </table>
        </div>
      </div> --}}
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">선택한 체험학습의 설문조사
            <a role="button" href="javascript:history.back()" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             뒤로 돌아가기
           </a>
           <a role="button" href="{{route('survey.create')}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            설문조사 작성
          </a>
         </h3>
          {{-- <h3 class="panel-title">이전에 작성한 설문조사 리스트
          </h3> --}}

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
            @php
            //임시로 최신순으로 불러오기 위해 배열 뒤집기
            // $survey_title = array_reverse($survey_title);
            // $survey_date  = array_reverse($survey_date);
            // $surveies     = array_reverse($surveies);
            @endphp
            @for ($count=0; $count < count($survey_title) ; $count++)
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>{{$survey_title[$count]}}</td>
                    <td>{{$survey_date[$count]}}</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('survey.show',$survey_no[$count])}}" class="btn btn-sm btn-warning">
                        보기
                      </a>
                      <a role="button" href="{{--route('survey.respond.show',$survey_no[$count])--}}" class="btn btn-sm btn-danger">
                        결과보기
                      </a>
                    </td>
                  </tr>
            @endfor
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
