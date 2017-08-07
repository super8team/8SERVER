<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">


</script>
<body onload='resizeWindow(this);myfunction({{$package_avg}});'>
  <span id = "content_wrapper">
    <div>
      @php
        $url = Storage::url('packageImgs/'.$package_img);
      @endphp
      <img src="http://163.44.166.91/LEARnFUN/public/storage/{{$url}}" alt="콘텐츠 이미지" class="content_img">
      <div style="display:inline">
        <span class="star-input" style="margin-top:170px; margin-left:100px;">
          <span class="input" style="margin-top:50px">
            <input type="radio" name="star-input" id="p1" value="1" disabled><label for="p1">1</label>
            <input type="radio" name="star-input" id="p2" value="2" disabled><label for="p2">2</label>
            <input type="radio" name="star-input" id="p3" value="3" disabled><label for="p3">3</label>
            <input type="radio" name="star-input" id="p4" value="4" disabled><label for="p4">4</label>
            <input type="radio" name="star-input" id="p5" value="5" disabled><label for="p5">5</label>
            <input type="radio" name="star-input" id="p6" value="6" disabled><label for="p6">6</label>
            <input type="radio" name="star-input" id="p7" value="7" disabled><label for="p7">7</label>
            <input type="radio" name="star-input" id="p8" value="8" disabled><label for="p8">8</label>
            <input type="radio" name="star-input" id="p9" value="9" disabled><label for="p9">9</label>
            <input type="radio" name="star-input" id="p10" value="10" disabled><label for="p10">10</label>
          </span>
        </div>
      <output for="star-input" hidden><b>0</b>점</output>
      </span>
    </div>
    <div id = "detail_article">
      <input id = "date"     type="text" name="" value="{{$write_date}}" readonly>
      <input id = "writer"   type="text" name="" value="작성자:{{$writer}}" readonly>
      <input id = "download" type="text" name="" value="다운로드수:{{$download_count}}" readonly>
      <input id = "name" type="text" name="" value="이름:{{$package_name}}" readonly>
    </div>
    <div>
      <textarea name="name" rows="8" cols="80" font-size="20px" readonly>{{$package_subs}}</textarea>
    </div>
    <div>
      여기는 패키지에 해당하는 콘텐츠들의 리스트입니다
    </div>
    <!-- 컨트롤러에서 넘어온 패키지의 콘텐츠 배열이 넘어와서 출력해준다 -->

      <!-- window.location.href = "/toolShareDownload?package_num="+package_num; -->
    <form action="{{route('contents.shareDownload')}}" method="post" >

      @for($i = 0; $i < count($contents_name); $i++)
        <input type="checkbox" name="choice_content[]" value="{{$contents_name[$i]['id']}}">{{$contents_name[$i]['name']}}</input>
      @endfor
      <br>
       {{ csrf_field() }}
      <input type="submit" name="" value="콘텐츠 다운로드">
    </form>
  </span>

  <button type="button" name="button" onclick="history.back();">뒤로가기</button>

  <!-- <button id="content_download" type="button" name="button">다운로드</button> -->

  <script type="text/javascript">
  function resizeWindow(win)    {

  var wid = 590;

  var hei = 590;        //30 과 40은 넉넉하게 하려는 임의의 값임

  win.resizeTo(wid,hei);

  }
              function myfunction(s){
                if(1<=s && s<2)
                    document.getElementsByName('star-input')[0].checked=true;
                if(2<=s && s<3)
                    document.getElementsByName('star-input')[1].checked=true;
                if(3<=s && s<4)
                    document.getElementsByName('star-input')[2].checked=true;
                if(4<=s && s<5)
                    document.getElementsByName('star-input')[3].checked=true;
                if(5<=s && s<6)
                    document.getElementsByName('star-input')[4].checked=true;
                if(6<=s && s<7)
                    document.getElementsByName('star-input')[5].checked=true;
                if(7<=s && s<8)
                    document.getElementsByName('star-input')[6].checked=true;
                if(8<=s && s<9)
                    document.getElementsByName('star-input')[7].checked=true;
                if(9<=s && s<10)
                    document.getElementsByName('star-input')[8].checked=true;
                if(s==10)
                    document.getElementsByName('star-input')[9].checked=true;
              }

            var starRating = function(){
            var $star = $(".star-input"),
                $result = $star.find("output>b");
            $(document)
              .on("focusin", ".star-input>.input", function(){
              $(this).addClass("focus");
            })
              .on("focusout", ".star-input>.input", function(){
              var $this = $(this);
              setTimeout(function(){
                if($this.find(":focus").length === 0){
                  $this.removeClass("focus");
                }
              }, 100);
            })
              .on("change", ".star-input :radio", function(){
              $result.text($(this).next().text());
            })
              .on("mouseover", ".star-input label", function(){
              $result.text($(this).text());
            })
              .on("mouseleave", ".star-input>.input", function(){
              var $checked = $star.find(":checked");
              if($checked.length === 0){
                $result.text("0");
              } else {
                $result.text($checked.next().text());
              }
            });
            };
            starRating();
  $(document).ready(function(){
    document.getElementById('content_download').addEventListener('click',function(){
      var package_num = document.getElementsByName('package_num')[0].value;
      window.location.href = "LEARnFUN/public/toolShareDownload?package_num="+package_num;
    });
  });

  </script>
</body>
