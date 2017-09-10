<!DOCTYPE html>
<html>
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
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
      <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- 부트스트랩 -->
    {{-- <link href="../public/css/bootstrap.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    {{-- 커스텀 css --}}
    {{-- <link rel="stylesheet" href="../public/css/custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('js/parallax.js') }}"></script>
    <configuration>
      <system.webServer>
        <staticContent>
          <remove fileExtension=".woff2" />
          <mimeMap fileExtension=".woff2" mimeType="application/font-woff2" />
        </staticContent>
        </system.webServer>
    </configuration>
    <style media="screen">

    </style>
    <script type="text/javascript">

      //<![CDATA[
      $(document).ready(function(){
        // 페이지별로 클래스 등등 변환 하기

        // 홈페이지 url 받아오기
        var currurl = "{{url()->current()}}";
        var user    = "{{'teacher'}}"; // 학생 학부모 교사 에 따라 css 변경


        //37번째 이후 의 문자열을 가저옴 http://localhost/Code/laravel/public/home
        // 폴더 화 가 되었으니 explode 를 사용 하거나 하기
        currurl = currurl.substr(37);

        //확인용 메세지


        //페이지별 css 변환
        //  url 별로 하니 피곤하다 사용자 별로 하는게 더 쉬울듯?

        // if (currurl == 'home') {
        //   $("#left_menu li:first").addClass(" active ");  //만약 active 가 다른페이지로 이동해도 남아있는경우 removeClass 넣어주기
        // }
        // else if (currurl == 'teacher'){
        //   $("nav").removeClass(' navbar-home').addClass('navbar-teacher');
        // }else if (currurl == 'planlist'){
        //   $("nav#navbar").removeClass(' navbar-home').addClass('navbar-teacher');
        // }else if (currurl == 'plan'){
        //   $("nav#navbar").removeClass(' navbar-home').addClass('navbar-teacher');
        // }
        //
        // else{
        //   window.alert(currurl+' url 설정하라!');
        // }


      });

      // ]]>

    </script>
  </head>

  <body>
    {{-- 메인 --}}
    <!-- Modal 모달 -->
    <div class="modal fade sidemenu" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ログイン</h4>
          </div>
          <div class="modal-body" style="padding-top:50px;padding-bottom:50px;">
            <div class="row">
              <form class="form  col-sm-8 col-md-offset-2" action="{{route('login')}}" method="post">
                {{ csrf_field() }}
                  <fieldset>
                      <div class="form-group">
                          <input class="form-control" placeholder="ID" name="id" type="text" value="garam70" autofocus>
                      </div>
                      <div class="form-group">
                          <input class="form-control" placeholder="Password" name="password" type="password" value="123456">
                      </div>
                      <div class="checkbox">
                          <label>
                              <input name="remember" type="checkbox" value="Remember Me">ログイン情報を保持する
                      </div>
                      <!-- Change this to a button or input when using this as a form -->
                      <p>
                        <input type="submit" name="" value="ログイン" class="btn btn-lg btn-success btn-block">
                        <!-- <a href="{{route('login')}}" class="btn btn-lg btn-success btn-block">로그인</a> -->
                      </p>
                  </fieldset>
              </form>
              <div class="col-sm-8 col-md-offset-2">
                <p><a href="{{route('register')}}" class="btn btn-lg btn-warning btn-block">新規登録</a></p>
              </div>

              <div class="col-sm-8 col-md-offset-2">
                <a href="index.html" class="btn btn-lg btn-info " style="width:182px;">IDを忘れた方</a>
                <a href="index.html" class="btn btn-lg btn-info " style="width:182px;">パスワードを忘れた方</a>
              </div>
            </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 상단 고정 메뉴바 fixed static navbar -->
    <nav class="navbar navbar-home navbar-fixed-top" role="navigation" style="margin-bottom: 0">
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
          <img class="navbar-brand" style="border-radius:70px" src="{{asset('img/logo.jpg')}}" alt="">
           {{-- 상표 이름 적기 --}}
          <a class="navbar-brand" href="{{ route('main') }}">LEARnFUN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse text-center">
          {{-- <ul id="left_menu" class="nav navbar-nav">
             현제 어느 페이지에 있는지 알려주는거 마스터 템플릿에 넣을라면 구분해야함lo
            <li><a href="{{$home}}">홈페이지</a></li>
            <li><a href="#about">만든 사람들</a></li>
          </ul> --}}
          {{-- 세션 추가 할 곳 --}}

          {{-- TODO --}}

          @if (1)
            <ul id="right_menu" class="nav navbar-nav navbar-right">
              {{-- <li class="nav-divider"></li> --}}
              <!-- Button trigger modal -->
              @if(!Auth::check())
                <li><a href="#" data-toggle="modal" data-target="#myModal">ログイン</a></li>
                <li><a href="#">新規登録</a></li>
              @else
                <li>
                  @php
                  $user_info = Auth::user();

                  if($user_info['type'] == 'student'){
                    $text = '生徒';
                  }elseif ($user_info['type'] == 'teacher'){
                    $text = '教師';
                  }else{
                    $text = '父兄';
                  }
                  @endphp
                  <a href="#" >{{$text}}</a>

                </li>
                <li>
                  <a href="#" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                    ログアウト
                  </a>
                  <form id="logout-form" class="" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                  </form>
                </li>
              @endif
            </ul>
          @else
          <ul id="right_menu" class="nav navbar-nav navbar-right">
            {{-- <li class="nav-divider"></li> --}}
            <li><a href="#">教師</a></li>
            <li><a href="#/">ユーザ譲歩修正</a></li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    {{-- ***************** 내용 들어가는 곳 ***************** --}}
    @yield('content')


    <footer class="footer text-center" style="background-color:#9197B5; color: #FFFFFF;" >
      <div class="container">
        <p class="">&copy; Since 2017 Super8TeamLEARnFUN Project Company, Inc.</p>
      </div>
    </footer>
  </body>
</html>