@extends('master')

@section('title','그룹리스트')

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
          <h3 class="panel-title">選択した体験学習の参加リスト
            <a role="button" href="{{route($back_route)}}" aria-label="Right Align"
            class="btn btn-sm btn-default pull-right">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             バック
           </a>
           <a role="button" href="{{route('team_list', $plan_no)}}" class="btn btn-sm btn-default pull-right">
             チーム決め
           </a>
           <form class="form" action="{{route('group_create',$plan_no)}}">
             <button type="btnSubmit"  aria-label="Right Align" class="btn btn-sm btn-default pull-right">
              参加者決め
            </button>
            {{-- <input type="hidden" name="grade_class" value="{{$grade_class_no}}"> --}}
           </form>

         </h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
              <thead>
                <th>#</th>
                <th>クラス</th>
                <th>名前</th>
              </thead>
              <tbody>
                @if ($student_name)
                  @for ($i=0; $i <count($student_name) ; $i++)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$student_class[$i]}}</td>
                      <td>{{$student_name[$i]}}
                        <input type="checkbox" name="group" value="{{$student_no[$i]}}">
                        <input type="hidden" name="grade_class" value="{{$grade_class_no[$i]}}">
                      </td>
                    </tr>
                  @endfor
                @else
                  <tr>
                    <td>000</td>
                    <td>上の機能を使用して生徒</td>
                    <td>リストを抜いてください</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
