/**
 * @license
 * Blockly Demos: Block Factory
 *
 * Copyright 2016 Google Inc.
 * https://developers.google.com/blockly/
 *
 * Licensed under th
 e Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @fileoverview FactoryUtils is a namespace that holds block starter code
 * generation functions shared by the Block Factory, Workspace Factory, and
 * Exporter applications within Blockly Factory. Holds functions to generate
 * block definitions and generator stubs and to create and download files.
 *
 * @author fraser@google.com (Neil Fraser), quachtina96 (Tina Quach)
 */
 'use strict';

/**
 * Namespace for FactoryUtils.
 */
goog.provide('FactoryUtils');


/**
 * Get block definition code for the current block.
 * @param {string} blockType Type of block.
 * @param {!Blockly.Block} rootBlock RootBlock from main workspace in which
 *    user uses Block Factory Blocks to create a custom block.
 * @param {string} format 'JSON' or 'JavaScript'.
 * @param {!Blockly.Workspace} workspace Where the root block lives.
 * @return {string} Block definition.
 */

 var abcnumber = 1;
 var abcnumber2 = 1;
 var detail  = new Array();
 var imgArgs = new Array();

 var btnArgs = new Array();
 var txtArgs = new Array();
 var contents_basket = new Array();
 var a = new Array();
 var block_code;
 var root_block;
 var myungse = new Array();

// FactoryUtils = function(){
//   var xml3 = '<xml xmlns="http://www.w3.org/1999/xhtml">'+
//   '<block type="factory_base" id="jsJbcVlNT:#E9,M-7V(1" deletable="false" movable="false" x="0" y="0">'+
//   '<mutation connections="null"></mutation>'+
//   '<field name="NAME">fef</field>'+
//   '<value name="VERTICAL">'+
//     '<block type="vertical" id="5VQix4TOuX6BV_lv^#;r" deletable="false">'+
//       '<field name="VERTICAL"></field>'+
//     '</block>'+
//   '</value>'+
//   '<value name="HORIZONTAL">'+
//     '<block type="horizontal" id="C)e#DB8cz`+Bo-9o4~0[" deletable="false">'+
//       '<field name="HORIZONTAL"></field>'+
//     '</block>'+
//   '</value>'+
//   '<value name="VISIONABLE">'+
//     '<block type="logic_boolean" id="e@4|/*}pCo~#aYE8Fr15" deletable="false">'+
//       '<field name="BOOL">TRUE</field>'+
//     '</block>'+
//   '</value>'+
//   '<value name="CLICKABLE">'+
//     '<block type="logic_boolean" id="d[._igq{x2w7zubn4[Af" deletable="false">'+
//       '<field name="BOOL">FALSE</field>'+
//     '</block>'+
//   '</value>'+
//   '<value name="DISABLE">'+
//     '<block type="logic_boolean" id="nDYlY2Z{v$2K|XI`c5T^">'+
//       '<field name="BOOL">TRUE</field>'+
//     '</block>'+
//   '</value>'+
//   '</block>'+
//   '</xml>';
//   this.blockLibraryController.openBlock2(xml3);
// }
FactoryUtils.getBlockDefinition =   function(blockType, rootBlock, format, workspace) {
  console.log(blockType);


  console.log("현재 블록 작업 할 게요!");
  console.log(rootBlock);
  switch (format) {
    case 'JSON':

      var code = FactoryUtils.formatJson_(blockType, rootBlock);

      this.block_code = code;
      root_block = rootBlock;
      console.log(this.block_code);
      break;
  }
  return code;
};
FactoryUtils.add = function(blockType){
  console.log('백팔');
  console.log(myungse);
}
FactoryUtils.getBlockCode = function(blockType){
  // this.block_code
  // var parentDiv       = document.getElementById('dropdownDiv_blockLib');
  console.log('8181');
  console.log(contents_basket);
  var parentDiv       = document.getElementById('dropdown_'+blockType);
  console.log(parentDiv);
  var block_myungse   = document.createElement("INPUT");
  var obj             = JSON.parse(this.block_code);
  var name            = obj['type'];


  myungse[blockType] = this.block_code;
  sessionStorage.setItem(blockType, this.block_code);
            //  var position = sessionStorage.getItem('저장된 이름');
  console.log(sessionStorage.getItem(blockType));

  console.log('배열');
  console.log(myungse);

  block_myungse.setAttribute("type","text");
  block_myungse.setAttribute("class","block_myungse");
  block_myungse.setAttribute("value",this.block_code);
  block_myungse.setAttribute("hidden",true);

  parentDiv.appendChild(block_myungse);
  if(name == 'block_type'){
    var parent   =   document.getElementById('packageList');
    var trash    =   document.getElementsByClassName('contents_xml')[0];
    var trash2   =   document.getElementsByClassName('block_myungse')[0];
    console.log(trash);
    parent.removeChild(trash);
    parent.removeChild(trash2);
    alert('다시한번 클릭해 주세요');
  }
  var currentXml = Blockly.Xml.workspaceToDom(BlockFactory.mainWorkspace);

  // var obj = JSON.parse(this.block_code);
  // document.getElementById('packagenum').value = obj['packagenum'];
  return this.block_code;
}
// FactoryUtils.getBlockCode1 = function(){
  // this.block_code
  // var a = FactoryUtils.getBlockCode();
  // alert(a);
  // alert("block"+this.block_code);
  // document.getElementById('myungse1').value = "^^";
  // document.getElementById('myungse').value = this.block_code;
  // var obj = JSON.parse(this.block_code);
  // document.getElementById('packagenum').value = obj['packagenum'];
// }

/**
 * Convert invalid block name to a valid one. Replaces whitespace
 * and prepend names that start with a digit with an '_'.
 * @param {string} blockType Type of block.
 * @return {string} Cleaned up block type.
 */
FactoryUtils.cleanBlockType = function(blockType) {
  if (!blockType) {
    return '';
  }
  console.log('블럭타입');
  console.log(blockType);
  return blockType.replace(/\W/g, '_').replace(/^(\d)/, '_$1');
};

/**
 * Get the generator code for a given block.
 * @param {!Blockly.Block} block Rendered block in preview workspace.
 * @param {string} generatorLanguage 'JavaScript', 'Python', 'PHP', 'Lua',
 *   'Dart'.
 * @return {string} Generator code for multiple blocks.
 */
