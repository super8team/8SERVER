<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<link href='http://fonts.googleapis.com/earlyaccess/nanumbrushscript.css' rel='stylesheet' type='text/css'>
<body style="background-color:#e3f2ff;">

    <form class="downForm" action="{{route('contents.sharePackages')}}" method="post" enctype="multipart/form-data">
      <div class="wrapper" >
        <span id="content_wrapper">

          <div>
            <input type="file" name="package_image" style="display:block">
            <div id="holder" style="display:inline-block"></div>
            <textarea name="package_explain" rows="8" cols="80" onFocus="this.value=''" style="resize:none;height:140px" placeholder="説明を入力してください"></textarea>
            </div>
          </div>
          <br>
          <input type="text" name="package_name" placeholder="パッケージの" style="vertical-align:top;display:block" onfocus="this.value=''">
          <div id="share_contents_list">
            コンテンツリスト
          </div>
        </span>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        @foreach($teacher_contents as $teacher_content)
          <input type="checkbox" name="$downContents[]" value="{{$teacher_content->no}}" onclick="check()">
          {{$teacher_content->name}}
        @endforeach
        <br><br>
        <button type="button" name="button" onclick="history.back();">バック</button>
        <input id="sub" type="submit" value="公有完了">
      </div>
    </form>

<script type="text/javascript">
  function check()
  {
    var string = $('.wrapper').html();
    $('.downForm').appendChild(string);
  }

  var upload = document.getElementsByTagName('input')[0],
      holder = document.getElementById('holder');

  upload.onchange = function (e) {
    e.preventDefault();

    var file = upload.files[0],
        reader = new FileReader();
    reader.onload = function (event) {
      var img = new Image();
      img.src = event.target.result;
      img.width  = 140;
      img.height = 140;
      // note: no onload required since we've got the dataurl...I think! :)

      holder.innerHTML = '';
      holder.appendChild(img);
    };
    reader.readAsDataURL(file);

    return false;
  };




</script>
</body>
