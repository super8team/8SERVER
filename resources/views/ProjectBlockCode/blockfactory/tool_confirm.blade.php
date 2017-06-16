<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>tool_confirm</title>
    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </head>
  <body>
      <form id="parent" action="{{route('contents.registerToPlanDB')}}" method="get">
        <table style="width:50%;margin-left:auto;margin-right:auto">
            <tbody>
                @foreach ($picnic as $place)
                <tr>
                    <td><button style="width:90%" value="{{ $place }}">{{ $place }}</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" name="" value="등록하기">
      </form>
    <div style="float:right">
      <button id="cancel">취소</button>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      //부모 document의 명세와 xml태그들
      var contentsMyungse  = window.opener.document.getElementsByClassName("block_myungse");
      var contentsXml      = window.opener.document.getElementsByClassName("contents_xml");
      var parent           = document.getElementById('parent');
      var i;

      for (i = 0; i < contentsXml.length; i++) {
          var content_xml      = document.createElement("input");
          var content_myungse  = document.createElement("input");

          var xmlText      = contentsXml[i].value;
          var myungseText  = contentsMyungse[i].value;

          content_xml.setAttribute("type","text");
          content_xml.setAttribute("class","contents_xml");
          content_xml.setAttribute("value",xmlText);
          content_xml.setAttribute("name",'contents_xml[]');
          // content_xml.setAttribute("hidden",false);

          content_myungse.setAttribute("type","text");
          content_myungse.setAttribute("class","block_myungse");
          content_myungse.setAttribute("value",myungseText);
          content_myungse.setAttribute("name",'contents_value[]');
          
          // content_myungse.setAttribute("hidden",false);
          parent.appendChild(content_xml);
          parent.appendChild(content_myungse);
      }

        // $('#example').click(function(e){
        //   var value = e.target.getAttribute('value');
        //   var i;
        //   var parameters;
        //   var content_xml     = document.getElementsByClassName('contents_xml');
        //   var content_myungse = document.getElementsByClassName('block_myungse');
        //
        //   for(i = 0 ; i < content_xml.length ; i++){
        //     content_xml[i].value;
        //     content_myungse[i].value;
        //     parameters = parameters + '&xml'+i+'='+content_xml[i].value+'&myungse'+i+'='+content_myungse[i].value;
        //   }
        // window.location.href='/dashboard?name='+value+parameters;
        // });

      $('#cancel').click(function(){
        window.close();
      });
    });
    </script>
  </body>
</html>
