<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="{{URL::asset('/js/blockly_compressed.js')}}"></script>
    <script src="{{URL::asset('/js/javascript_compressed.js')}}"></script>
    <script src="{{URL::asset('/js/en.js')}}"></script>
    <script src="{{URL::asset('/js/blocks_compressed.js')}}"></script>
    <script src="{{URL::asset('/js/closure-library/closure/goog/base.js')}}"></script>
    <script src="{{URL::asset('/js/factory_utils.js')}}"></script>
    <script src="{{URL::asset('/js/wfactory_model.js')}}"></script>
    <script src="{{URL::asset('/js/standard_categories.js')}}"></script>
    <script src="{{URL::asset('/js/wfactory_controller.js')}}"></script>
    <script src="{{URL::asset('/js/wfactory_view.js')}}"></script>
    <script src="{{URL::asset('/js/wfactory_generator.js')}}"></script>
    <script src="{{URL::asset('/js/wfactory_init.js')}}"></script>
    <script src="{{URL::asset('/js/block_option.js')}}"></script>
    <script src="{{URL::asset('/js/factory.js')}}"></script>
    <script src="{{URL::asset('/js/block_library_view.js')}}"></script>
    <script src="{{URL::asset('/js/block_library_storage.js')}}"></script>
    <script src="{{URL::asset('/js/block_library_controller.js')}}"></script>
    <script src="{{URL::asset('/js/block_exporter_tools.js')}}"></script>
    <script src="{{URL::asset('/js/block_exporter_view.js')}}"></script>
    <script src="{{URL::asset('/js/block_exporter_controller.js')}}"></script>
    <script src="{{URL::asset('/js/blocks.js')}}"></script>
    <script src="{{URL::asset('/js/map.js')}}"></script>
    <script src="{{URL::asset('/js/app_controller.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script src="{{URL::asset('/js/prettify.js')}}"></script>
    <script src="{{URL::asset('/js/prettify.js')}}"></script>
    <script src="{{URL::asset('/js/tool_confirm.js')}}"></script>
    <script src="{{URL::asset('/js/test.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
  </head>

  <body>
      <table id="mainShareList">
        <div align="center" id="mainShareListTitle" >인기있는 콘텐츠 패키지</div>
        <tr id="mainContenstsImage">
          @foreach($popularPackage as $key=>$value)
          @php
          $url = Storage::url('packageImgs/'.$value['imgs']);
          // $url = 'http://163.44.166.91/LEARnFUN/public/storage/packageImgs/image9.jpg';
          @endphp
             <td>
               <a href="/LEARnFUN/public/contents/shareDetail/{{$value['ids']}}">
                 <img src="http://163.44.166.91/LEARnFUN/public/{{$url}}" alt="" style="width:170px; height:100px">
               </a>
             </td>
          @endforeach
        </tr>
        <tr id="mainPackageName">
          @foreach ($popularPackage as $imgs)
               <td>contents_package_shares 컬럼 추가하기</td>
          @endforeach
        </tr>
      </table>
      <br>
      <br>
      <div align="center" id="contentsPackageTitle">
        콘텐츠 패키지
      </div>
      <div id="packageResearch">

          <input id="searchWord"   type="text"   name="word"   value="설명">
          <input id="searchButton" type="button" name="button" value="검색">

      </div>
      <div id="shareList">
          @php
          $i = 1
          @endphp
          @if($i==5)
            @continue;
          @endif

          @foreach ($otherPackage as $key => $value)
                  @php
                    $url = Storage::url('packageImgs/'.$value['imgs']);
                  @endphp
          <div id="contenstsImage">
                    <a href="/LEARnFUN/public/contents/shareDetail/{{$value['ids']}}">
                      <img src="http://163.44.166.91/LEARnFUN/public/{{$url}}"  style="width:100px; height:150px">
                    </a>
                    <div id="package_name" display="inline-block">
                        수정하기
                    </div>
          </div>
            @if($i%4==0)
              <br>
            @endif
            @php
              $i++;
            @endphp
          @endforeach


      </div>
      <button id="share" type="button" name="button">패키지 공유하기</button>
    </body>
    <script type="text/javascript">
// var xmlText         = new XMLSerializer().serializeToString(xml);
    $('#share').click(function(e){
      var value = e.target.getAttribute('value');
      var i;
      var parameters='';
      var content_xml     = document.getElementsByClassName('contents_xml');
      var content_myungse = document.getElementsByClassName('block_myungse');
      var m;
      var n;

      for(i = 0 ; i < content_xml.length ; i++){
        content_xml[i].value;
        console.log(content_myungse[i].value);
        m = content_myungse[i].value;
        n = content_xml[i].value;
        // parameters = parameters + 'xml'+i+'='+"'"+content_xml[i].value+"'"+'&myungse'+i+'='+"'"+content_myungse[i].value+'&';
      }
      console.log(m);
      console.log(typeof(n));

    window.location.href='shareShare';
    });

    $('#searchButton').click(function(){

      var searchWord = document.getElementById('searchWord').value;

      console.log('검색한 키워드');
      console.log(searchWord);
      $.ajax({
        method: 'GET',
        url: '{{ route('contents.searchContents')}}',
        data: {
          'searchWord1'  : searchWord
        },
        success: function(data){
            console.log('통신 성공');
            $('#shareList').empty();

            var img_url          = data[0]['img_url'];
            var package_name     = data[1];
            var contents_package = data[0]['contents_package'];

            var parent_div = document.getElementById('shareList');

            var infor_div    = document.createElement('div');
            infor_div.setAttribute('id','contentsImage');

            var name_div   = document.createElement('div');
            name_div.setAttribute('id','package_name');

            var a_ele      = document.createElement('a');
            a_ele.setAttribute('href','/LEARnFUN/public/contents/shareDetail/'+contents_package);

            var img_ele    = document.createElement('img');
            img_ele.setAttribute('src','http://163.44.166.91/LEARnFUN/public{{Storage::url("packageImgs/image1.jpg")}}');

            name_div.innerHTML = package_name;

            a_ele.appendChild(img_ele);

            infor_div.appendChild(name_div);
            infor_div.appendChild(a_ele);

            parent_div.appendChild(infor_div);
            console.log(parent_div);

        },
        error: function(){
          console.log('통신실패');
        }
      })
    });
    </script>
</html>