FactoryUtils.getGeneratorStub = function(block, generatorLanguage) {

  function makeVar(root, name) {
    name = name.toLowerCase().replace(/\W/g, '_');
    return '  var ' + root + '_' + name;
  }
  // The makevar function lives in the original update generator.
  var language = generatorLanguage;
  var code = [];
  code.push("Blockly." + language + "['" + block.type +
            "'] = function(block) {");

  // Generate getters for any fields or inputs.
  for (var i = 0, input; input = block.inputList[i]; i++) {
    for (var j = 0, field; field = input.fieldRow[j]; j++) {
      var name = field.name;
      if (!name) {
        continue;
      }
      if (field instanceof Blockly.FieldVariable) {
        // Subclass of Blockly.FieldDropdown, must test first.
        code.push(makeVar('variable', name) +
                  " = Blockly." + language +
                  ".variableDB_.getName(block.getFieldValue('" + name +
                  "'), Blockly.Variables.NAME_TYPE);");
      } else if (field instanceof Blockly.FieldAngle) {
        // Subclass of Blockly.FieldTextInput, must test first.
        code.push(makeVar('angle', name) +
                  " = block.getFieldValue('" + name + "');");
      } else if (Blockly.FieldDate && field instanceof Blockly.FieldDate) {
        // Blockly.FieldDate may not be compiled into Blockly.
        code.push(makeVar('date', name) +
                  " = block.getFieldValue('" + name + "');");
      } else if (field instanceof Blockly.FieldColour) {
        code.push(makeVar('colour', name) +
                  " = block.getFieldValue('" + name + "');");
      } else if (field instanceof Blockly.FieldCheckbox) {
        code.push(makeVar('checkbox', name) +
                  " = block.getFieldValue('" + name + "') == 'TRUE';");
      } else if (field instanceof Blockly.FieldDropdown) {
        code.push(makeVar('dropdown', name) +
                  " = block.getFieldValue('" + name + "');");
      } else if (field instanceof Blockly.FieldNumber) {
        code.push(makeVar('number', name) +
                  " = block.getFieldValue('" + name + "');");
      } else if (field instanceof Blockly.FieldTextInput) {

        code.push(makeVar('text', name) +
                  " = block.getFieldValue('" + name + "');");
      }
    }
    var name = input.name;
    if (name) {
      if (input.type == Blockly.INPUT_VALUE) {

        code.push(makeVar('value', name) +
                  " = Blockly." + language + ".valueToCode(block, '" + name +
                  "', Blockly." + language + ".ORDER_ATOMIC);");
      } else if (input.type == Blockly.NEXT_STATEMENT) {
        code.push(makeVar('statements', name) +
                  " = Blockly." + language + ".statementToCode(block, '" +
                  name + "');");
      }
    }
  }
  // Most languages end lines with a semicolon.  Python does not.
  var lineEnd = {
    'JavaScript': ';',
    'Python': '',
    'PHP': ';',
    'Dart': ';'
  };
  code.push("  // TODO: Assemble " + language + " into code variable.");
  if (block.outputConnection) {

    code.push("  var code = '...';");
    code.push("  // TODO: Change ORDER_NONE to the correct strength.");
    code.push("  return [code, Blockly." + language + ".ORDER_NONE];");
  } else {
    code.push("  var code = '..." + (lineEnd[language] || '') + "\\n';");
    code.push("  return code;");
  }
  code.push("};");

  return code.join('\n');
};

/**
 * Update the language code as JSON.
 * @param {string} blockType Name of block.
 * @param {!Blockly.Block} rootBlock Factory_base block.
 * @return {string} Generanted language code.
 * @private
 */
