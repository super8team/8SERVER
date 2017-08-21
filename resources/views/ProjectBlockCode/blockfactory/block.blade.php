@extends('master')

@section('title','블록 메인')

@section('content')

<!DOCTYPE html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="UTF-8">

  <title>LEARnFUN</title>

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
  <script src="{{URL::asset('/js/notipopup.js')}}"></script>
  <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
  <script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>



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

<div class="decobar"></div>

  <div id="tabContainer">
      <div id="blockFactory_tab" class="tab tabon" >Block Factory</div>
      <!-- <div id="blocklibraryExporter_tab" class="tab taboff">Block Exporter</div> -->
      <div id="blocklibraryExporter_tab" class="tab tabon">Block Exporter</div>
     <!-- <div id="workspaceFactory_tab" class="tab taboff">Workspace Factory</div> -->
    </div>

    <!-- Exporter tab -->
    <div id="blockLibraryExporter">
      <br>
      <p>
        First, select blocks from your block library by clicking on them. Then, use the Export Settings form to download starter code for selected blocks.
      </p>
      <div id="exportSelector">
        <br>
        <h3>Block Selector</h3>
        <div class="dropdown">
          <button id="button_setBlocks">Select</button>
          <div id="dropdownDiv_setBlocks" class="dropdown-content">
            <a id="dropdown_addAllFromLib" title="Select all block library blocks.">All Stored in Block Library</a>
            <a id="dropdown_addAllUsed" title="Select all block library blocks used in workspace factory.">All Used in Workspace Factory</a>
          </div>
          <button id="clearSelectedButton" title="Clear selected blocks.">Clear Selected</a>
        </div>

        <div id="blockSelector"></div>
      </div>

      <!-- Users may customize export settings through this form -->
      <div id="exportSettings">
        <br>
        <h3> Export Settings </h3>
        <form id="exportSettingsForm">

          <div id="selectedBlocksTextContainer">
            <p>Currently Selected:</p>
            <p id="selectedBlocksText"></p>
          </div>
          <label><input type="checkbox" id="blockDefCheck">Block Definition(s)</label><br>
          <div id="blockDefSettings" class="subsettings">
            <label>Format:
            <select id="exportFormat">
              <option value="JSON">JSON</option>
              <option value="JavaScript">JavaScript</option>
            </select></label>
            <br>
            <label>File Name:<br>
            <input type="text" id="blockDef_filename"></label>
          </div>
          <br>

          <label><input type="checkbox" id="genStubCheck">Generator Stub(s)</label><br>
          <div id="genStubSettings" class="subsettings">
            <label>Language:
            <select id="exportLanguage">
              <option value="JavaScript">JavaScript</option>
              <option value="Python">Python</option>
              <option value="PHP">PHP</option>
              <option value="Lua">Lua</option>
              <option value="Dart">Dart</option>
            </select></label>
            <br>
            <label>File Name:<br>
            <input type="text" id="generatorStub_filename"></label><br>
          </div>
          <br>
        </form>
        <button id="exporterSubmitButton" title="Download block starter code as specified in export settings.">Export</button>
      </div>
      <div id="exportPreview">
        <br>
        <h3>Export Preview</h3>
        <div id="blockDefs" class="exportPreviewTextArea">
          <p id="blockDefs_label">Block Definitions:</p>
          <pre id="blockDefs_textArea"></pre>
        </div>
        <div id="genStubs" class="exportPreviewTextArea">
          <p id="genStubs_label">Generator Stubs:</p>
          <pre id="genStubs_textArea"></pre>
        </div>
      </div>
    </div>

    <!-- Workspace Factory tab -->
    <div id="workspaceFactoryContent">
      <div id="factoryHeader">
        <p>
          <div class="dropdown">
          <button id="button_importBlocks">Import Custom Blocks</button>
            <div id="dropdownDiv_importBlocks" class="dropdown-content">
              <input type="file" id="input_importBlocksJson" accept=".js, .json, .txt" class="inputfile"</input>
              <label for="input_importBlocksJson">From JSON</label>
              <input type="file" id="input_importBlocksJs" accept=".js, .txt" class="inputfile"</input>
              <label for="input_importBlocksJs">From Javascript</label>
            </div>
          </div>

          <div class="dropdown">
          <button id="button_load">Load to Edit</button>
            <div id="dropdownDiv_load" class="dropdown-content">
              <input type="file" id="input_loadToolbox" accept=".xml" class="inputfile"></input>
              <label for="input_loadToolbox">Toolbox</label>
              <input type="file" id="input_loadPreload" accept=".xml" class="inputfile"</input>
              <label for="input_loadPreload">Workspace Blocks</label>
            </div>
          </div>

          <div class="dropdown">
          <button id="button_export">Export</button>
            <div id="dropdownDiv_export" class="dropdown-content">
              <a id="dropdown_exportOptions">Starter Code</a>
              <a id="dropdown_exportToolbox">Toolbox</a>
              <a id="dropdown_exportPreload">Workspace Blocks</a>
              <a id="dropdown_exportAll">All</a>
            </div>
          </div>

          <button id="button_clear">Clear</button>
        </p>
      </div>

      <section id="createDiv">
        <div id="createHeader">
          <h3>Edit</h3>
          <p id="editHelpText">Drag blocks into the workspace to configure the toolbox in your custom workspace.</p>
        </div>
        <table id="workspaceTabs" style="width:auto; height:auto">
          <tr>
            <td id="tab_toolbox" class="tabon">Toolbox</td>
            <td id="tab_preload" class="taboff">Workspace</td>
          </tr>
        </table>
        <section id="toolbox_section">
          <div id="toolbox_blocks"></div>
        </section>
        <aside id="toolbox_div">
          <p id="categoryHeader">You currently have no categories.</p>
          <table id="categoryTable" style="width:auto; height:auto">
          </table>
          <p>&nbsp;</p>

          <div class="dropdown">
            <button id="button_add" class="large">+</button>
            <div id="dropdownDiv_add" class="dropdown-content">
              <a id="dropdown_newCategory">New Category</a>
              <a id="dropdown_loadCategory">Standard Category</a>
              <a id="dropdown_separator">Separator</a>
              <a id="dropdown_loadStandardToolbox">Standard Toolbox</a>
            </div>
          </div>

          <button id="button_remove" class="large">-</button>

          <button id="button_up" class="large">&#8593;</button>
          <button id="button_down" class="large">&#8595;</button>

          <br>
          <div class="dropdown">
            <button id="button_editCategory">Edit Category</button>
            <div id="dropdownDiv_editCategory" class="dropdown-content">
              <a id='dropdown_name'>Name</a>
              <a id='dropdown_color'>Colour</a>
            </div>
          </div>

        </aside>

        <button id="button_addShadow" style="display: none">Make Shadow</button>
        <button id="button_removeShadow" style="display: none">Remove Shadow</button>

        <aside id="preload_div" style="display:none">
          <div id="preloadHelp">
            <p>Configure the options for your Blockly inject call.</p>
            <button id="button_optionsHelp">Help</button>
            <button class="small" id="button_standardOptions">Reset to Default</button>
          </div>
          <div id="workspace_options">
            <label><input type="checkbox" id="option_readOnly_checkbox">Read Only</label><br>
            <label><input type="checkbox" id="option_grid_checkbox">Use Grid</label><br>
            <div id="grid_options" style="display: none">
              <label>Spacing <input type="number" id="gridOption_spacing_number" style="width: 3em"></label><br>
              <label>Length <input type="number" id="gridOption_length_number" style="width: 3em"></label><br>
              <label>Colour <input type="text" id="gridOption_colour_text" style="width: 8em"></label><br>
              <div id="readonly1">
                <label><input type="checkbox" id="gridOption_snap_checkbox">Snap</label><br>
              </div>
            </div>
            <!-- <label>Path to Blockly Media <input type="text" id="option_media_text" style="width: 90%"></label><br> -->
            <label><input type="checkbox" id="option_rtl_checkbox">Layout with RTL</label><br>
            <label><input type="checkbox" id="option_scrollbars_checkbox">Scrollbars</label><br>
            <label><input type="checkbox" id="option_zoom_checkbox">Zoom</label><br>
            <div id="zoom_options" style="display: none">
              <label><input type="checkbox" id="zoomOption_controls_checkbox">Zoom Controls</label><br>
              <label><input type="checkbox" id="zoomOption_wheel_checkbox">Zoom Wheel</label><br>
              <label>Start Scale <input type="number" id="zoomOption_startScale_number" style="width: 4em"></label><br>
              <label>Max Scale <input type="number" id="zoomOption_maxScale_number" style="width: 4em"></label><br>
              <label>Min Scale <input type="number" id="zoomOption_minScale_number" style="width: 4em"></label><br>
              <label>Scale Speed <input type="number" id="zoomOption_scaleSpeed_number" style="width: 4em"></label><br>
            </div>
            <label><input type="checkbox" id="option_css_checkbox">Use Blockly CSS</label><br>
            <div id="readonly2">
              <label><input type="checkbox" id="option_collapse_checkbox">Collapsible Blocks</label><br>
              <label><input type="checkbox" id="option_comments_checkbox">Comments for Blocks</label><br>
              <label><input type="checkbox" id="option_disable_checkbox">Disabled Blocks</label><br>
              <label><input type="checkbox" id="option_infiniteBlocks_checkbox">Infinite Blocks</label><br>
              <div id="maxBlockNumber_option" style="display: none">
                <label>Max Blocks <input type="number" id="option_maxBlocks_number" style="width: 5em"></label><br>
              </div>
              <label><input type="checkbox" id="option_horizontalLayout_checkbox">Horizontal Toolbox</label><br>
              <label><input type="checkbox" id="option_toolboxPosition_checkbox">Toolbox End</label><br>
              <label><input type="checkbox" id="option_oneBasedIndex_checkbox">One-based index</label><br>
              <label><input type="checkbox" id="option_sounds_checkbox">Sounds<br>
              <label><input type="checkbox" id="option_trashcan_checkbox">Trashcan</label><br>
            </div>
          </div>
        </aside>

      </section>

      <aside id="previewDiv">
        <div id="previewBorder">
          <div id="previewHelp">
            <h3>Preview</h3>
            <p>This is what your custom workspace will look like.</p>
          </div>
          <div id="preview_blocks" class="content"></div>
        </div>
      </aside>
    </div>
    <!--workspace factory------->

    <!-- Blockly Factory Tab -->
    <!-- <div class="papanel-body"> -->
    <table id="blockFactoryContent">
      <tr style="border:0px solid;height:190px">
        <td style='width:1%; border:0px solid;height:100%'>
          <table id="blockFactoryPreview" >
            <tr>
              <td id="previewContainer" hidden>
                <h3>Preview:
                  <select id="direction">
                    <option value="ltr">LTR</option>
                    <option value="rtl">RTL</option>
                  </select>
                </h3>
              </td>
              <td id="buttonContainer">
                <button id="linkButton" title="Save and link to blocks.">
                  <img src="link.png" height="21" width="21" hidden>
                </button>
                <button id="clearBlockLibraryButton" title="Clear Block Library." hidden>
                  <span>콘텐츠 전부 삭제하기</span>
                </button>
                <label for="files" class="buttonStyle" hidden>
                  <span class=>Import Block Library</span>
                </label>
                <input id="files" type="file" name="files"
                    accept="application/xml" hidden>
                <button id="localSaveButton" title="Save block library XML to a local file." hidden>
                  <span>Download Block Library</span>
                </button>
              </td>
              <td id="present_package">
                {{$packages[0]['name']}}
              </td>
            </tr>
          </table>
        </td>
        <td id="blockFactorySupplie" colspan="2">
          <table>
            <tr id="blockLibrary">
              <td id="contents_list" >
                <div style="background-color: #95CDFF">
                  <button type="button" id="createNewBlockButton"  >
                    NEW
                  </button>
                </div>
                <div style="background-color: #95CDFF;margin-top:-10px">
                  <button type="button" id="saveToBlockLibraryButton" >
                    SAVE
                  </button>
                </div>
              </td>

              <td id="blockLibraryContainer">
              <span>
                <div class="dropdown">
                    <div id="dropdownDiv_blockLib">
                      <div id="button_blockLib">
                      </div>
                      <!-- 패키지 리스트 출력 코드 -->
                        @if($packages)
                            @foreach($first_package as $content)
                            <button style="margin-bottom:35px;margin-left:15px;height:50px" class="content_list" type="button" name="button" value="{{$content['xml']}}" >
                              {{$content['name']}}
                              <input type="text" class="contents_xml"  value="{{$content['xml']}}" hidden>
                              <input type="text" class="block_myungse" value="{{$content['spec']}}" hidden>
                              <input type="text" name="id"  value="{{$content['id']}}" hidden>
                           </button>
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           @endforeach
                       @endif
                   </div>
                    </form>
                  </div>

              </span>
              </td>
        <td id="blockLibraryControls" >
          <button id="registerContents" >
            현장체험 등록
          </button>
          <button id="shareContentsButton">
            창작 마당
          </button>
          <button id="removeBlockFromLibraryButton" hidden>
            콘텐츠 삭제
          </button>
        </td>
        </tr>
      </table>
   </td>
     </tr>
      <FONT face="굴림">
      <tr style="height:90%">
        <!-- 블럭 워크스페이스 -->
        <td id="packageList">
          <div id="left-space">
          </div>
          <div style="float:right;display:inline-block;width:80%;">
            <button type="button" class="package_button" name="button" disabled><h4>패 키 지 리 스 트</h4></button>
            <button id="createNewPackage"></button>
            <div id="packageDiv" style="display:inline;" style="float:right" >
              @if($packages)
              @foreach($packages as $package_name)
                <button style="float:right"class="package_button" type="button" name="button" value={{$package_name['id']}}>
                  {{$package_name['name']}}
                </button>
              @endforeach
              @endif
            </div>
          </div>
        </td>

        <td id="blocklyWorkspaceContainer">
          <div id="blockly"></div>
          <div id="blocklyMask"></div>
        </td>
        <!-- 지도 -->
        <td id="mapSize">
          <div style="width:85%;height:100%;display:inline-block;background-color:white;">
            <form action="#" onsubmit="getLatLng(document.getElementById('address').value); return(false);">
                  <input id="address" style="width: 200px;" type="text" value='장소검색' onblur="checkField(this)" onfocus="clearField(this)">
                  <input id="mapSearch" type="submit" value="">
            </form>
              <div id="map" style="height:70%; width:100%;display:inline-block">
              </div>
          </div>
