<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>tool_confirm</title>
    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
  </head>
  <body>
      <form id="parent" action="{{route('contents.registerToPlanDB')}}" method="get">
        <table style="width:70%;margin-left:auto;margin-right:auto;">
            <tbody>
                <tr style="border:1px solid">
                  <td style="border:1px solid;text-align:center">
                    체험 학습 리스트
                  </td>
                  <td style="border:1px solid;text-align:center">
                    선택 가능한 패키지 리스트
                  </td>
                </tr>
                @for($j = 0; $j < $field_count; $j++)
                <tr style="border:1px solid">
                    <td style="border:1px solid;text-align:center">
                      <input type="button" value="{{ $field_lists[$j]['name']}}">
                      <input type="text" name="field_list[]" style="" value="{{ $field_lists[$j]['no']}}" hidden>
                    </td>
                    <td style="border:1px solid;vertical-align:middle;text-align:center" class="package_name">
                      @for ($i = 0; $i < $package_count ; $i++)
                           <input type="checkbox" name="package[{{$j}}][]" value="{{$package[$i]['no']}}" onclick="oneCheckbox(this)">{{ $package[$i]['name'] }}
                           <br>
                      @endfor
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div>
          <!-- 컨텐츠에 사용 될 이미지를 전부 저장해 주세요 -->
          <div class="">
            <!-- <input type="file" name="contents_img[]" value=""> -->

          </div>
        </div>
        {{ csrf_field() }}
        <div>
          <input type="submit" name="" value="등록하기">
          <button id="cancel">
            취소
          </button>
        </div>
      </form>

    <script type="text/javascript">
    $(document).ready(function(){
      //패키지를 선택해서 심어보자!
      //패키지를 선택하도록 해서 패키지의 아이디 값을 db로 넘겨서
      //그 패키지안의 콘텐츠들을 심어보자
    //   var owner_packages = window.opener.document.getElementById('packageDiv');
    //   var owner_child    = owner_packages.childNodes;
    //   var place_list     = document.getElementsByClassName('place_list');
    //   var package_infor;
    //   var owner_pk_array = [];
    //   var n = 0;
    //   for(var i = 0; i<owner_child.length;i++){
    //     // console.log(owner_child);
    //     if(owner_child[i].nodeName != '#text'){
    //           var package_name   = owner_child[i].innerText;
    //           var package_id     = owner_child[i].value;
    //           // console.log(package_name);
    //           package_infor  = document.createElement("input");
    //           package_infor.setAttribute("type","checkbox");
    //           package_infor.setAttribute("value",package_name);
    //           package_infor.setAttribute("name",'contents[]');
    //           package_infor.appendChild(document.createTextNode(package_name));
    //           owner_pk_array[n] = package_infor;
    //           n++;
    //     }
    //     // console.log(owner_child[i].nodeName);
    //   }
    //
    //   // for(var i = 0; i< owner_pk_array.length; i++)
    //   // {
    //   //   console.log(owner_pk_array[i]);
    //   // }
    //
    //   for(var i = 0; i< place_list.length;i++){
    //     for (var j = 0; j < owner_pk_array.length; j++) {
    //       place_list[i].appendChild(owner_pk_array[j])
    //     }
    // }
        // console.log(place_list[i]./childNodes);
          // place_list[0].appendChild(owner_pk_array[1]);


      //2
      // for(var i = 0; i<owner_pk_array.length; i++){
      //   if(owner_pk_array[i]){
      //     console.log(owner_pk_array);
      //     console.log(i);
      //     for(var j = 0; j < place_list.length;j++){
      //       console.log(owner_pk_array[j])
      //       console.log(place_list.childNodes)
      //       place_list.childNodes[j].appendChild(owner_pk_array[j]);
      //     }
      //   }
      // }
      // $('body').appendChild(owner_packages);



      //부모 document의 명세와 xml태그들
      // var contentsMyungse  = window.opener.document.getElementsByClassName("block_myungse");
      // var contentsXml      = window.opener.document.getElementsByClassName("contents_xml");
      // var parent           = document.getElementById('parent');
      // var i;
      //
      // for (i = 0; i < contentsXml.length; i++) {
      //     var content_xml      = document.createElement("input");
      //     var content_myungse  = document.createElement("input");
      //
      //     var xmlText      = contentsXml[i].value;
      //     var myungseText  = contentsMyungse[i].value;
      //
      //     content_xml.setAttribute("type","text");
      //     content_xml.setAttribute("class","contents_xml");
      //     content_xml.setAttribute("value",xmlText);
      //     content_xml.setAttribute("name",'contents_xml[]');
      //     // content_xml.setAttribute("hidden",false);
      //
      //     content_myungse.setAttribute("type","text");
      //     content_myungse.setAttribute("class","block_myungse");
      //     content_myungse.setAttribute("value",myungseText);
      //     content_myungse.setAttribute("name",'contents_value[]');
      //
      //     // content_myungse.setAttribute("hidden",false);
      //     parent.appendChild(content_xml);
      //     parent.appendChild(content_myungse);
      // }

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
