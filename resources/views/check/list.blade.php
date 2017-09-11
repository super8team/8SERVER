@extends('master')

@section('title','チェックリスト')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">選んだ体験学習のチェックリスト
            <a role="button" href="{{route('plan.teacher')}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             戻る
           </a>
           <a role="button" href="{{route('checklist.write')}}" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right">
            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
            チェックリスト作成
          </a>
         </h3>

        </div>
        <div class="panel-body ">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>体験学習タイトル</th>
                <th>作成日</th>
                <th>結果確認</th>
              </tr>
            </thead>
            <tbody>
              {{-- 안전사고 예방 체크리스트 --}}
                  <tr>
                    <td>1</td>
                    <td>(基本)安全事故予防チェックリスト</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
                      </a>
                    </td>
                  </tr>
                  {{-- 수학여행 용역 업체 제안서 평가 항목 배점  --}}
                  <tr>
                    <td>2</td>
                    <td>(基本)修学旅行の用役会社提案書評価項目配点</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
                      </a>
                    </td>
                  </tr>
                  {{-- 컨설팅 체크리스트(컨설팅 내용) --}}
                  <tr>
                    <td>3</td>
                    <td>(基本)コンサルティング チェックリスト(コンサルティング内容)</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
                      </a>
                    </td>
                  </tr>
                  {{-- コンサルティング チェックリスト(措置結果) --}}
                  <tr>
                    <td>4</td>
                    <td>(基本)コンサルティング チェックリスト(措置結果)</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
                      </a>
                    </td>
                  </tr>
                  {{-- 시민감사관 현장체험학습 체크리스트 --}}
                  <tr>
                    <td>5</td>
                    <td>(基本)市民監査官の体験学習 チェックリスト</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
                      </a>
                    </td>
                  </tr>
          </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">以前に作成したチェックリスト
          </h3>

        </div>
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>体験学習名前</th>
                <th>作成日</th>
                <th>ショットカット</th>
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
                  例
                  <a role="button" href="{{$plan_modify + $num}}" class="btn btn-sm btn-primary">
                    修正
                  </a>
              @endforeach --}}
                  <tr>
                    <td>{{$count+1}}</td>
                    <td>以前に作成したチェックリスト</td>
                    <td>2017/00/00</td>
                    <td colspan="2" class="text-center">
                      <a role="button" href="{{route('checklist.view')}}" class="btn btn-sm btn-default">
                        見る
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