<script type="text/javascript">
   var markersArray = [];

   var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: new google.maps.LatLng(35.8963091, 128.62205110000002),
    mapTypeId: google.maps.MapTypeId.ROADMAP
   });

   google.maps.event.addListener(map, 'click', function (mouseEvent) {
    getAddress(mouseEvent.latLng);

    document.getElementById('get_location').innerHTML = mouseEvent.latLng;
   });

 function getAddress(latlng) {

     var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
   latLng: latlng
  }, function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
       if (results[0].geometry) {

           var address = results[0].formatted_address;

           var marker = new google.maps.Marker({
               position: latlng,
               map: map
           });

     new google.maps.InfoWindow({
         content: address + "<br>(Lat, Lng) = " + latlng
         //content: address
     }).open(map, marker);

     var opt = $("<option value='" + latlng.toString() + "'>" + address + "</option>");
     $("#markerList").append(opt);

     //markersArray.push(marker);
    }
   } else if (status == google.maps.GeocoderStatus.ERROR) {
    alert("통신중 에러발생！");
   } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
    alert("요청에 문제발생！geocode()에 전달하는GeocoderRequest확인요！");
   } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
    alert("단시간에 쿼리 과다송신！");
   } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
    alert("이 페이지에는 지오코더 이용 불가! 왜??");
   } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
    alert("서버에 문제가 발생한거 같아요. 다시 한번 해보세요.");
   } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
    alert("존재하지 않습니다.");
   } else {
    alert("??");
   }
  });
 }


 function changemap() {
     var sm = $("#markerList option:selected").val().toString().replace(/[\(\)]/gi, '').split(",");
     console.log(sm);
     map.setCenter(new google.maps.LatLng(sm[0].trim(), sm[1].trim()));
     map.setZoom(14);
 }
 function clearField(field){
    if (field.value == field.defaultValue) {
      field.value = '';
    }
  }
  function checkField(field){
    if (field.value == '') {
      field.value = field.defaultValue;
    }
  }
 function resetSearch()
 {
     location.reload();
 }

 function getLatLng(place) {

     var geocoder = new google.maps.Geocoder();
     geocoder.geocode({
         address: place,
         region: 'ko'
     }, function (results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
             var bounds = new google.maps.LatLngBounds();

             for (var r in results) {
                 if (results[r].geometry) {
                     var latlng = results[r].geometry.location;
                     bounds.extend(latlng);
                     //var address = results[0].formatted_address.replace(/^日本, /, '');
                     var address = results[r].formatted_address;

      new google.maps.InfoWindow({
       content: address + "<br>(Lat, Lng) = " + latlng.toString()
      }).open(map, new google.maps.Marker({
       position: latlng,
       map: map
      }));

                     var opt = $("<option value='" + latlng.toString() + "'>" + address + "</option>");
                     $("#markerList").append(opt);
                     $("#addrList").append(slt);
                 }
             }
             map.fitBounds(bounds);
         } else if (status == google.maps.GeocoderStatus.ERROR) {
             alert("서버 통신에러！");
         } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
             alert("리퀘스트에 문제발생！geocode()에 전달하는GeocoderRequest확인요！");
         } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
             alert("단시간에 쿼리 과다송신！");
         } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
             alert("이 페이지에서는 지오코더 이용불가! 왜?");
         } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
             alert("서버에 문제 발생한거 같아요.다시 한번 해보세요.");
         } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
             alert("앙..못찾겠어요");
         } else {
             alert("??");
         }
     });
 }
