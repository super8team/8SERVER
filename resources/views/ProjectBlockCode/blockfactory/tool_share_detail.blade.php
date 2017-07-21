<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<body>
  <span id = "content_wrapper">
    <div>
      @php
        $url = Storage::url('packageImgs/'.$package_img);
      @endphp
      <img src="http://163.44.166.91/LEARnFUN/public/{{$url}}" alt="콘텐츠 이미지" class="content_img">

      <span class="star-input">
        <span class="input">
          <input type="radio" name="star-input" id="p1" value="1"><label for="p1">1</label>
          <input type="radio" name="star-input" id="p2" value="2"><label for="p2">2</label>
          <input type="radio" name="star-input" id="p3" value="3"><label for="p3">3</label>
          <input type="radio" name="star-input" id="p4" value="4"><label for="p4">4</label>
          <input type="radio" name="star-input" id="p5" value="5"><label for="p5">5</label>
          <input type="radio" name="star-input" id="p6" value="6"><label for="p6">6</label>
          <input type="radio" name="star-input" id="p7" value="7"><label for="p7">7</label>
          <input type="radio" name="star-input" id="p8" value="8"><label for="p8">8</label>
          <input type="radio" name="star-input" id="p9" value="9"><label for="p9">9</label>
          <input type="radio" name="star-input" id="p10" value="10"><label for="p10">10</label>
        </span>
      <output for="star-input"><b>0</b>점</output>
      </span>

    </div>
    <div id = "detail_article">
      <input id = "date"     type="text" name="" value="{{$write_date}}" readonly>
      <input id = "writer"   type="text" name="" value="작성자:{{$writer}}" readonly>
      <input id = "download" type="text" name="" value="다운로드수:{{$download_count}}" readonly>
      <input id = "name" type="text" name="" value="이름:{{$package_name}}" readonly>
    </div>
    <div>
      <textarea name="name" rows="8" cols="80" readonly>{{$package_subs}}</textarea>
    </div>
    <div style="border:1px solid black">
      여기는 패키지에 해당하는 콘텐츠들의 리스트입니다
    </div>
    <!-- 컨트롤러에서 넘어온 패키지의 콘텐츠 배열이 넘어와서 출력해준다 -->

      <!-- window.location.href = "/toolShareDownload?package_num="+package_num; -->
    <form action="{{route('contents.shareDownload')}}" method="post" style="border:1px solid black">

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
  $(document).ready(function(){
    document.getElementById('content_download').addEventListener('click',function(){
      var package_num = document.getElementsByName('package_num')[0].value;
      window.location.href = "LEARnFUN/public/toolShareDownload?package_num="+package_num;
    });
  });

  </script>
</body>
