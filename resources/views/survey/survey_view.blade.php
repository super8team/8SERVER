@extends('master')

@section('title','アンケートリスト')

@section('content')
  @php
    $user_kind = Auth::user();
  @endphp
  <div class="bluedecobar">
  </div>
  <div class="bluebg">
    <div class="container">
      <form class="form-horizontal" name="survey_write_submit"
      action="{{route('survey.respond.store',$survey_no)}}"  method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="survey_no" value="{{$survey_no}}">
      <div class="panel panel-default">
        <div class="panel-heading" style="height:55px;">
          <h3 class="panel-title">
            <div class="well well-sm col-sm-4">
              {{$survey_title}}
            </div>
            <a role="button" class="btn btn-default pull-right" href="{{route('survey.index')}}" aria-label="Right Align"
            class="btn btn-sm btn-default ">
             {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
             戻る
           </a>
          </h3>
        </div>
       <div class="panel-body read_form"  style="min-height:500px;">
         @for ($i=0; $i < count($q_title) ; $i++)
            @if ($q_title[$i][0] == "ox")
              <div class='col-sm-12 OX'>
                <div class='panel panel-default'>
                  <div class='panel-heading'style='height:55px;'>
                    <div class='col-sm-1'>
                      <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                    </div>
                    <div class='col-sm-9'>
                      <h4>{{$q_title[$i][1]}}</h4>
                    </div>
                  </div>
                  <div class='panel-body'>
                    <div class='col-sm-2'>
                      <label>正解を決めてください</label>
                    </div>
                    <div class='col-sm-4'>
                      <label class='checkbox-inline margin-right-3'>
                        <input type='radio' value='true' name='resp[{{$i}}]'>True
                      </label>
                      <label class='checkbox-inline margin-right-3'>
                        <input type='radio' value='false' name='resp[{{$i}}]'>False
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            @endif

            @if ($q_title[$i][0]== "obj")
              {{-- 객관식 질문 --}}
              <div class='col-sm-12 Obj'>
              <div class='panel panel-default'>
                <div class='panel-heading' style='height:55px;'>
                  <div class='col-sm-1'>
                    <h4><label class='col-sm-1 text-left'>Q</label></h4>
                  </div>
                  <div class='col-sm-9'>
                    <h4>{{$q_title[$i][1]}}</h4>
                  </div>
                </div>
              <div class='panel-body'>
                <div class='form-group col-sm-12'>
                  {{-- input 이 클릭만 되지 않도록 하기 --}}
                    <ul class="list-group">
                      @for ($t=0 ; $t <count($q_title[$i][2]) ; $t++)
                        {{-- <input type='hidden' class='form-control ' name='q_result[{{$i}}][2][{{$t}}]'
                       value="{{$q_title[$i][2][$t]}}"> --}}
                        <div class="col-sm-12">
                          <li class="list-group-item col-sm-12">
                            {{-- <blockquote> --}}
                              <p>
                              <span class="badge"></span>
                              <h4>
                              <span class="label label-default">{{$t+1}}</span>&nbsp;&nbsp;&nbsp;
                                {{$q_title[$i][2][$t]}}
                              <label class='checkbox-inline margin-right-3 pull-right'>
                                <input type='radio' value='{{$t}}' name='resp[{{$i}}]'>選択
                              </label>
                              </h4>
                              </p>
                            {{-- </blockquote> --}}
                          </li>
                        </div>
                      @endfor
                    </ul>
                 </div>
               </div>
              </div>
            </div>
            @endif

            @if ($q_title[$i][0] == "sub")
              <div class='col-sm-12 Subjec'>
                <div class='panel panel-default'>
                  <div class='panel-heading'style='height:55px;'>
                    <div class='col-sm-1'>
                      <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                    </div>
                    <div class='col-sm-9'>
                      {{-- /*서술형 제목 입력 란*/ --}}
                      <h4>{{$q_title[$i][1]}}</h4>
                    </div>
                  </div>
                  <div class='panel-body'>
                    <textarea class='form-control' rows='5' name='resp[{{$i}}]' placeholder='内容を入力してください' ></textarea>
                  </div>
                </div>
              </div>
            @endif
         @endfor
         @if ($user_kind['type'] == 'teacher')
           <button type="submit" aria-label="Right Align"
           class="btn btn-sm btn-default pull-right disabled" style="margin-right:15px; margin-top20px;">
            アンケート完了
          </button>
        @else
          <button type="submit" aria-label="Right Align"
          class="btn btn-sm btn-default pull-right" style="margin-right:15px; margin-top20px;">
           アンケート完了
         </button>
         @endif

     </div>
    </div>
  </form>
  </div>
</div>
@endsection