FactoryUtils.formatJson_ = function(blockType, rootBlock) {
  console.log("첫진입");
  // console.log("blockType:"+blockType);F
  //rootblock : 기본 제공 블럭
  console.log("현재rootBlock:"+rootBlock);
  var JS = {};
  // Type is not used by Blockly, but may be used by a loader.

  JS.name = blockType;

  JS.vertical   = FactoryUtils.getVerticalRootBlock_(rootBlock);
  JS.horizontal = FactoryUtils.getHorizontalRootBlock_(rootBlock);

  // JS.latitude = ;
  // JS.longitude = ;
  // Generate inputs.
  var message  = [];
  var args     = [];
  var txt_args = [];
  var btn_args = [];
  var srtargs  = [];
  var editargs = [];

  var contentsBlock   = rootBlock.getInputTargetBlock('IMAGES');
  var txtBlock        = rootBlock.getInputTargetBlock('TEXTS');
  var btnBlock        = rootBlock.getInputTargetBlock('BUTTONS');
  var clickblock      = rootBlock.getInputTargetBlock('SCRIPT');
  var editBlock       = rootBlock.getInputTargetBlock('EDIT')

  var lastInput = null;
  var ifNameNumber = 1;
  while(editBlock) {
    if(!editBlock.disabled){

    var input = {};

    if (editBlock.type != 'input_dummy') {
    //name 속성의 값을 가져옴
      input.text      = editBlock.getFieldValue('TEXT');
      input.hint      = editBlock.getFieldValue('HINT');
      input.size      = editBlock.getFieldValue('SIZE');
    }
    JS.edit = input;
    // message.push('%' + txt_args.length);
    lastInput = editargs;
    }
    editBlock = editBlock.nextConnection && editBlock.nextConnection.targetBlock();
  }
  while(clickblock) {
    if(!clickblock.disabled  && !clickblock.getInheritedDisabled()){
      var script_fields = FactoryUtils.getFieldsJson_(
        clickblock.getInputTargetBlock('SCRIPT'));
      var CHECKEDIT1     = FactoryUtils.getFieldsJson_(
        clickblock.getInputTargetBlock('CHECKEDIT1'));
      var CHECKEDIT2     = FactoryUtils.getFieldsJson_(
        clickblock.getInputTargetBlock('CHECKEDIT2'));

      var input = {};

      // for(var i=0; i< script_fields.length; i++) {
      //   if(typeof script_fields[i] == 'string'){
      //     message.push(script_fields[i].replace(/%/g,'%%'));
      //   }else{
      //     srtargs.push(script_fields[i]);
      //   }
      // }
      // for(var i=0; i< script_fields.length; i++) {
      //   console.log(script_fields[i]);
      // }

      var input  = {type:clickblock.type};
      var number = script_fields.length;
      console.log(input.type);
      if(clickblock.type != 'input_dummy') {
        if(input.type == 'CHECKEDIT')
        {
          input.name   = clickblock.getFieldValue('EDITINPUTNAME');
          input.answer = clickblock.getFieldValue('ANSWER');
          input.true   = CHECKEDIT1;
          input.false  = CHECKEDIT2;
        } else {
          var a = [];
          input.name   = clickblock.getFieldValue('INPUTNAME');
          input.action = script_fields;
        }
      }
      srtargs.push(input);
  }
    clickblock = clickblock.nextConnection && clickblock.nextConnection.targetBlock();
}
  while(btnBlock) {
    if(!btnBlock.disabled){

    var input = {};

    if (btnBlock.type != 'input_dummy') {
    //name 속성의 값을 가져옴
      input.id        = btnBlock.getFieldValue('FIELDNAME');
      input.name      = btnBlock.getFieldValue('TEXT');
      input.fill      = btnBlock.getFieldValue('FONTCOLOR');
      input.color     = btnBlock.getFieldValue('COLOUR');
      input.size      = btnBlock.getFieldValue('FONTSIZE');
      input.width     = btnBlock.getFieldValue('WIDTH');
      input.height    = btnBlock.getFieldValue('HEIGHT');
    }
    btn_args.push(input);
    // message.push('%' + txt_args.length);
    lastInput = btnBlock;
    }
    btnBlock = btnBlock.nextConnection && btnBlock.nextConnection.targetBlock();
  }

  while(txtBlock){
    if(!txtBlock.disabled && !txtBlock.getInheritedDisabled()){

    var input = {};
    // alert(imgBlock.type);
    // alert(input);

    if (txtBlock.type) {
      //name 속성의 값을 가져옴
      switch(txtBlock.type){
        case 'header':
            input.id = '1';
          break;
        case 'bottom':
            input.id = '2';
          break;
      }
      input.name  = txtBlock.getFieldValue('TEXTNAME');
      input.description  = txtBlock.getFieldValue('DESCRIPTION');
      input.size  = txtBlock.getFieldValue('FONTSIZE');
      input.color = txtBlock.getFieldValue('COLOUR');
      input.background = txtBlock.getFieldValue('BACKCOLOUR');
      input.alpha = txtBlock.getFieldValue('ALPHA');
    }
      txt_args.push(input);
      // message.push('%' + txt_args.length);
      lastInput = txtBlock;
    }
    txtBlock = txtBlock.nextConnection && txtBlock.nextConnection.targetBlock();
  }


  while (contentsBlock) {
    if (!contentsBlock.disabled && !contentsBlock.getInheritedDisabled()) {
      console.log('upfile 실험1');

      var input = {};
      var cform = document.form_name;
      var ex;
      var ex2;

      console.log(contentsBlock.type);
      switch(contentsBlock.type){
        case 'image_1':
          console.log('1');
            input.id = '1';
            // var elements = document.getElementsByClassName('file_list');
            // if(contentsBlock){
            //   console.log(document.getElementById('change').value);
            //   if(document.getElementById('change').value == 1)
            //   {
            //     console.log('들어옴');
            //     break;
            //   }
            //   else if(elements[0] == null)
            //   {
            //     cform.upFile.click();
            //   }
            // }
            // input.src = document.getElementsByClassName('file_list')[0].value;
            break;
        case 'image_2':
          console.log('2');
            input.id = '2';
          //   console.log('2');
          //   if(contentsBlock){
          //     if(document.getElementById('change').value == 1)
          //     {
          //       console.log('들어옴');
          //       break;
          //     }
          //     else if(elements[1] == null)
          //     {
          //       cform.upFile.click();
          //     }
          //   }
          // input.src = document.getElementsByClassName('file_list')[1].value;
          break;
        case 'image_3':
        console.log('3');
            input.id = '3';
            // console.log('3');
            // if(contentsBlock){
            //   if(document.getElementById('change').value == 1)
            //   {
            //     console.log('들어옴');
            //     break;
            //   }
            //   else if(elements[2]== null)
            //   {
            //     cform.upFile.click();
            //   }
            // }
            // input.src = document.getElementsByClassName('file_list')[2].value;
          break;
        case 'image_4':
        console.log('4');
            input.id = '4';
          //   console.log('4');
          //   if(contentsBlock){
          //     if(document.getElementById('change').value == 1)
          //     {
          //       console.log('들어옴');
          //       break;
          //     }
          //     else if(elements[3]== null)
          //     {
          //       cform.upFile.click();
          //     }
          //   }
          // input.src = document.getElementsByClassName('file_list')[3].value;
          break;
      }
      var a = document.getElementsByClassName('file_list')
      console.log(a);
      console.log(a[0]);

      if (contentsBlock.type != 'input_dummy') {
        //name 속성의 값을 가져옴
        input.name = contentsBlock.getFieldValue('IMGNAME');
        input.src = contentsBlock.getFieldValue('SRC');
        input.width = contentsBlock.getFieldValue('WIDTH');
        input.height = contentsBlock.getFieldValue('HEIGHT');
      }
      args.push(input);
      message.push('%' + args.length);
      lastInput = contentsBlock;
      var lastInput2 = '/'+lastInput;
      console.log(imgArgs);

    }
    contentsBlock = contentsBlock.nextConnection &&
        contentsBlock.nextConnection.targetBlock();
  }
  // Remove last input if dummy and not empty.
  // if (lastInput && lastInput.type == 'input_dummy') {
  //   var fields = lastInput.getInputTargetBlock('FIELDS');
  //   if (fields && FactoryUtils.getFieldsJson_(fields).join('').trim() != '') {
  //     var align = lastInput.getFieldValue('ALIGN');
  //     if (align != 'LEFT') {
  //       JS.lastDummyAlign0 = align;
  //     }
  //     srtargs.pop();
  //     txt_args.pop();
  //     btn_args.pop();
  //     args.pop();
  //     message.pop();
  //   }
  // }
  // JS.message0 = message.join(' ');

  if (args.length) {
    JS.image = args;
  }
  if (txt_args.length) {
    JS.text = txt_args;
  }
  if(btn_args.length) {
    JS.button = btn_args;
  }
  if(srtargs.length) {
    JS.script = srtargs;
  }
  // if(editargs.length) {
    // JS.edit =  editargs;
  // }

  console.log("^^"+rootBlock);

  JS.location   = document.getElementById('get_location').innerHTML;
  JS.visionable = FactoryUtils.getVisionableBoolRootBlock_(rootBlock);
  JS.clickable  = FactoryUtils.getClickableRootBlock1_(rootBlock);
  JS.disable    = FactoryUtils.getDisableRootBlock_(rootBlock);
  // JS.toast      = FactoryUtils.getToastRootBlock_(rootBlock);
  // JS.quest      = FactoryUtils.getQuestRootBlock_(rootBlock);
  // JS.bingo      = FactoryUtils.getBingoRootBlock_(rootBlock);
  // JS.collection = FactoryUtils.getCollectionRootBlock_(rootBlock);
  // JS.map        = FactoryUtils.getMapRootBlock_(rootBlock);

  return JSON.stringify(JS, null, '  ');

};