</script>

          <div id="get_location" border="1px solid black" hidden></div>

          <div id="right-space">
          </div>

          <div id="notipopup">
                      <div>
                      <embed src="https://www.youtube.com/embed/s2_xaEvcVI0" autoplay controls width="300px" height="200px"></embed>
                        <div class="class">닫기</div>
                    </div>
          </div>

        <!-- 블럭 프리뷰  -->
        <td style="display:none;">
          <table id="blocklyPreviewContainer">
            <tr>
              <td height="5%" style="display:none">
                <h3>Block Definition:
                  <select id="format">
                    <option value="JSON">JSON</option>
                  </select>
                </h3>
              </td>
            </tr>
          </table>
        </td>
        <!-- 블록 프리뷰 마감 -->
      </tr>
    </table>
<!-- </div> -->
    <div id="modalShadow"></div>

    <xml id="blockfactory_toolbox" class="toolbox">

      <category name="버튼">
        <block type="button_1"></block>
        <block type="button_2"></block>
        <block type="button_3"></block>
        <block type="button_4"></block>
      </category>
      <category name="텍스트">
        <block type="header"></block>
        <block type="bottom"></block>
      </category>
      <category name ="이미지">
        <block type="image_1"></block>
        <block type="image_2"></block>
        <block type="image_3"></block>
        <block type="image_4"></block>
      </category>
      <category name="실행">
        <block type="CLICK"></block>
        <block type="CHECKEDIT"></block>
        <block type="OUT_IMG"></block>
        <block type="OUT_TXT"></block>
        <block type="END"></block>
      </category>
      <category name="에디트">
        <block type="EDIT"></block>
      </category>
      <category name="토스트">
        <block type="toast"></block>
      </category>
      <category name="퀘스트">
        <block type="quest"></block>
        <block type="endQuest"></block>
        <!-- blocks_ 139line -->
      </category>
      <category name="빙고">
        <block type="bingo"></block>
        <block type="endBingo"></block>
      </category>
      <category name="컬렉션">
        <block type="collection"></block>
        <block type="endCollection"></block>
      </category>
      <category name="지도">
        <block type="openMap"></block>
        <block type="closeMap"></block>
      </category>
      <category name="콘텐츠 수정">
        <block type="CONFIG"></block>
      </category>
    </xml>

    <xml id="workspacefactory_toolbox" class="toolbox">
      <category name="Logic" colour="210">
        <block type="controls_if"></block>
        <block type="logic_compare"></block>
        <block type="logic_operation"></block>
        <block type="logic_negate"></block>
        <block type="logic_boolean"></block>
        <block type="logic_null"></block>
        <block type="logic_ternary"></block>
      </category>
      <category name="Loops" colour="120">
        <block type="controls_repeat_ext">
          <value name="TIMES">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
        </block>
        <block type="controls_whileUntil"></block>
        <block type="controls_for">
          <value name="FROM">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="TO">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
          <value name="BY">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
        </block>
        <block type="controls_forEach"></block>
        <block type="controls_flow_statements"></block>
      </category>
      <category name="Math" colour="230">
        <block type="math_number"></block>
        <block type="math_arithmetic">
          <value name="A">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="B">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
        </block>
        <block type="math_single">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">9</field>
            </shadow>
          </value>
        </block>
        <block type="math_trig">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">45</field>
            </shadow>
          </value>
        </block>
        <block type="math_constant"></block>
        <block type="math_number_property">
          <value name="NUMBER_TO_CHECK">
            <shadow type="math_number">
              <field name="NUM">0</field>
            </shadow>
          </value>
        </block>
        <block type="math_round">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">3.1</field>
            </shadow>
          </value>
        </block>
        <block type="math_on_list"></block>
        <block type="math_modulo">
          <value name="DIVIDEND">
            <shadow type="math_number">
              <field name="NUM">64</field>
            </shadow>
          </value>
          <value name="DIVISOR">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
        </block>
        <block type="math_constrain">
          <value name="VALUE">
            <shadow type="math_number">
              <field name="NUM">50</field>
            </shadow>
          </value>
          <value name="LOW">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="HIGH">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
        </block>
        <block type="math_random_int">
          <value name="FROM">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="TO">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
        </block>
        <block type="math_random_float"></block>
      </category>
      <category name="Text" colour="160">
        <block type="text"></block>
        <block type="text_join"></block>
        <block type="text_append">
          <value name="TEXT">
            <shadow type="text"></shadow>
          </value>
        </block>
        <block type="text_length">
          <value name="VALUE">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
        <block type="text_isEmpty">
          <value name="VALUE">
            <shadow type="text">
              <field name="TEXT"></field>
            </shadow>
          </value>
        </block>
        <block type="text_indexOf">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
          <value name="FIND">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
        <block type="text_charAt">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
        </block>
        <block type="text_getSubstring">
          <value name="STRING">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
        </block>
        <block type="text_changeCase">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
        <block type="text_trim">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
        <block type="text_print">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
        <block type="text_prompt_ext">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>
      </category>
      <category name="Lists" colour="260">
        <block type="lists_create_with">
          <mutation items="0"></mutation>
        </block>
        <block type="lists_create_with"></block>
        <block type="lists_repeat">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">5</field>
            </shadow>
          </value>
        </block>
        <block type="lists_length"></block>
        <block type="lists_isEmpty"></block>
        <block type="lists_indexOf">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>
        <block type="lists_getIndex">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>
        <block type="lists_setIndex">
          <value name="LIST">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>
        <block type="lists_getSublist">
          <value name="LIST">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>
        <block type="lists_split">
          <value name="DELIM">
            <shadow type="text">
              <field name="TEXT">,</field>
            </shadow>
          </value>
        </block>
        <block type="lists_sort"></block>
      </category>
      <category name="Colour" colour="20">
        <block type="colour_picker"></block>
        <block type="colour_random"></block>
        <block type="colour_rgb">
          <value name="RED">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
          <value name="GREEN">
            <shadow type="math_number">
              <field name="NUM">50</field>
            </shadow>
          </value>
          <value name="BLUE">
            <shadow type="math_number">
              <field name="NUM">0</field>
            </shadow>
          </value>
        </block>
        <block type="colour_blend">
          <value name="COLOUR1">
            <shadow type="colour_picker">
              <field name="COLOUR">#ff0000</field>
            </shadow>
          </value>
          <value name="COLOUR2">
            <shadow type="colour_picker">
              <field name="COLOUR">#3333ff</field>
            </shadow>
          </value>
          <value name="RATIO">
            <shadow type="math_number">
              <field name="NUM">0.5</field>
            </shadow>
          </value>
        </block>
      </category>
      <sep></sep>
      <category name="Variables" colour="330" custom="VARIABLE"></category>
      <category name="Functions" colour="290" custom="PROCEDURE"></category>
      <sep></sep>
      <category name="Block Library" colour="260" id="blockLibCategory"></category>
    </xml>
