<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">

</script>
<body>

    <form action="" method="get" enctype="multipart/form-data">
      <div id="wrapper">
        <span id="content_wrapper">
          <div>
            <input type="file">
            <div id="holder" style="border:1px solid;width:120px;height:120px"></div>
            <input type="text" name="package_name" value="패키지 이름" style="vertical-align:top" onfocus="this.value=''">
          </div>
          <br>
          <div>
            <textarea name="package_explain" rows="8" cols="80" onFocus="this.value=''">설명</textarea>
          </div>
          <div id="contents_list">
            콘텐츠 목록
          </div>
        </span>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div id="information" style="border: 1px solid ">

        </div>
        <input id="sub" type="submit" value="공유 완료">
      </div>
    </form>

<script type="text/javascript">

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

    $(document).ready(function(){
      var parent = document.getElementById("information");

      document.getElementById("sub").addEventListener('click',function(){
        // var a = $("input[name=contents_name]:checked").val();
        // console.log(a);
        var parent   = document.getElementById("wrapper");
        // var ch_num   = $("input[type=checkbox]").length;
        var ch_obj   = document.getElementsByClassName("content_name");

        for(var i=0 ; i<ch_obj.length ; i++){
          var bool   = ch_obj[i].checked;
          console.log(bool);
          if(!bool){
            var x = document.getElementsByClassName('contents_xml')[i];
            x.remove();
            var y = document.getElementsByClassName('block_myungse')[i];
            y.remove();
          }
        }
      });

      var contentsXml          = window.opener.document.getElementsByClassName("contents_xml");
      var contentsMyungse      = window.opener.document.getElementsByClassName("block_myungse");
      var blockLibOpt          = window.opener.document.getElementsByClassName("content_list");

      // 네임을 추출하는 과정
      //var contentsname         = contentsMyungse[0].value;
      // var xmlValue             = JSON.parse(contentsname);
      //var xmlValue             = contentsname;
      // var list_parent          = document.getElementById('information');

      var i;
      //창에서 추가한 블럭의 대한 명세와 xml 코드는 가져올 수 있기 때문에 가능함
      //하지만 지금 안되는 이유는 DB에서 명세와 xml코드를 가져오지 않았기 때문에 불가능함!
      for (i = 0; i < contentsXml.length; i++) {
          //dom element를 생성함
          console.log(contentsMyungse[i]);
          console.log(contentsXml[i]);
          console.log(blockLibOpt[i]);
          var parent           = document.getElementById("information");
          var check_parent     = document.createElement("div");
          var content_xml      = document.createElement("input");
          var content_myungse  = document.createElement("input");
          var content_name     = document.createElement("input");

          //dom element 애트리뷰트 설정
          var xmlText          = contentsXml[i].value;
          console.log(contentsMyungse[i]);
          var myungseText      = contentsMyungse[i].value;
          // console.log(myungseText);
          // var myungse_obj      = JSON.parse(myungseText);
          var myungse_name     = blockLibOpt[i].textContent;

          //checkbox 값 설정
          var name_txt         = document.createTextNode(myungse_name);


          check_parent.setAttribute("class","check_parent");

          //setAttribute -> 가져온 값들로 생성
          content_name.setAttribute("type","checkbox");
          content_name.setAttribute("class","content_name");
          content_name.setAttribute("value",myungse_name);
          content_name.setAttribute("name","contents_name[]");
          content_name.setAttribute("id",i);


          content_xml.setAttribute("type","text");
          content_xml.setAttribute("class","contents_xml");
          // xmlText = $.parseXML(xmlText);
          content_xml.setAttribute("value",xmlText);
          content_xml.setAttribute("name","content_xml_num"+i);
          content_xml.setAttribute("hidden",true);

          content_myungse.setAttribute("type","text");
          content_myungse.setAttribute("class","block_myungse");
          content_myungse.setAttribute("value",myungseText);
          content_myungse.setAttribute("name","block_myungse_num"+i);
          content_myungse.setAttribute("hidden",true);

          check_parent.appendChild(content_name);
          check_parent.appendChild(name_txt);
          check_parent.appendChild(content_xml);
          check_parent.appendChild(content_myungse);

          parent.appendChild(check_parent);


      }

    });


</script>
</body>