/**
 * Update the language code as JavaScript.
 * @param {string} blockType Name of block.
 * @param {!Blockly.Block} rootBlock Factory_base block.
 * @param {!Blockly.Workspace} workspace Where the root block lives.
 * @return {string} Generated language code.
 * @private
 */
FactoryUtils.formatJavaScript_ = function(blockType, rootBlock, workspace) {
  var code = [];
  code.push("Blockly.Blocks['" + blockType + "'] = {");
  code.push("  init: function() {");
  // Generate inputs.
  var TYPES = {'input_value': 'appendValueInput',
               'input_statement': 'appendStatementInput',
               'input_dummy': 'appendDummyInput'};
  var contentsBlock = rootBlock.getInputTargetBlock('INPUTS');
  while (contentsBlock) {
    if (!contentsBlock.disabled && !contentsBlock.getInheritedDisabled()) {
      var name = '';
      // Dummy inputs don't have names.  Other inputs do.
      if (contentsBlock.type != 'input_dummy') {
        name =
            JSON.stringify(contentsBlock.getFieldValue('INPUTNAME'));
      }
      code.push('    this.' + TYPES[contentsBlock.type] + '(' + name + ')');
      var check = FactoryUtils.getOptTypesFrom(contentsBlock, 'TYPE');
      if (check) {
        code.push('        .setCheck(' + check + ')');
      }
      var align = contentsBlock.getFieldValue('ALIGN');
      if (align != 'LEFT') {
        code.push('        .setAlign(Blockly.ALIGN_' + align + ')');
      }
      var fields = FactoryUtils.getFieldsJs_(
          contentsBlock.getInputTargetBlock('FIELDS'));
      for (var i = 0; i < fields.length; i++) {
        code.push('        .appendField(' + fields[i] + ')');
      }
      // Add semicolon to last line to finish the statement.
      code[code.length - 1] += ';';
    }
    contentsBlock = contentsBlock.nextConnection &&
        contentsBlock.nextConnection.targetBlock();
  }
  // Generate inline/external switch.
  if (rootBlock.getFieldValue('INLINE') == 'EXT') {
    code.push('    this.setInputsInline(false);');
  } else if (rootBlock.getFieldValue('INLINE') == 'INT') {
    code.push('    this.setInputsInline(true);');
  }
  // Generate output, or next/previous connections.
  switch (rootBlock.getFieldValue('CONNECTIONS')) {
    case 'LEFT':
      code.push(FactoryUtils.connectionLineJs_('setOutput', 'OUTPUTTYPE', workspace));
      break;
    case 'BOTH':
      code.push(
          FactoryUtils.connectionLineJs_('setPreviousStatement', 'TOPTYPE', workspace));
      code.push(
          FactoryUtils.connectionLineJs_('setNextStatement', 'BOTTOMTYPE', workspace));
      break;
    case 'TOP':
      code.push(
          FactoryUtils.connectionLineJs_('setPreviousStatement', 'TOPTYPE', workspace));
      break;
    case 'BOTTOM':
      code.push(
          FactoryUtils.connectionLineJs_('setNextStatement', 'BOTTOMTYPE', workspace));
      break;
  }
  // Generate colour.
  var colourBlock = rootBlock.getInputTargetBlock('COLOUR');


  if (colourBlock && !colourBlock.disabled) {
    var hue = parseInt(colourBlock.getFieldValue('HUE'), 10);
    if (!isNaN(hue)) {
      code.push('    this.setColour(' + hue + ');');
    }
  }

  // var tooltip = FactoryUtils.getTooltipFromRootBlock_(rootBlock);
  // var helpUrl = FactoryUtils.getHelpUrlFromRootBlock_(rootBlock);
  // code.push("    this.setTooltip('" + tooltip + "');");
  // code.push("    this.setHelpUrl('" + helpUrl + "');");

  code.push('  }');
  code.push('};');
  return code.join('\n');
};

/**
 * Create JS code required to create a top, bottom, or value connection.
 * @param {string} functionName JavaScript function name.
 * @param {string} typeName Name of type input.
 * @param {!Blockly.Workspace} workspace Where the root block lives.
 * @return {string} Line of JavaScript code to create connection.
 * @private
 */
FactoryUtils.connectionLineJs_ = function(functionName, typeName, workspace) {
  console.log("gg");
  var type = FactoryUtils.getOptTypesFrom(
      FactoryUtils.getRootBlock(workspace), typeName);
  if (type) {
    type = ', ' + type;
  } else {
    type = '';
  }
  return '    this.' + functionName + '(true' + type + ');';
};

/**
 * Returns field strings and any config.
 * @param {!Blockly.Block} block Input block.
 * @return {!Array.<string>} Field strings.
 * @private
 */
