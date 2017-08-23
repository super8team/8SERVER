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
<?php include('block.blade.php'); ?>

    <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script>
     var blocklyFactory;
     var init = function() {
       blocklyFactory = new AppController();
       blocklyFactory.init();
       window.addEventListener('beforeunload', blocklyFactory.confirmLeavePage);
     };
     window.addEventListener('load', init);
   </script>
  </head>
  <body>

    <table id="mainShareList">
        <tr id="mainContenstsImage">
          <td><img src="" alt="1"></td>
          <td><img src="" alt="2"></td>
          <td><img src="" alt="3"></td>
        </tr>
        <tr id="mainPackageName">
          <td>패키지 명1</td>
          <td>패키지 명1</td>
          <td>패키지 명1</td>
        </tr>
      </table>

      <hr>

      <form class="" action="index.html" method="post">
        <input type="text" name="" value="">
        <input type="submit" name="" value="검색">
      </form>
      <hr>
      <table id="shareList">
        <tr id="contenstsImage">
          <td><img src="" alt="1"></td>
          <td><img src="" alt="2"></td>
          <td><img src="" alt="3"></td>
        </tr>
        <tr id="packageName">
          <td>패키지 명1</td>
          <td>패키지 명1</td>
          <td>패키지 명1</td>
        </tr>
      </table>
  </body>
</html>
