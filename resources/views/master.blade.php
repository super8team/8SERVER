<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- 위에서 3번째 까지 메타태그를 건들면 아주 주옥 되는것야 --}}

    {{--브라우저 타이틀 옆 아이콘  --}}
    {{-- <link rel="icon" href="#"> --}}

    {{-- 제목 받는 곳 --}}
    <title> @yield('title')</title>

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">

    {{-- 커스텀 css --}}
    <link rel="stylesheet" href="../public/css/custom.css">


    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
    {{--  --}}
    <script src="../public/js/parallax.js"></script>
    <script type="text/javascript">

      //<![CDATA[
      $(document).ready(function(){

        // 페이지별로 클래스 등등 변환 하기

        // 홈페이지 url 받아오기
        var currurl = "{{url()->current()}}";

        //37번째 이후 의 문자열을 가저옴 http://localhost/Code/laravel/public/home
        // 폴더 화 가 되었으니 explode 를 사용 하거나 하기
        currurl = currurl.substr(37);

        //확인용 메세지


        //페이지별 css 변환
        //  url 별로 하니 피곤하다 사용자 별로 하는게 더 쉬울듯?
        if (currurl == 'home') {
          $("#left_menu li:first").addClass(" active ");  //만약 active 가 다른페이지로 이동해도 남아있는경우 removeClass 넣어주기
        }
        else if (currurl == 'teacher'){
          $("nav").removeClass(' navbar-home').addClass('navbar-teacher');
        }else if (currurl == 'planlist'){
          $("nav#navbar").removeClass(' navbar-home').addClass('navbar-teacher');
        }else if (currurl == 'plan'){
          $("nav#navbar").removeClass(' navbar-home').addClass('navbar-teacher');
        }

        else{
          window.alert(currurl+' url 설정하라!');
        }


      });
      //]]>


    </script>
  </head>

  <body>
    @php

      $home = "http://localhost/Code/laravel/public/home";


    @endphp
    {{-- 메인 --}}
    <!-- 상단 고정 메뉴바 fixed static navbar -->
    <nav id="navbar" class="navbar navbar-home navbar-fixed-top" role="navigation" style="margin-bottom: 0">
      <div class="container">
        <div class="navbar-header">
          {{-- 화면 폭이 768px 이하로 내려가면 드롭다운 아이콘 이나타남 아이콘 만들기 --}}
          <button type="button" class="navbar-toggle collapsed"
          data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{-- 상표 이미지 로고 --}}
          <img class="navbar-brand"
          src="https://image-proxy.namuwikiusercontent.com/r/https%3A%2F%2Ftgd.kr%2Ffiles%2Fattach%2Fimages%2F248844%2F852%2F473%2F8a9deaef5fb4817b39f253cbafa79105.png"
           alt="">
           {{-- 상표 이름 적기 --}}
          <a class="navbar-brand" href="{{$home}}">LEAN&FUN</a>
        </div>
        <div class="navbar-collapse collapse text-center">
          {{-- <ul id="left_menu" class="nav navbar-nav">
             현제 어느 페이지에 있는지 알려주는거 마스터 템플릿에 넣을라면 구분해야함lo
            <li><a href="{{$home}}">홈페이지</a></li>
            <li><a href="#about">만든 사람들</a></li>
          </ul> --}}
          {{-- 세션 추가 할 곳 --}}
          @if (1)
            <ul id="right_menu" class="nav navbar-nav navbar-right">
              <li class="nav-divider"></li>
              <li><a href="#">로그인</a></li>
              <li><a href="#/">회원가입</a></li>
            </ul>
          @else
          <ul id="right_menu" class="nav navbar-nav navbar-right">
            <li class="nav-divider"></li>
            <li><a href="#">교사 학x2</a></li>
            <li><a href="#/">회원정보 수정</a></li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    {{-- ***************** 내용 들어가는 곳 ***************** --}}
    @yield('content')


    <footer class="footer text-center" style="background-color:#9197B5; color: #FFFFFF;" >
      <div class="container">
        <p class="">&copy; Since 2017 Super8TeamLEAN&FUN Project Company, Inc.</p>
      </div>
    </footer>
  </body>
</html>
