<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">

</script>
<body>

    <form action="{{ action('UserController@store') }}" method="get">
      <div id="wrapper">
        <span id="content_wrapper">
          <div>
            <img src="" alt="콘텐츠 이미지" class="content_img">
            <input  type="text" name="package_name" value="" style="vertical-align:top">
          </div>
          <br>
          <div>
            <textarea name="package_explain" rows="8" cols="80">설명</textarea>
          </div>
          <div  id="contents_list">
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
      console.log(blockLibOpt);
      // 네임을 추출하는 과정
      var contentsname         = contentsMyungse[0].value;
      var xmlValue             = JSON.parse(contentsname);
      var wrapper              = document.getElementById('information');
      // var list_parent          = document.getElementById('information');

      var i;

      for (i = 0; i < contentsXml.length; i++) {
          //dom element를 생성함
          var content_xml      = document.createElement("input");
          var content_myungse  = document.createElement("input");
          var content_name     = document.createElement("input");

          //dom element 애트리뷰트 설정
          var xmlText          = contentsXml[i].value;
          var myungseText      = contentsMyungse[i].value;
          var myungse_obj      = JSON.parse(myungseText);
          var myungse_name     = myungse_obj.type;

          //checkbox 값 설정
          var name_txt         = document.createTextNode(myungse_name);


          //setAttribute -> 가져온 값들로 생성
          content_name.setAttribute("type","checkbox");
          content_name.setAttribute("class","content_name");
          content_name.setAttribute("value",myungse_name);
          content_name.setAttribute("name","contents_name[]");
          content_name.setAttribute("id",i);

          // myungse_name[i]

          content_xml.setAttribute("type","text");
          content_xml.setAttribute("class","contents_xml");
          // xmlText = $.parseXML(xmlText);
          content_xml.setAttribute("value",xmlText);
          content_xml.setAttribute("name","content_xml_num"+i);
          // content_xml.setAttribute("hidden",false);

          content_myungse.setAttribute("type","text");
          content_myungse.setAttribute("class","block_myungse");
          content_myungse.setAttribute("value",myungseText);
          content_myungse.setAttribute("name","block_myungse_num"+i);
          // content_myungse.setAttribute("hidden",false);

          parent.appendChild(content_xml);
          parent.appendChild(content_myungse);
          parent.appendChild(content_name);
          parent.appendChild(name_txt);
      }

    });


</script>
</body>
