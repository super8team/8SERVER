<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">
 $(document).ready(function(){


 });

 document.getElementsByClassName
</script>
<body>

    <form class="downForm"action="{{route('contents.sharePackages')}}" method="get" enctype="multipart/form-data">
      <div class="wrapper" >
        <span id="content_wrapper">
          <div>
            <input name="picture" type="file">
            <div id="holder" style="border:1px solid;width:120px;height:120px"></div>
            <input type="text" name="package_name" value="패키지 이름" style="vertical-align:top" onfocus="this.value=''">
          </div>
          <br>
          <div>
            <textarea name="package_explain" rows="8" cols="80" onFocus="this.value=''">설명</textarea>
          </div>
          <div id="share_contents_list">
            콘텐츠 목록
          </div>
        </span>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        @foreach($teacher_contents as $teacher_content)
          <input type="checkbox" name="$downContents[]" value="{{$teacher_content->no}}" onclick="check()">{{$teacher_content->name}}
        @endforeach
        <br><br>
        <button type="button" name="button" onclick="history.back();">뒤로가기</button>
        <input id="sub" type="submit" value="공유 완료">
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
    img.width = 120;
    img.height = 120;
    // note: no onload required since we've got the dataurl...I think! :)

    holder.innerHTML = '';
    holder.appendChild(img);
  };
  reader.readAsDataURL(file);

  return false;
};




</script>
</body>