FactoryUtils.getFieldsJs_ = function(block) {

  var script_fields = [];
  while (block) {
    if (!block.disabled && !block.getInheritedDisabled()) {

      switch (block.type) {
        case 'field_static':
          // Result: 'hello'
          fields.push(JSON.stringify(block.getFieldValue('TEXT')));
          break;
        case 'field_input':
          console.log("gg");
          // Result: new Blockly.FieldTextInput('Hello'), 'GREET'
          fields.push('new Blockly.FieldTextInput(' +
              JSON.stringify(block.getFieldValue('TEXT')) + '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_number':
          // Result: new Blockly.FieldNumber(10, 0, 100, 1), 'NUMBER'
          var args = [
            Number(block.getFieldValue('VALUE')),
            Number(block.getFieldValue('MIN')),
            Number(block.getFieldValue('MAX')),
            Number(block.getFieldValue('PRECISION'))
          ];
          // Remove any trailing arguments that aren't needed.
          if (args[3] == 0) {
            args.pop();
            if (args[2] == Infinity) {
              args.pop();
              if (args[1] == -Infinity) {
                args.pop();
              }
            }
          }
          fields.push('new Blockly.FieldNumber(' + args.join(', ') + '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_angle':
          // Result: new Blockly.FieldAngle(90), 'ANGLE'
          fields.push('new Blockly.FieldAngle(' +
              parseFloat(block.getFieldValue('ANGLE')) + '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_checkbox':
          // Result: new Blockly.FieldCheckbox('TRUE'), 'CHECK'
          fields.push('new Blockly.FieldCheckbox(' +
              JSON.stringify(block.getFieldValue('CHECKED')) +
               '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_colour':
          // Result: new Blockly.FieldColour('#ff0000'), 'COLOUR'
          fields.push('new Blockly.FieldColour(' +
              JSON.stringify(block.getFieldValue('COLOUR')) +
              '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_date':
          // Result: new Blockly.FieldDate('2015-02-04'), 'DATE'
          fields.push('new Blockly.FieldDate(' +
              JSON.stringify(block.getFieldValue('DATE')) + '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_variable':
          // Result: new Blockly.FieldVariable('item'), 'VAR'
          var varname
              = JSON.stringify(block.getFieldValue('TEXT') || null);
          fields.push('new Blockly.FieldVariable(' + varname + '), ' +
              JSON.stringify(block.getFieldValue('FIELDNAME')));
          break;
        case 'field_dropdown':
          // Result:
          // new Blockly.FieldDropdown([['yes', '1'], ['no', '0']]), 'TOGGLE'
          var options = [];
          for (var i = 0; i < block.optionList_.length; i++) {
            options[i] = JSON.stringify([block.getUserData(i),
                                         block.getFieldValue('CPU' + i)]);
          }
          if (options.length) {
            fields.push('new Blockly.FieldDropdown([' +
                options.join(', ') + ']), ' +
                JSON.stringify(block.getFieldValue('FIELDNAME')));
          }
          break;
        case 'field_image':
          // Result: new Blockly.FieldImage('http://...', 80, 60, '*')

          var src = JSON.stringify(block.getFieldValue('SRC'));
          var width = Number(block.getFieldValue('WIDTH'));
          var height = Number(block.getFieldValue('HEIGHT'));
          var alt = JSON.stringify(block.getFieldValue('ALT'));
          fields.push('new Blockly.FieldImage(' +
              src + ', ' + width + ', ' + height + ', ' + alt + ')');
          break;

      }
    }
    block = block.nextConnection && block.nextConnection.targetBlock();
  }
  return fields;
};

/**
 * Returns field strings and any config.
 * @param {!Blockly.Block} block Input block.
 * @return {!Array.<string|!Object>} Array of static text and field configs.
 * @private
 */
 FactoryUtils.getControlssJson_ = function(block) {
   var fields = [];

   while (block) {
     if (!block.disabled && !block.getInheritedDisabled()) {
       switch (block.type) {


         case 'field_number':
           var obj = {
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             value: parseFloat(block.getFieldValue('VALUE'))
           };
           var min = parseFloat(block.getFieldValue('MIN'));
           if (min > -Infinity) {
             obj.min = min;
           }
           var max = parseFloat(block.getFieldValue('MAX'));
           if (max < Infinity) {
             obj.max = max;
           }
           var precision = parseFloat(block.getFieldValue('PRECISION'));
           if (precision) {
             obj.precision = precision;
           }
           fields.push(obj);
           break;
         case 'field_angle':
           fields.push({
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             angle: Number(block.getFieldValue('ANGLE'))
           });
           break;
         case 'field_checkbox':
           fields.push({
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             checked: block.getFieldValue('CHECKED') == 'TRUE'
           });
           break;
         case 'field_colour':
           fields.push({
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             colour: block.getFieldValue('COLOUR')
           });
           break;
         case 'field_date':
           fields.push({
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             date: block.getFieldValue('DATE')
           });
           break;
         case 'field_variable':
           fields.push({
             type: block.type,
             name: block.getFieldValue('FIELDNAME'),
             variable: block.getFieldValue('TEXT') || null
           });
           break;
         case 'field_dropdown':
           var options = [];
           for (var i = 0; i < block.optionList_.length; i++) {
             options[i] = [block.getUserData(i),
                 block.getFieldValue('CPU' + i)];
           }
           if (options.length) {
             fields.push({
               type: block.type,
               name: block.getFieldValue('FIELDNAME'),
               options: options
             });
           }
           break;
         case 'field_image':
           fields.push({
             type: block.type,
             src: block.getFieldValue('SRC'),
             width: Number(block.getFieldValue('WIDTH')),
             height: Number(block.getFieldValue('HEIGHT')),
             alt: block.getFieldValue('ALT')
           });
           break;
       }
     }
     block = block.nextConnection && block.nextConnection.targetBlock();
   }
   return fields;
 };
FactoryUtils.getFieldsJson_ = function(block) {
  var script_fields = {};
  var script_obj = [];
  while (block) {
    if (!block.disabled && !block.getInheritedDisabled()) {
      switch (block.type) {
        case 'openMap':
            script_fields['openMap'] =block.getFieldValue('BOOL');
          break;
        case 'closeMap':
            script_fields['closeMap'] =block.getFieldValue('BOOL');
          break;
        case 'toast':
        script_fields.push({
          toast: block.getFieldValue('TOAST')
        });
          break;
        case 'quest':
        //  script_fields.push({
        //   quest: block.getFieldValue('QUEST')
        // });
        script_fields['quest'] = block.getFieldValue('QUEST');
          break;
        case 'endQuest':
        //  script_fields.push({
        //      endQuest: block.getFieldValue('BOOL')
        //     });
         script_fields['endQuest'] = block.getFieldValue('BOOL');
          break;
        case 'bingo':
          // script_fields.push({
          //   bingo: block.getFieldValue('BINGO')
          // });
          script_fields['bingo'] = block.getFieldValue('BINGO');
          break;
        case 'endBingo':
          // script_fields.push({
          //   endBingo: block.getFieldValue('BOOL')
          // });
          script_fields['endBingo'] = block.getFieldValue('BINGO');
          break;
        case 'endCollection':
          script_fields.push({
            endCollection: block.getFieldValue('BOOL')
          });
          break;
        case 'button_1':
        case 'button_2':
        case 'button_3':
        case 'button_4':
          script_fields.push({
            type: block.type,
            name: block.getFieldValue('FIELDNAME'),
            color: block.getFieldValue('COLOUR'),
            text : block.getFieldValue('TEXT'),
            foncColor: block.getFieldValue('FONTCOLOUR')
        });
          break;
        case 'header':
        case 'bottom':
          script_fields.push({
            type: block.type,
            text: block.getFieldValue('TEXT'),
            name: block.getFieldValue('FIELDNAME'),
            color: block.getFieldValue('COLOUR'),
            size: block.getFieldValue('VALUE'),
            background: block.getFieldValue('BACKCOLOUR'),
            alpah: block.getFieldValue('ALPHA')
          });
            break;
        case 'image_1':
        case 'image_2':
        case 'image_3':
        case 'image_4':
          script_fields.push({
              type: block.type,
              name: block.getFieldValue('IMGNAME'),
              src : block.getFieldValue('SRC'),
              width: Number(block.getFieldValue('WIDTH')),
              heght: Number(block.getFieldValue('HEIGHT'))
        });
          break;
        case 'collection':
          script_fields.push({
            collection: {
              src: block.getFieldValue('COLLECTION_SRC'),
              text: block.getFieldValue('COLLECTION')
            }
          });
          break;
        case 'CONFIG':
          script_obj.push({
              target_name:block.getFieldValue('CONTENTNAME'),
              visionable:block.getFieldValue('VISION'),
              clickable:block.getFieldValue('CLICK'),
              disable:block.getFieldValue('DISABLE')
          });
          script_fields['config'] = script_obj;
          break;
        case 'OUT_IMG':
          // script_fields.push({
          //     out_img:block.getFieldValue('OUT_SRC')
          // });
          script_fields['out_img'] = block.getFieldValue('OUT_SRC');
          break;
        case 'OUT_TXT':
          // script_fields.push({
          //     out_txt: block.getFieldValue('OUT_TXT')
          // });
          script_fields['out_txt'] = block.getFieldValue('OUT_TXT');
          break;
        case 'END':
          // script_fields.push({
          //     end: block.type
          // });
          script_fields['end'] = 'end';
      }
    }
    block = block.nextConnection && block.nextConnection.targetBlock();
  }
  return script_fields;
};

/**
 * Fetch the type(s) defined in the given input.
 * Format as a string for appending to the generated code.
 * @param {!Blockly.Block} block Block with input.
 * @param {string} name Name of the input.
 * @return {?string} String defining the types.
 */
FactoryUtils.getOptTypesFrom = function(block, name) {
  var types = FactoryUtils.getTypesFrom_(block, name);
  if (types.length == 0) {
    return undefined;
  } else if (types.indexOf('null') != -1) {
    return 'null';
  } else if (types.length == 1) {
    return types[0];
  } else {
    return '[' + types.join(', ') + ']';
  }
};


/**
 * Fetch the type(s) defined in the given input.
 * @param {!Blockly.Block} block Block with input.
 * @param {string} name Name of the input.
 * @return {!Array.<string>} List of types.
 * @private
 */
FactoryUtils.getTypesFrom_ = function(block, name) {
  var typeBlock = block.getInputTargetBlock(name);
  var types;
  if (!typeBlock || typeBlock.disabled) {
    types = [];
  } else if (typeBlock.type == 'type_other') {
    types = [JSON.stringify(typeBlock.getFieldValue('TYPE'))];
  } else if (typeBlock.type == 'type_group') {
    types = [];
    for (var n = 0; n < typeBlock.typeCount_; n++) {
      types = types.concat(FactoryUtils.getTypesFrom_(typeBlock, 'TYPE' + n));
    }
    // Remove duplicates.
    var hash = Object.create(null);
    for (var n = types.length - 1; n >= 0; n--) {
      if (hash[types[n]]) {
        types.splice(n, 1);
      }
      hash[types[n]] = true;
    }
  } else {
    types = [JSON.stringify(typeBlock.valueType)];
  }
  return types;
};

/**
 * Return the uneditable container block that everything else attaches to in
 * given workspace.
 * @param {!Blockly.Workspace} workspace Where the root block lives.
 * @return {Blockly.Block} Root block.
 */
FactoryUtils.getRootBlock = function(workspace) {
  var blocks = workspace.getTopBlocks(true);
  console.log(blocks);
  var blocks_v2 = "CONTENT"+blocks;
  console.log(blocks_v2);
  var a = blocks_v2.split(',');
  console.log(a[1]);
  if(a[1] != null)
  {
    detail.push(a[1]);
    console.log(detail);
    console.log(detail[0]);
  }else{
    console.log('없어요');
  }

  console.log(blocks_v2);
  console.log(blocks);
  // blocks = 'CONTENT'+blocks;
  //detail

  // var meisei = blocks.split(',');
  // detail.push(meisei[1]);
  // console.log(detail);

  // var meisei = blocks.split(',');
  // detail.push(meisei[1]);  console.log(detail);

  for (var i = 0, block; block = blocks[i]; i++) {
    // factory_base->제일 기본 블럭들
    if (block.type == 'factory_base') {
      console.log(typeof(block));
      console.log(String(block));
      return block;
    }
  }
  return null;
};

// TODO(quachtina96): Move hide, show, makeInvisible, and makeVisible to a new
// AppView namespace.

/**
 * Hides element so that it's invisible and doesn't take up space.
 * @param {string} elementID ID of element to hide.
 */
FactoryUtils.hide = function(elementID) {
  document.getElementById(elementID).style.display = 'none';
};

/**
 * Un-hides an element.
 * @param {string} elementID ID of element to hide.
 */
FactoryUtils.show = function(elementID) {
  document.getElementById(elementID).style.display = 'block';
};

/**
 * Hides element so that it's invisible but still takes up space.
 * @param {string} elementID ID of element to hide.
 */
FactoryUtils.makeInvisible = function(elementID) {
  document.getElementById(elementID).visibility = 'hidden';
};

/**
 * Makes element visible.
 * @param {string} elementID ID of element to hide.
 */
FactoryUtils.makeVisible = function(elementID) {
  document.getElementById(elementID).visibility = 'visible';
};

/**
 * Create a file with the given attributes and download it.
 * @param {string} contents The contents of the file.
 * @param {string} filename The name of the file to save to.
 * @param {string} fileType The type of the file to save.
 */
FactoryUtils.createAndDownloadFile = function(contents, filename, fileType) {
  var data = new Blob([contents], {type: 'text/' + fileType});
  var clickEvent = new MouseEvent("click", {
    "view": window,
    "bubbles": true,
    "cancelable": false
  });

  var a = document.createElement('a');
  a.href = window.URL.createObjectURL(data);
  a.download = filename;
  a.textContent = 'Download file!';
  a.dispatchEvent(clickEvent);
};

/**
 * Get Blockly Block by rendering pre-defined block in workspace.
 * @param {!Element} blockType Type of block that has already been defined.
 * @param {!Blockly.Workspace} workspace Workspace on which to render
 *    the block.
 * @return {!Blockly.Block} The Blockly.Block of desired type.
 */
FactoryUtils.getDefinedBlock = function(blockType, workspace) {
  workspace.clear();
  return workspace.newBlock(blockType);
};

/**
 * Parses a block definition get the type of the block it defines.
 * @param {string} blockDef A single block definition.
 * @return {string} Type of block defined by the given definition.
 */
FactoryUtils.getBlockTypeFromJsDefinition = function(blockDef) {
  var indexOfStartBracket = blockDef.indexOf('[\'');
  var indexOfEndBracket = blockDef.indexOf('\']');
  if (indexOfStartBracket != -1 && indexOfEndBracket != -1) {
    return blockDef.substring(indexOfStartBracket + 2, indexOfEndBracket);
  } else {
    throw new Error ('Could not parse block type out of JavaScript block ' +
        'definition. Brackets normally enclosing block type not found.');
  }
};

/**
 * Generates a category containing blocks of the specified block types.
 * @param {!Array.<!Blockly.Block>} blocks Blocks to include in the category.
 * @param {string} categoryName Name to use for the generated category.
 * @return {!Element} Category XML containing the given block types.
 */
FactoryUtils.generateCategoryXml = function(blocks, categoryName) {
  // Create category DOM element.
  var categoryElement = goog.dom.createDom('category');
  categoryElement.setAttribute('name', categoryName);

  // For each block, add block element to category.
  for (var i = 0, block; block = blocks[i]; i++) {

    // Get preview block XML.
    var blockXml = Blockly.Xml.blockToDom(block);
    blockXml.removeAttribute('id');

    // Add block to category and category to XML.
    categoryElement.appendChild(blockXml);
  }
  return categoryElement;
};

/**
 * Parses a string containing JavaScript block definition(s) to create an array
 * in which each element is a single block definition.
 * @param {string} blockDefsString JavaScript block definition(s).
 * @return {!Array.<string>} Array of block definitions.
 */
FactoryUtils.parseJsBlockDefinitions = function(blockDefsString) {
  var blockDefArray = [];
  var defStart = blockDefsString.indexOf('Blockly.Blocks');

  while (blockDefsString.indexOf('Blockly.Blocks', defStart) != -1) {
    var nextStart = blockDefsString.indexOf('Blockly.Blocks', defStart + 1);
    if (nextStart == -1) {
      // This is the last block definition.
      nextStart = blockDefsString.length;
    }
    var blockDef = blockDefsString.substring(defStart, nextStart);
    blockDefArray.push(blockDef);
    defStart = nextStart;
  }
  return blockDefArray;
};

/**
 * Parses a string containing JSON block definition(s) to create an array
 * in which each element is a single block definition. Expected input is
 * one or more block definitions in the form of concatenated, stringified
 * JSON objects.
 * @param {string} blockDefsString String containing JSON block
 *    definition(s).
 * @return {!Array.<string>} Array of block definitions.
 */
FactoryUtils.parseJsonBlockDefinitions = function(blockDefsString) {
  var blockDefArray = [];
  var unbalancedBracketCount = 0;
  var defStart = 0;
  // Iterate through the blockDefs string. Keep track of whether brackets
  // are balanced.
  for (var i = 0; i < blockDefsString.length; i++) {
    var currentChar = blockDefsString[i];
    if (currentChar == '{') {
      unbalancedBracketCount++;
    }
    else if (currentChar == '}') {
      unbalancedBracketCount--;
      if (unbalancedBracketCount == 0 && i > 0) {
        // The brackets are balanced. We've got a complete block defintion.
        var blockDef = blockDefsString.substring(defStart, i + 1);
        blockDefArray.push(blockDef);
        defStart = i + 1;
      }
    }
  }
  return blockDefArray;
};

/**
 * Define blocks from imported block definitions.
 * @param {string} blockDefsString Block definition(s).
 * @param {string} format Block definition format ('JSON' or 'JavaScript').
 * @return {!Array.<!Element>} Array of block types defined.
 */
FactoryUtils.defineAndGetBlockTypes = function(blockDefsString, format) {
  var blockTypes = [];

  // Define blocks and get block types.
  if (format == 'JSON') {
    console.log("gg");
    var blockDefArray = FactoryUtils.parseJsonBlockDefinitions(blockDefsString);

    // Populate array of blocktypes and define each block.
    for (var i = 0, blockDef; blockDef = blockDefArray[i]; i++) {
      var json = JSON.parse(blockDef);
      blockTypes.push(json.type);
console.log("ff");
      // Define the block.
      Blockly.Blocks[json.type] = {
        init: function() {
          this.jsonInit(json);
          console.log(this+"g");
        }

      };
    }
  } else if (format == 'JavaScript') {
    var blockDefArray = FactoryUtils.parseJsBlockDefinitions(blockDefsString);

    // Populate array of block types.
    for (var i = 0, blockDef; blockDef = blockDefArray[i]; i++) {
      var blockType = FactoryUtils.getBlockTypeFromJsDefinition(blockDef);
      blockTypes.push(blockType);
    }

    // Define all blocks.
    eval(blockDefsString);
  }

  return blockTypes;
};

/**
 * Inject code into a pre tag, with syntax highlighting.
 * Safe from HTML/script injection.
 * @param {string} code Lines of code.
 * @param {string} id ID of <pre> element to inject into.
 */
// FactoryUtils.injectCode = function(code, id) {
//   var pre = document.getElementById(id);
//
//   pre.textContent = code;
//   code = pre.textContent;
//   code = prettyPrintOne(code, 'js');
//
//   pre.innerHTML = code;
//   console.log("904"+code);
// };

/**
 * Returns whether or not two blocks are the same based on their XML. Expects
 * XML with a single child node that is a factory_base block, the XML found on
 * Block Factory's main workspace.
 * @param {!Element} blockXml1 An XML element with a single child node that
 *    is a factory_base block.
 * @param {!Element} blockXml2 An XML element with a single child node that
 *    is a factory_base block.
 * @return {boolean} Whether or not two blocks are the same based on their XML.
 */
FactoryUtils.sameBlockXml = function(blockXml1, blockXml2) {
  // Each XML element should contain a single child element with a 'block' tag
  if (blockXml1.tagName.toLowerCase() != 'xml' ||
      blockXml2.tagName.toLowerCase() != 'xml') {
    throw new Error('Expected two XML elements, recieved elements with tag ' +
        'names: ' + blockXml1.tagName + ' and ' + blockXml2.tagName + '.');
  }

  // Compare the block elements directly. The XML tags may include other meta
  // information we want to igrore.
  var blockElement1 = blockXml1.getElementsByTagName('block')[0];
  var blockElement2 = blockXml2.getElementsByTagName('block')[0];

  if (!(blockElement1 && blockElement2)) {
    throw new Error('Could not get find block element in XML.');
  }

  var blockXmlText1 = Blockly.Xml.domToText(blockElement1);
  var blockXmlText2 = Blockly.Xml.domToText(blockElement2);

  // Strip white space.
  blockXmlText1 = blockXmlText1.replace(/\s+/g, '');
  blockXmlText2 = blockXmlText2.replace(/\s+/g, '');

  // Return whether or not changes have been saved.
  return blockXmlText1 == blockXmlText2;
};

/*
 * Checks if a block has a variable field. Blocks with variable fields cannot
 * be shadow blocks.
 * @param {Blockly.Block} block The block to check if a variable field exists.
 * @return {boolean} True if the block has a variable field, false otherwise.
 */
FactoryUtils.hasVariableField = function(block) {
  if (!block) {
    return false;
  }
  return block.getVars().length > 0;
};

/**
 * Checks if a block is a procedures block. If procedures block names are
 * ever updated or expanded, this function should be updated as well (no
 * other known markers for procedure blocks beyond name).
 * @param {Blockly.Block} block The block to check.
 * @return {boolean} True if the block is a procedure block, false otherwise.
 */
FactoryUtils.isProcedureBlock = function(block) {
  return block &&
      (block.type == 'procedures_defnoreturn' ||
      block.type == 'procedures_defreturn' ||
      block.type == 'procedures_callnoreturn' ||
      block.type == 'procedures_callreturn' ||
      block.type == 'procedures_ifreturn');
};

/**
 * Returns whether or not a modified block's changes has been saved to the
 * Block Library.
 * TODO(quachtina96): move into the Block Factory Controller once made.
 * @param {!BlockLibraryController} blockLibraryController Block Library
 *    Controller storing custom blocks.
 * @return {boolean} True if all changes made to the block have been saved to
 *    the given Block Library.
 */
FactoryUtils.savedBlockChanges = function(blockLibraryController) {
  if (BlockFactory.isStarterBlock()) {
    return true;
  }
  var blockType = blockLibraryController.getCurrentBlockType();
  var currentXml = Blockly.Xml.workspaceToDom(BlockFactory.mainWorkspace);

  if (blockLibraryController.has(blockType)) {
    // Block is saved in block library.
    var savedXml = blockLibraryController.getBlockXml(blockType);
    return FactoryUtils.sameBlockXml(savedXml, currentXml);
  }
  return false;
};

/**
 * Given the root block of the factory, return the tooltip specified by the user
 * or the empty string if no tooltip is found.
 * @param {!Blockly.Block} rootBlock Factory_base block.
 * @return {string} The tooltip for the generated block, or the empty string.
 */
FactoryUtils.getTooltipFromRootBlock_ = function(rootBlock) {
  var tooltipBlock = rootBlock.getInputTargetBlock('TOOLTIP');
  if (tooltipBlock && !tooltipBlock.disabled) {
    return tooltipBlock.getFieldValue('TEXT');
  }
  return '';
};

/**
 * Given the root block of the factory, return the help url specified by the
 * user or the empty string if no tooltip is found.
 * @param {!Blockly.Block} rootBlock Factory_base block.
 * @return {string} The help url for the generated block, or the empty string.
 */
FactoryUtils.getHelpUrlFromRootBlock_ = function(rootBlock) {
  // console.log("!@#$!@#");
  var helpUrlBlock = rootBlock.getInputTargetBlock('HELPURL');
  console.log(helpUrlBlock);
  if (helpUrlBlock && !helpUrlBlock.disabled) {
    return helpUrlBlock.getFieldValue('TEXT');
  }
  return '';
};
FactoryUtils.getHorizontalRootBlock_ = function(rootBlock) {
  var horizontalBlock = rootBlock.getInputTargetBlock('HORIZONTAL');
  if(horizontalBlock && !horizontalBlock.disabled){
    return horizontalBlock.getFieldValue('HORIZONTAL');
  }
  return ' ';
};

FactoryUtils.getVerticalRootBlock_ = function(rootBlock) {
  var verticalBlock = rootBlock.getInputTargetBlock('VERTICAL');
  if(verticalBlock && !verticalBlock.disabled){
    return verticalBlock.getFieldValue('VERTICAL');
  }
  return ' ';
}
FactoryUtils.getConTextFromRootBlock_ = function(rootBlock) {
  var contextBlock = rootBlock.getInputTargetBlock('CONTEXT');
  if (contextBlock && !contextBlock.disabled) {
    return contextBlock.getFieldValue('TEXT');
  }
  return '';
};

FactoryUtils.getVisionableBoolRootBlock_ = function(rootBlock) {
  var visionableBlock = rootBlock.getInputTargetBlock('VISIONABLE');
  if (visionableBlock && !visionableBlock.disabled) {
    return visionableBlock.getFieldValue('BOOL');
  }
  return '';
};

FactoryUtils.getClickableRootBlock1_ = function(rootBlock) {
  var clickableBlock = rootBlock.getInputTargetBlock('CLICKABLE');
  //this.appendValueInput('BUTTON2')  같아야 됨!!!!
  if (clickableBlock && !clickableBlock.disabled) {
    return clickableBlock.getFieldValue('BOOL');
  }
  return '';
};

FactoryUtils.getDisableRootBlock_ = function(rootBlock) {
  var disableBlock = rootBlock.getInputTargetBlock('DISABLE');
  if(disableBlock && !disableBlock.disabled){
    return disableBlock.getFieldValue('BOOL');
  }
  return '';
};

FactoryUtils.getToastRootBlock_ = function(rootBlock) {
  var toastBlock = rootBlock.getInputTargetBlock('TOAST');
  if(toastBlock && !toastBlock.disabled){
    return toastBlock.getFieldValue('BOOL');
  }
  return '';
}

FactoryUtils.getQuestRootBlock_ = function(rootBlock) {
  var questBlock = rootBlock.getInputTargetBlock('QUEST');
  if(questBlock && !questBlock.disabled){
    return questBlock.getFieldValue('BOOL');
  }
  return '';
}
