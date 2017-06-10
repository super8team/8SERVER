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
  <script type="text/javascript">
    $(document).ready(function(){
      test();
    });
  </script>
  <body>
      <table id="mainShareList">
        <tr id="mainContenstsImage">
          @foreach ($popularPackageNames as $key=>$value)
               <td><a href="/toolDetail?package_id={{$value['id']}}"><img src="{{$key}}" alt="{{$key}}"></a></td>
          @endforeach
        </tr>
        <tr id="mainPackageName">
          @foreach ($mainPackageName as $main)
               <td>{{$main}}</a></td>
          @endforeach
        </tr>
      </table>
      <hr>
      <input id="testim" type="text" name="" value="z">
      <form class="" action="index.html" method="post">
        <input type="text" name="" value="">
        <input type="submit" name="" value="검색">
      </form>

      <table id="shareList">
        <tr id="contenstsImage">
          @foreach ($serbPackageNames as $key=>$value)
               <td><a href="/toolDetail/{{$value['id']}}"><img src="{{$key}}" alt="{{$key}}"></a></td>
          @endforeach
        </tr>
        <tr id="packageName">
          @foreach ($serbPackageName as $main)
               <td>{{$main}}</a></td>
          @endforeach
        </tr>
      </table>
      <button id="share" type="button" name="button">공유</button>
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

    window.location.href='/toolShareShare';
    });
    </script>
</html>
