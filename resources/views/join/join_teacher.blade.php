@extends('master')

@section('title' , '교사 회원가입')

@section('content')
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container col-lg-6 col-lg-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">교사 회원 가입
             <a role="button" href="" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              뒤로 돌아가기
            </a>
          </h3>
          {{-- 향후 추가사항 검증후 알림 팝업이 아닌 동적 검증(색 변화) --}}
        </div>
        <div class="panel-body">
          <form class="form-horizontal col-sm-12" action="#" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="input-group">
                  <input type="text" class="form-control" name="id" placeholder="아이디 입력">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">중복확인</button>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-1">
                <input type="text" class="form-control" name="password" placeholder="비밀번호">
              </div>
            </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
              <input type="text" class="form-control" name="" placeholder="비밀번호 재확인">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
              <input type="text" class="form-control" name="name" value="" placeholder="이름">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
              <input type="text" class="form-control" name="phone" placeholder="전화번호">
            </div>
          </div>

          <div class="clearfix">

          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
              <input type="text" class="form-control" name="school" placeholder="소속 학교">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
              <input type="text" class="form-control" name="charge_class" placeholder="담당 학반">
            </div>
          </div>

          <button class="btn btn-default col-sm-10 col-sm-offset-1" type="submit" name="button">회원가입</button>

        </div>{{-- panel-body --}}
      </form>
      </div>{{-- pannel panel-body --}}
    </div>{{-- container --}}
  </div>{{-- bluebg --}}
@endsection
