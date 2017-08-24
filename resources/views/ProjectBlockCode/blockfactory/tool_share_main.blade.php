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
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{URL::asset('/js/prettify.js')}}"></script>
    <script src="{{URL::asset('/js/prettify.js')}}"></script>
    <script src="{{URL::asset('/js/tool_confirm.js')}}"></script>
    <script src="{{URL::asset('/js/slick.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
    <link href='http://fonts.googleapis.com/earlyaccess/nanumbrushscript.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.css')}}">
    <style style="text/css">
    h1, h2{font-family:'Nanum Brush Script', serif;}
    .slider {
      width: 92%;
      margin: 50px auto;
    }
    /**  {
      box-sizing: border-box;
    }*/
    .slick-slide {
      margin: 0px 20px;
    }
    .slick-slide img {
      width: 100%;
    }
    .slick-prev:before,
    .slick-next:before {
      color: black;
    }
    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    .slick-active {
      opacity: .5;
    }
    .slick-current {
      opacity: 1;
    }
    </style>
  </head>

  <body style="background-color:#e3f2ff;">
      <table id="mainShareList">
        <div align="center" id="mainShareListTitle" ><h1>인기있는 콘텐츠 패키지</h1></div>
        <tr class="mainContenstsImage">
          <div class="center slider">
          @foreach($popularPackage as $key=>$value)
                 <div style="display:inline-block">
                 <a href="/LEARnFUN/public/contents/shareDetail/{{$value['ids']}}">
                   <img src="http://163.44.166.91/8server/public/storage/packageImgs/{{$value['imgs']}}" alt="" style="width:180px; height:180px">
                 </a>
                 {{$value['package_name']}}
                 </div>
          @endforeach
           </div>
        </tr>

      </table>
      <br>
      <br>
      <div align="center" id="contentsPackageTitle" >
        <h1>콘텐츠 패키지</h1>
      </div>
      <div id="packageResearch" style="margin-left:41%">
          <input id="searchWord"   type="text"   name="word"   value="">
          <input id="searchButton" type="button" name="button" value="">
      </div>
      <div id="shareList">
          @foreach ($otherPackage as $value)
                  @php
                    $url = Storage::url('packageImgs/'.$value->img_url);
                  @endphp
          <div class="contenstsImage">
                    <a href="/LEARnFUN/public/contents/shareDetail/{{$value->no}}">
                      <img src="http://163.44.166.91/8server/public/storage/packageImgs/{{$value->img_url}}"  style="width:150px; height:150px">
                    </a>
                    <div id="package_name" display="inline-block">
                    {{$value->package_name}}
                    </div>
          </div>
          @endforeach
          <div style="margin-left:35%">
            {{$otherPackage->links()}}
          </div>
          <button id="share" type="button">패키지 공유하기</button>
      </div>

    </body>
    <script type="text/javascript">
    $(document).on('ready', function() {
        $(".center").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 5,
          slidesToScroll: 3
        });
      });// var xmlText         = new XMLSerializer().serializeToString(xml);
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
      console.log(searchWord);
      $.ajax({
        method: 'GET',
        url: '{{ route('contents.searchContents')}}',
        data: {
          'searchWord1'  : searchWord
        },
        success: function(data){
            console.log(data);
            $('#shareList').empty();
            var parent_div = document.getElementById('shareList');
            var infor_div  = document.createElement('div');
            var img_ele    = document.createElement('img');
            var a_ele      = document.createElement('a');
            var name_div   = document.createElement('div');

            for(var i = 0; i< data.length ; i++){
              var contents_package = data[i]['contents_package'];
              var img_url          = data[i]['img_url'];
              var img_url          = 'http://163.44.166.91/LEARnFUN/public/storage/packageImgs/'+img_url;
              var package_name     = data[i]['package_name'];
              a_ele.setAttribute('href','/LEARnFUN/public/contents/shareDetail/'+contents_package);
              img_ele.setAttribute('src',img_url);
              name_div.innerHTML = package_name;
              a_ele.appendChild(img_ele);
              infor_div.appendChild(name_div);
              infor_div.appendChild(a_ele);
              parent_div.appendChild(infor_div);
            }

            // console.log(parent_div);
        },
        error: function(){
          console.log('통신실패');
        }
      })
    });
    </script>
</html>
