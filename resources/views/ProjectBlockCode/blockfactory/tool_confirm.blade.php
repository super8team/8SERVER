<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>tool_confirm</title>
    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">

    <link href='http://fonts.googleapis.com/earlyaccess/nanumbrushscript.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
    function oneCheckbox(a){
        var obj = document.getElementsByName("package");

        var parent = a.parentNode
        var child  = parent.childNodes;

        for(var i=0; i<child.length; i++){
              if(child[i] != a){
                child[i].checked = false;
              }
            }
      }
    </script>
    <style media="screen">
      h2, h4{font-family:'Nanum Brush Script', serif;}
      h4 {
        margin-bottom: : 20px;
      }
    </style>
  </head>
  <body style="background-color:#e3f2ff;">
      <form id="parent" action="{{route('contents.registerToPlanDB')}}" method="get">
        <table style="width:80%;margin-left:auto;margin-right:auto;">
            <tbody>
                <tr>
                  <td style="border:1px solid;text-align:center;height:40px;width:50%;border-right:0px">
                    <h2>체험 학습 리스트</h2>
                    <h4>※ 체험 학습을 클릭 하세요</h4>
                  </td>
                  <td style="border:1px solid;text-align:center;height:40px;width:50%;border-left:0px;vertical-align:middle ">
                    <h2>선택 가능한 패키지 리스트</h2>
                  </td>
                </tr>
                @for($j = 0; $j < $field_count; $j++)
                <tr style="border:0px solid" class="test">
                    <td style="border:0px solid;text-align:center;width:50%;">
                      <input type="button" class="field_list1" value="{{ $field_lists[$j]['name']}}"
                      style="border:0px solid;vertical-align:middle;background-color:#95CDFF;width:94%;font-size:15px">

                      <input type="text"  name="field_list[]"  value="{{ $field_lists[$j]['no']}}" hidden>
                    </td>
                    <td style="vertical-align:middle;width:50%;" class="package_name" >
                      <div class ="field_list2" style="display:none">

                      @for ($i = 0; $i < $package_count ; $i++)
                           <input type="checkbox" name="package[{{$j}}][]" value="{{$package[$i]['no']}}"
                            onclick="oneCheckbox(this)" style="vertical-align:center;margin-top:10px;width:20px;">{{ $package[$i]['name'] }}
                           @if($i != 0)
                             @if($i / 2 == 0)
                                <br>
                             @endif
                           @endif
                      @endfor

                      </div>
                    </td>
                </tr>
                @endfor
                <tr>
                  <td colspan="2">
                    <input type="submit" style="margin-top:150px;" value="등록하기" style="font-size: 15px">
                    <button id="cancel" style="font-size:15px">
                      취소
                    </button>
                  </td>
                </tr>
            </tbody>
        </table>
      </form>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.field_list1').click(function(){
          var index = $('.field_list1').index(this);

          var state = $('.field_list2').eq(index).css('display');
          if(state == 'none'){ // state가 none 상태일경우
  					$('.field_list2').eq(index).show(); // ID가 moreMenu인 요소를 show();
  				}else{
  					$('.field_list2').eq(index).hide(); // ID가 moreMenu인 요소를 hide();
  				}
      });

      var btns = document.getElementsByClassName("field_list1");

      $('#cancel').click(function(){
        window.close();
      });
    });
    </script>
  </body>
</html>