</div>

  <form method="post" style="height:10%;border:1px solid" id="img_parent" name="form_name" enctype="multipart/form-data">
    <input id="change" type="text" name="" value="0" hidden>
    <input type="file" name="upFile" id="upFile" onchange="getCmaFileView(this,'name')" hidden>
    </form>
  </body>
  <script type="text/javascript">
  $('#notipopup').topmenu({
                startX:'50%',
                startY:'30%',
                close:'.close',
                todayclose:'.todayclose',
                code:'notipopup'
            });
  var new_package;
  document.getElementById('saveToBlockLibraryButton').addEventListener('click',
      function() {

        var a = new BlockLibraryController();
        a.saveToBlockLibrary();
        //저장할 [콘텐츠의 정보]를 가져오는 로직
        //노드 중에서 가장 마지막 요소를 가져온다

        var storage_contents      = document.getElementsByClassName('content_list');

        var length                = storage_contents.length;
        var parent_content        = storage_contents[length-1];
        console.log('테스트임');
        console.log(parent_content);
        var child_content         = parent_content.childNodes;

        //패키지 div중 가장 위에 있는 [패키지]를 가져오는 로직
        var storage_package       = document.getElementById('packageDiv');
        var present_package       = document.getElementById('present_package');
        console.log(storage_package);
        console.log('클릭한 패키지 이름');
        console.log(present_package.innerText);
        var storage_package_child = storage_package.firstChild;
        var storage_package_name  = storage_package_child.innerText ;

        console.log('완료');
        console.log('현재 패키지 이름'+present_package.innerText);

        //저장할 컨텐츠 xml
        var content_xml         = child_content[1].value;
        console.log(content_xml);
        //저장할 컨텐츠 명세
        var content_spec        = child_content[2].value;
        console.log(content_spec);
        var content_spec_object = JSON.parse(content_spec);

        //저장할 컨텐츠 이름
        var content_name        = content_spec_object['name'];
        console.log(content_name);
        //데이터베이스에서 패키지 이름이 존재하는 지 검사를 하고
        //중복이 없으면 새로운 패키지를 등록하고
        //중복이 있으면 그 패키지에 등록을 한다
        var CSRF_TOKEN          = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url: '{{ route('contents.storageNewContent')}}',
          type: 'post',
          data: {
            'xml'          : content_xml,
            'spec'         : content_spec,
            'name'         : content_name,
            'package_name' : present_package.innerText,
            '_token'       : CSRF_TOKEN
          },
          success: function(data){
            if(data){
              console.log('저장');
              console.log(data);
              var user_packages = document.getElementsByClassName('package_button');
              var id_value     = data.length - 1;
              // storage_package_child.value = data[id_value].id;
              new_package.value = data[id_value].id;
              // for(var i = 0; i < user_packages.length; i++){
              //   var package_name = user_packages[i].innerText;
              //   if(package_name == data[i]['name']){
              //     user_packages[i].innerText = data[i]['name'];
              //     user_packages[i].value     = data[i]['id'];
              //   }
              // }
            }else{
              console.log('기존의 패키지에 콘텐츠를 저장하였습니다');
            }
          },
          error: function(){
            //마지막에 추가된 개체 삭제하기
            var content_obj = document.getElementsByClassName('content_list');
            var obj_length  = content_obj.length;
            var del_obj     = document.getElementsByClassName('content_list')[obj_length-1];
            del_obj.remove();

            //경고 창 띄우기
            alert('컨텐츠 이름 중복 입니다');
          }
        });
        document.getElementById('change').value = 0;
      });

  function getCmaFileInfo(obj,stype) {
    console.log('getCmaFileInfo function');
     var fileObj, pathHeader , pathMiddle, pathEnd, allFilename, fileName, extName;
     var parent = document.getElementById('img_parent');
     if(obj == "[object HTMLInputElement]") {
       fileObj = obj.value
     } else {
       fileObj = document.getElementById(obj).value;
     }
             pathHeader = fileObj.lastIndexOf("\\");
             pathMiddle = fileObj.lastIndexOf(".");
             pathEnd = fileObj.length;
             fileName = fileObj.substring(pathHeader+1, pathMiddle);
             extName = fileObj.substring(pathMiddle+1, pathEnd);
             allFilename = fileName+"."+extName;

             var file_list = document.createElement('input');
             file_list.setAttribute("type","text");
             file_list.setAttribute("value",allFilename);
             file_list.setAttribute("class","file_list")
             file_list.setAttribute("name","filename[]");
             parent.appendChild(file_list);
             console.log('getCmaFileInfo function 2');
             console.log(file_list);
  }

 function getCmaFileView(obj,stype) {
     var s = getCmaFileInfo(obj,stype);
 }

  document.getElementById('registerContents').addEventListener('click',
    function(event){
      var popupOption = 'directories=no, toolbar=no, location=no, menubar=no, status=no, scrollbars=no, resizable=none, left=400, top=100, width=700, height=500';
      window.open('{{route("contents.registerToPlan")}}', '콘텐츠 저장하기', popupOption);
    });
  document.getElementById('shareContentsButton').addEventListener('click',
    function(event){
      var popupOption = 'directories=no, toolbar=no, location=no, menubar=no, status=no, scrollbars=no, resizable=none, left=200, top=70, width=1000, height=1000';
      window.open('{{route("contents.share")}}', '창작공유마당', popupOption);
    });
    var package_div     = document.getElementById('packageDiv');
    var before_ele;
    var boundary  = 0;
  package_div.addEventListener('click',function(event){

    //insertbefore();
    //클릭한 패키지를 상단에 위치 시킴

      var package_name_td = document.getElementById('present_package');
      package_name_td.innerHTML = event.target.textContent;
      new_package = event.target;



    var parent       = document.getElementById('dropdownDiv_blockLib');

    var remove_obj    = document.getElementsByClassName("content_list");

    //클릭을 하면 그 콘텐츠div의 콘텐츠는 사라짐,
    //그리고 ajax를 사용해서 클릭한 패키지의 콘텐츠들을 불러옴
    $('.content_list').remove();

    var package_id = event.target.value;
    console.log(event.target);
    console.log('919');
    console.log(event.target.textContent);
    var textContent = event.target.textContent;
    // var present = document.getElementById('presentPackageName');
    var str_space = /\s/;  // 공백체크
    if(str_space.exec(textContent)) { //공백 체크
       textContent = textContent.replace(' ',''); // 공백제거
    }
    // present.value = "現在패키지"+textContent;
    console.log(package_id);
    $.ajax({
      method: 'GET', // Type of response and matches what we said in the route
      url: '/LEARnFUN/public/contents/packages/'+package_id, // This is the url we gave in the route
      data: {'id' : package_id}, // a JSON object to send back
      success: function(data){ // What to do if we succeed
          console.log('926');
          if(data){
          // console.log(data[0]['name']);
          for(var i = 0; i < data.length; i++){
              console.log('990');
              var parent_wrap  = document.createElement("button");
              var child_wrap   = document.createElement("input");

              var xml_object   = document.createElement("input");
              var spec_object  = document.createElement("input");
              var id_object    = document.createElement("input");
              var name_text = document.createTextNode(data[i]['name']);
              parent_wrap.setAttribute('class','content_list');
              parent_wrap.setAttribute('value',data[i]['xml']);
              parent_wrap.style.marginLeft   = "15px";

              child_wrap.setAttribute('type','text');
              child_wrap.setAttribute('class','contents_xml');
              child_wrap.setAttribute('value',data[i]['xml']);
              child_wrap.setAttribute('hidden','false');

              spec_object.setAttribute('type','text');
              spec_object.setAttribute('class','block_myungse');
              spec_object.setAttribute('value',data[i]['spec']);
              spec_object.setAttribute('hidden','false');

              id_object.setAttribute('type','text');
              id_object.setAttribute('name','id');
              id_object.setAttribute('value',data[i]['id']);
              id_object.setAttribute('hidden','false');
              console.log('id'+data[i]['id']);

              parent_wrap.appendChild(child_wrap);
              parent_wrap.appendChild(spec_object);
              parent_wrap.appendChild(id_object);
              parent_wrap.appendChild(name_text);
              $('#dropdownDiv_blockLib').append(parent_wrap);
            }
          }
      },
      error: function() { // What to do if we fail
          console.log('해당x');
      }
  });
  });
  </script>
  </html>
  @endsection
