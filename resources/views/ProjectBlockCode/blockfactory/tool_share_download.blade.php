<link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript">
    function oneCheckbox(a){
        var obj = document.getElementsByName("package_name");
        for(var i=0; i<obj.length; i++){
              if(obj[i] != a){
                obj[i].checked = false;
              }
            }
      }
    </script>

    <meta charset="utf-8">
    <title>다운로드</title>
  </head>
  <body>
    <form action="{{ route('newPackage') }}">
        <button id="new_package"  type="button" name="button">새패키지로 추가 </button>
        <button id="base_package" type="button" name="button">현재패키지로 추가</button>

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div id = "contents_list_wrap">
          <div id="base_package_list">

          </div>
          <div id = "contents_list">
            콘텐츠 목록
          </div>
          @foreach($contents as $key => $value)
            <input id="content{{$key}}" type="checkbox" name="content[]" value="{{$value}}">{{$value}}
          @endforeach
        <div>

        <input type="submit" value="등록하기">
  </form>
  <script type="text/javascript">
    $(document).ready(function(){

        document.getElementById("base_package").addEventListener('click',function(){
            var owner_package_list  = window.opener.document.getElementById("packageDiv").children;
            var package_parent      = document.getElementById("base_package_list");

            for(var i = 0; i < owner_package_list.length ; i++) {
                  var package_list      =    document.createElement("input");
                  package_list.setAttribute("type","checkbox");
                  package_list.setAttribute("value",owner_package_list[i].value);
                  package_list.setAttribute("name","package_name");
                  package_list.setAttribute("onclick","oneCheckbox(this)");
                  var package_text   =   document.createTextNode(owner_package_list[i].value);
                  package_parent.appendChild(package_list);
                  package_parent.appendChild(package_text);
            }
        });




      document.getElementById('new_package').addEventListener('click',function(){
          var check_num = $("input[type=checkbox]:checked").length;
          if(!check_num)
              alert('다운로드 할 콘텐츠를 선택하세요');
          else{
              var new_package_name    = prompt("새로운 패키지 명을 입력해 주세요", "New Package");
              var parent              = document.getElementById("contents_list_wrap");
              var new_package_obj     = document.createElement("input");

              new_package_obj.setAttribute("type","text");
              new_package_obj.setAttribute("value",new_package_name);
              new_package_obj.setAttribute("name","new_package");
              parent.appendChild(new_package_obj);
              $("input[type=submit]").click();
          }
        });

      });
  </script>
  </body>
</html>
