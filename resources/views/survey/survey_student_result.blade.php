@extends('master')

@section('title','설문조사 결과 확인(학생)')

@section('content')
    <div class="bluedecobar">
    </div>
    <div class="bluebg">
        <div class="container">
            <form class="form-horizontal" name="survey_write_submit" action=""  method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading" style="height:55px;">
                        <h3 class="panel-title">
                            <div class="well well-sm col-sm-4">
                                {{$survey_title}}
                            </div>
                            <a role="button" class="btn btn-default pull-right" href="{{route('survey.index')}}" aria-label="Right Align"
                               class="btn btn-sm btn-default ">
                                 <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                                리스트로 돌아가기
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
                                                <label>정답을 정해 주세요</label>
                                            </div>
                                            <div class='col-sm-4'>
                                              @if ($resp[$i] == 'true')
                                                <label class='checkbox-inline margin-right-3'>
                                                      <input type='radio' value='true' name='resp[{{$i}}]' checked='checked'>참
                                                </label>                                                
                                                <label class='checkbox-inline margin-right-3'>
                                                    <input type='radio' value='false' name='resp[{{$i}}]'>거짓
                                                </label>
                                              @else
                                                <label class='checkbox-inline margin-right-3'>
                                                      <input type='radio' value='true' name='resp[{{$i}}]'>참
                                                </label>                                                
                                                <label class='checkbox-inline margin-right-3'>
                                                    <input type='radio' value='false' name='resp[{{$i}}]' checked='checked'>거짓
                                                </label>
                                              @endif
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
                                                <h4><label class='col-sm-1 text-left'>Q{{$i+1}}</label></h4>
                                            </div>
                                            <div class='col-sm-9'>
                                                <h4>{{$q_title[$i][1]}}</h4>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <div class='form-group col-sm-12'>
                                                <ul class="list-group">
                                                    @for ($t=0 ; $t <count($q_title[$i][2]) ; $t++)
                                                         <input type='hidden' class='form-control ' name='q_result[{{$i}}][1][{{$t}}]'
                                                       value="{{$q_title[$i][2][$t]}}">
                                                        <div class="col-sm-12">
                                                            <li class="list-group-item col-sm-12">
                                                                 <blockquote>
                                                                <p>
                                                                <span class="badge"></span>
                                                                <h4>
                                                                    <span class="label label-default">{{$t+1}}</span>&nbsp;&nbsp;&nbsp;
                                                                    {{$q_title[$i][2][$t]}}
                                                                    <label class='checkbox-inline margin-right-3 pull-right'>
                                                                        <input type='radio' value='{{$t}}' name='resp[{{$i}}]'
                                                                        @if($resp[$i] == $t) checked='checked' @endif>선택
                                                                    </label>
                                                                </h4>
                                                                </p>
                                                                 </blockquote>
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
                                                <h4>{{$q_title[$i][1]}}</h4>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <textarea class='form-control' rows='5' name='resp[{{$i}}]' placeholder='{{$resp[$i]}}' ></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </form>
          </div>
    </div>
@endsection
