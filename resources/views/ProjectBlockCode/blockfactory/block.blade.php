<!DOCTYPE html>
<head>
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
  <script src="{{URL::asset('/js/package.js')}}"></script>
  <link rel="stylesheet" href="{{URL::asset('/css/factory.css')}}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

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
  <h1>

    <center>
      LEARnFUN
      <input id="abc" type="text" name="" value="123">
      <br>
    </center>
  </h1>
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
            <label>Path to Blockly Media <input type="text" id="option_media_text" style="width: 90%"></label><br>
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
    <table id="blockFactoryContent">
      <tr>
        <td>
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
                  <img src="link.png" height="21" width="21">
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
            </tr>
          </table>
        </td>
        <td id="blockFactorySupplie">
          <table>
            <tr id="blockLibrary">
              <td id="blockLibraryContainer">
              <span>
                <div class="dropdown">
                    <div>
                      <button>
                        <a id="createNewBlockButton">new 콘텐츠</a>
                      </button>
                      <button id="test" type="button" name="button">
                        블럭 테스트 입니다.
                      </button>
                    </div>
                    <!-- form형태로 수정하기 -->
                    <!-- 콘텐츠들 나열 -->

                    <div id="dropdownDiv_blockLib">
                      <div id="button_blockLib">
                      </div>
                      <!-- <button id="dropdown_??" class= "content_list" type="button" name="button">
                          blockType
                          <input type="text" class="contents_xml"  value="">
                          <input type="text" class="block_myungse" value="">
                          <input type="text" name="id"  value="">
                      </button>-->
                      <button id="list" class= "content_list" type="button" name="button" value="{{$contents_xml}}">
                          {{$contents_name}}
                          <input type="text" class="contents_xml"  value="{{$contents_xml}}" hidden>
                          <input type="text" class="block_myungse" value="{{$block_myungse}}" hidden>
                          <input type="text" name="id"  value="{{$contents_id}}" hidden>
                      </button>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                   </div>
                    </form>
                  </div>
                <!-- <select id="blockLibraryDropdown">
                </select> -->
              </span>
            </td>
              <td id="blockLibraryControls">

                <button id="registerContents">
                  등록
                </button>
                <button id="shareContentsButton">
                  창작
                </button>
                <button id="saveToBlockLibraryButton">
                  저장
                </button>
                <button id="removeBlockFromLibraryButton">
                  삭제
                </button>

              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr height="90%">
        <!-- 블럭 워크스페이스 -->
        <!-- 지도 -->
        <td id="mapSize">
          <body onload="initialize();">
            <div id="map_canvas" style="width:550px; height:450px"></div>
            <div id="get_location" hidden></div>
        </td>
        <!-- 블록 코딩 -->
        <td id="blocklyWorkspaceContainer">
          <div id="blockly"></div>
          <div id="blocklyMask"></div>
        </td>

        <td id="packageList">
          <div id="packageDiv" style="border:1px solid">
            @foreach($package_name as $key => $value)
              <button type="button" name="button" value={{$value['ids']}}>{{$value['name']}}</button>
            @endforeach
          </div>
          <button id="createNewPackage">패키지 생성</button>

        </td>

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

    <div id="modalShadow"></div>

    <xml id="blockfactory_toolbox" class="toolbox">

      <category name="버튼">
        <block type="button_1"></block>
        <block type="button_2"></block>
        <block type="button_3"></block>
        <block type="button_4"></block>
        <block type="vertical"></block>
      </category>
      <category name="텍스트">
        <block type="header"></block>
        <block type="bottom"></block>
        <!-- <block type="field_static"></block> -->
        <!-- <block type="field_number"></block> -->
        <!-- <block type="field_angle"></block> -->
        <!-- <block type="field_dropdown"></block> -->
        <block type="field_checkbox"></block>
        <!-- <block type="field_colour"></block> -->
        <!--
        Date picker commented out since it increases footprint by 60%.
        Add it only if you need it.  See also goog.require in blockly.js.
        <block type="field_date"></block>
        -->
        <block type="field_variable"></block>
      </category>
      <category name ="이미지">
        <block type="image_1"></block>
        <block type="image_2"></block>
        <block type="image_3"></block>
        <block type="image_4"></block>
      </category>

      <category name="실행">
        <block type="isscript"></block>
        <block type="checkedit"></block>
        <block type="out_img"></block>
        <block type="out_txt"></block>
        <block type="end"></block>
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

  </body>
  </html>
