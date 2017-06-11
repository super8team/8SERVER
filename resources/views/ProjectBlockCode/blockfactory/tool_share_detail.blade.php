<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<body>
  <span id = "content_wrapper">
    <div>
      <img src="" alt="콘텐츠 이미지" class="content_img">
      <input type="text" name="package_name" value="패키지명" style="vertical-align:top">
      <input type="text" name="package_num" value="{{$id}}" hidden>
    </div>
    <div id = "detail_article">
      <input id = "date"     type="text" name="" value="작성일">
      <input id = "writer"   type="text" name="" value="작성자">
      <input id = "download" type="text" name="" value="다운수">
    </div>
    <div>
      <textarea name="name" rows="8" cols="80">설명</textarea>
    </div>
  </span>

  <button id="content_download" type="button" name="button">다운로드</button>

  <script type="text/javascript">
  $(document).ready(function(){
    document.getElementById('content_download').addEventListener('click',function(){
      var package_num = document.getElementsByName('package_num')[0].value;
      window.location.href = "/toolShareDownload?package_num="+package_num;
    });
  });

  </script>
</body>
