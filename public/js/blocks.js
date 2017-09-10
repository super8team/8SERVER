/**
 * Blockly Demos: Block Factory Blocks
 *
 * Copyright 2012 Google Inc.
 * https://developers.google.com/blockly/
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
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
 * @fileoverview Blocks for Blockly's Block Factory application.
 * @author fraser@google.com (Neil Fraser)
 */
'use strict';


Blockly.Blocks['factory_base'] = {

  // Base of new block.
  init: function() {
    this.setColour(120);
    this.appendDummyInput()
        .appendField('コンテンツの名')
        .appendField(new Blockly.FieldTextInput(''), 'NAME');
    this.appendValueInput('VERTICAL')
        .appendField('コンテンツ縦並び');
    this.appendValueInput('HORIZONTAL')
        .appendField('コンテンツ横並び');
    this.appendStatementInput('SCRIPT')
        .setCheck('CheckEdit')
        .appendField('実行');
    this.appendStatementInput('IMAGES')
        .setCheck('Image')
        .appendField('イメージ');
    this.appendStatementInput('TEXTS')
        .setCheck('Text')
        .appendField('テキスト');
    this.appendStatementInput('BUTTONS')
        .setCheck('Button')
        .appendField('ボタン');
    this.appendStatementInput('EDIT')
        .setCheck('Edit')
        .appendField('エディット');
    this.appendValueInput('VISIONABLE')
        .setCheck('Boolean')
        .appendField('コンテンツの表示');
    this.appendValueInput('CLICKABLE')
        .setCheck('Boolean')
        .appendField('クリック動作');
    this.appendValueInput('DISABLE')
        .setCheck('Boolean')
        .appendField('コンテンツの停止');
  },
  mutationToDom: function() {
    var container = document.createElement('mutation');
    container.setAttribute('connections', this.getFieldValue('CONNECTIONS'));
    return container;
  },
  domToMutation: function(xmlElement) {
    var connections = xmlElement.getAttribute('connections');
    this.updateShape_(connections);
  },
  spawnOutputShadow_: function(option) {
    // Helper method for deciding which type of outputs this block needs
    // to attach shaddow blocks to.
    switch (option) {
      case 'LEFT':
        this.connectOutputShadow_('OUTPUTTYPE');
        break;
      case 'TOP':
        this.connectOutputShadow_('TOPTYPE');
        break;
      case 'BOTTOM':
        this.connectOutputShadow_('BOTTOMTYPE');
        break;
      case 'BOTH':
        this.connectOutputShadow_('TOPTYPE');
        this.connectOutputShadow_('BOTTOMTYPE');
        break;
    }
  },
  connectOutputShadow_: function(outputType) {
    // Helper method to create & connect shadow block.
    var type = this.workspace.newBlock('type_null');
    type.setShadow(true);
    type.outputConnection.connect(this.getInput(outputType).connection);
    type.initSvg();
    type.render();
  },
  updateShape_: function(option) {
    var outputExists = this.getInput('OUTPUTTYPE');
    var topExists = this.getInput('TOPTYPE');
    var bottomExists = this.getInput('BOTTOMTYPE');
    if (option == 'LEFT') {
      if (!outputExists) {
        this.addTypeInput_('OUTPUTTYPE', 'output type');
      }
    } else if (outputExists) {
      this.removeInput('OUTPUTTYPE');
    }
    if (option == 'TOP' || option == 'BOTH') {
      if (!topExists) {
        this.addTypeInput_('TOPTYPE', 'top type');
      }
    } else if (topExists) {
      this.removeInput('TOPTYPE');
    }
    if (option == 'BOTTOM' || option == 'BOTH') {
      if (!bottomExists) {
        this.addTypeInput_('BOTTOMTYPE', 'bottom type');
      }
    } else if (bottomExists) {
      this.removeInput('BOTTOMTYPE');
    }
  },
  addTypeInput_: function(name, label) {
    this.appendValueInput(name)
        .setCheck('Type')
        .appendField(label);
    this.moveInputBefore(name, 'COLOUR');
  }

};
var BINGO_MESSAGE = '%1';
var BINGO_ARGS = [
  {
    "type": "field_dropdown",
    "name": "BINGO",
    "options": [['1','1'],['2','2'],['3','3'],['4','4'],['5','5'],['6','6'],['7','7'],['8','8'],['9','9']],
  }
];

var VISION_MESSAGE = '콘텐츠 표시 %1';
var VISION_ARGS = [
  {
    "type": "field_dropdown",
    "name": "VISION",
    "options": [['true','true'],['true','true']],
  }
];

var CLICK_MESSAGE = 'クリック作動 %1';
var CLICK_ARGS = [
  {
    "type": "field_dropdown",
    "name": "CLICK",
    "options": [['true','true'],['false','false']],
  }
];

var DISABLE_MESSAGE = 'DISABLE %1';
var DISABLE_ARGS = [
  {
    "type": "field_dropdown",
    "name": "DISABLE",
    "options": [['true','true'],['false','false']],
  }
];

var FIELD_MESSAGE = 'fields %1 %2';
var FIELD_ARGS = [
  {
    "type": "field_dropdown",
    "name": "ALIGN",
    "options": [['left', 'LEFT'], ['right', 'RIGHT'], ['centre', 'CENTRE']],
  },
  {
    "type": "input_statement",
    "name": "FIELDS",
    // "check": "Field"
  }
];
var SCRIPT_MESSAGE = 'イベント %1 ';
var SCRIPT_ARG = [
    {
      "type": "input_statement",
      "name": "SCRIPT",
      // "check":"Field"
    }
];
//true
var CHECKEDIT_MESSAGE = '正解の場合 %1 ';
var CHECKEDIT_ARG = [
    {
      "type": "input_statement",
      "name": "CHECKEDIT1",
    }
];
//false
var CHECKEDIT2_MESSAGE = '誤答の場合 %1 ';
var CHECKEDIT2_ARG = [
    {
      "type": "input_statement",
      "name": "CHECKEDIT2",
    }
];
var TYPE_MESSAGE = 'type %1';
var TYPE_ARGS = [
  {
    "type": "input_value",
    "name": "TYPE",
    "check": "Type",
    "align": "RIGHT"
  }
];

Blockly.Blocks['input_value'] = {
  // Value input.
  init: function() {
    this.jsonInit({
      "message0": "value input %1 %2",
      "args0": [
        {
          "type": "field_input",
          "name": "INPUTNAME",
          "text": " "
        },
        {
          "type": "input_dummy"
        }
      ],
      "message1": FIELD_MESSAGE,
      "args1": FIELD_ARGS,
      "message2": TYPE_MESSAGE,
      "args2": TYPE_ARGS,
      "previousStatement": "Input",
      "nextStatement": "Input",
      "colour": 210,
      "tooltip": "A value socket for horizontal connections.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=71"
    });
  },
  onchange: function() {
    inputNameCheck(this);
  }
};


Blockly.Blocks['input_dummy'] = {
  // Dummy input.
  init: function() {
    this.jsonInit({
      "message0": "dummy input",
      "message1": FIELD_MESSAGE,
      "args1": FIELD_ARGS,
      "previousStatement": "Input",
      "nextStatement": "Input",
      "colour": 210,
      "tooltip": "For adding fields on a separate row with no " +
                 "connections. Alignment options (left, right, centre) " +
                 "apply only to multi-line fields.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=293"
    });
  }
};

Blockly.Blocks['vertical'] = {
  init: function() {
    this.jsonInit({
      "message0": "%1",
      "args0": [
        {
          "type": "field_dropdown",
          "name": "VERTICAL",
          "options": [["상단", "TOP"], ["하단", "BOTTOM"]],
        }
      ],
      "colour": 210,
    });
    this.setOutput(true, 'Field');
  }
};

Blockly.Blocks['horizontal'] = {
  init: function() {
    this.jsonInit({
      "message0" : "%1",
      "args0": [
        {
          "type": "field_dropdown",
          "name": "HORIZONTAL",
          "options" : [['왼쪽',"LEFT"],['가운데',"CENTER"],['오른쪽',"RIGHT"]],
        }
      ],
      "colour": 210,
    });
    this.setOutput(true,'Field');
  }
};



Blockly.Blocks['input_statement'] = {
  // Statement input.
  init: function() {
    this.jsonInit({
      "message0": "statement input %1 %2",
      "args0": [
        {
          "type": "field_input",
          "name": "INPUTNAME",
          "text": "NAME"
        },
        {
          "type": "input_dummy"
        },
      ],
      "message1": FIELD_MESSAGE,
      "args1": FIELD_ARGS,
      "message2": TYPE_MESSAGE,
      "args2": TYPE_ARGS,
      "previousStatement": "Input",
      "nextStatement": "Input",
      "colour": 210,
      "tooltip": "A statement socket for enclosed vertical stacks.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=246"
    });
  },
  onchange: function() {
    inputNameCheck(this);
  }
};
Blockly.Blocks['CHECKEDIT'] = {
  init: function() {
      this.jsonInit({
        "message0": "クリックイベント %1 %2 正解 %3 %4 %5",
        "args0": [
          {
            "type": "field_input",
            "name": "EDITINPUTNAME",
            "text": "NAME",
          },
          {
            "type":"input_dummy"
          },
          {
            "type": "field_input",
            "name": "ANSWER",
            "text": " "
          },
          {
            "type": "input_dummy"
          },
          {
            "type": "input_dummy"
          }
        ],
        "message1": CHECKEDIT_MESSAGE,
        "args1" : CHECKEDIT_ARG,
        "message2": CHECKEDIT2_MESSAGE,
        "args2" : CHECKEDIT2_ARG,
        "previousStatement": "CheckEdit",
        "nextStatement": "CheckEdit",
        "colour": 160,
      });
  }
};
Blockly.Blocks['CLICK'] = {
  init: function() {
      this.jsonInit({
        "message0" : "クリックイベント %1 %2",
        "args0": [
          {
            "type": "field_input",
            "name": "INPUTNAME",
            "text": "NAME"
          },
          {
            "type": "input_dummy"
          }
        ],
        "message1": SCRIPT_MESSAGE,
        "args1" :  SCRIPT_ARG,
        "previousStatement": "CheckEdit",
        "nextStatement": "CheckEdit",
        "colour": 160,
      });
    }
};
Blockly.Blocks['CONFIG'] = {
  init: function() {
      this.jsonInit({
        "message0" : "修正するコンテンツの名 %1 %2 ",
        "args0": [
          {
            "type": "field_input",
            "name": "CONTENTNAME",
            "text": "NAME"
          },
          {
            "type": "input_dummy"
          }
        ],
        "message1": VISION_MESSAGE,
        "args1" :  VISION_ARGS,
        "message2": CLICK_MESSAGE,
        "args2" :  CLICK_ARGS,
        "message3": DISABLE_MESSAGE,
        "args3" :  DISABLE_ARGS,
        "previousStatement": "CheckEdit",
        "nextStatement": "CheckEdit",
        "colour": 160,
      });
    }
};

Blockly.Blocks['END'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('イベント終了')
    this.setPreviousStatement(true, 'CheckEdit');
  }
}

Blockly.Blocks['field_static'] = {
  // Text value.
  init: function() {
    this.setColour(230);
    this.appendDummyInput()
        .appendField('text')
        .appendField(new Blockly.FieldTextInput(''), 'TEXT');
    this.setOutput(true, 'Field');
    // this.setPreviousStatement(true, 'Field');
    // this.setNextStatement(true, 'Field');
  }
};
//
// Blockly.Blocks['package_name'] = {
//   init: function() {
//     this.setColour(230);
//     this.appendDummyInput()
//         .appendField('text')
//   }
// };
Blockly.Blocks['button_1'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('ボタンのアイディ')
        .appendField('1', 'FIELDNAME');
    this.appendDummyInput()
        .appendField('ボタンの名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXT');
    this.appendDummyInput()
        .appendField('ボタンの色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'FONTCOLOR');
    this.appendDummyInput()
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE');
    this.appendDummyInput()
        .appendField('縦')
        .appendField(new Blockly.FieldNumber(0), 'HEIGHT')
        .appendField('横')
        .appendField(new Blockly.FieldNumber(0), 'WIDTH');
    this.setPreviousStatement(true, 'Button');
    this.setNextStatement(true, 'Button');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['button_2'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('ボタンのアイディ')
        .appendField('2', 'VALUE')
    this.appendDummyInput()
        .appendField('ボタンの名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXT');
    this.appendDummyInput()
        .appendField('ボタンの色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'FONTCOLOUR');
    this.appendDummyInput()
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE');
    this.appendDummyInput()
        .appendField('縦')
        .appendField(new Blockly.FieldNumber(0), 'HEIGHT')
        .appendField('横')
        .appendField(new Blockly.FieldNumber(0), 'WIDTH');
    this.setPreviousStatement(true, 'Button');
    this.setNextStatement(true, 'Button');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
}
Blockly.Blocks['button_3'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('ボタンのアイディ')
        .appendField('3', 'VALUE');
    this.appendDummyInput()
        .appendField('ボタンの名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXT');
    this.appendDummyInput()
        .appendField('ボタンの色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'FONTCOLOUR');
    this.appendDummyInput()
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE');
    this.appendDummyInput()
        .appendField('縦')
        .appendField(new Blockly.FieldNumber(0), 'HEIGHT')
        .appendField('横')
        .appendField(new Blockly.FieldNumber(0), 'WIDTH');
    this.setPreviousStatement(true, 'Button');
    this.setNextStatement(true, 'Button');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
}
Blockly.Blocks['button_4'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('ボタンのアイディ')
        .appendField('4', 'VALUE');
    this.appendDummyInput()
        .appendField('ボタンの名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXT');
    this.appendDummyInput()
        .appendField('ボタンの色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'FONTCOLOUR');
    this.appendDummyInput()
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE');
    this.appendDummyInput()
        .appendField('縦')
        .appendField(new Blockly.FieldNumber(0), 'HEIGHT')
        .appendField('横')
        .appendField(new Blockly.FieldNumber(0), 'WIDTH');
    this.setPreviousStatement(true, 'Button');
    this.setNextStatement(true, 'Button');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
}

Blockly.Blocks['header'] = {
  // Text input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('文字の名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXTNAME')
        .appendField(',')
        .appendField('上段');
    this.appendDummyInput()
        .appendField('文字の内容')
        .appendField(new Blockly.FieldTextInput('default'), 'DESCRIPTION')
    this.appendDummyInput()
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE')
    this.appendDummyInput()
        .appendField('背景色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'BACKCOLOUR')
        .appendField('透明度')
        .appendField(new Blockly.FieldNumber(0), 'ALPHA');
    this.setPreviousStatement(true, 'Text');
    this.setNextStatement(true, 'Text');
    this.setTooltip('An input field for the user to enter text.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=319');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['bottom'] = {
  // Text input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('文字の名')
        .appendField(new Blockly.FieldTextInput('default'), 'TEXTNAME')
        .appendField(',')
        .appendField('下段');
    this.appendDummyInput()
        .appendField('文字の内容')
        .appendField(new Blockly.FieldTextInput('default'), 'DESCRIPTION')
    this.appendDummyInput()
        .appendField('文字の色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField('文字の大きさ')
        .appendField(new Blockly.FieldNumber(0), 'FONTSIZE')
    this.appendDummyInput()
        .appendField('背景色')
        .appendField(new Blockly.FieldColour('#ff0000'), 'BACKCOLOUR')
        .appendField('透明度')
        .appendField(new Blockly.FieldNumber(0), 'ALPHA');
    this.setPreviousStatement(true, 'Text');
    this.setNextStatement(true, 'Text');
    this.setTooltip('An input field for the user to enter text.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=319');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};


Blockly.Blocks['field_number'] = {
  // Numeric input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('numeric input')
        .appendField(new Blockly.FieldNumber(0), 'VALUE')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.appendDummyInput()
        .appendField('min')
        .appendField(new Blockly.FieldNumber(-Infinity), 'MIN')
        .appendField('max')
        .appendField(new Blockly.FieldNumber(Infinity), 'MAX')
        .appendField('precision')
        .appendField(new Blockly.FieldNumber(0, 0), 'PRECISION');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('An input field for the user to enter a number.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=319');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['field_angle'] = {
  // Angle input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('angle input')
        .appendField(new Blockly.FieldAngle('90'), 'ANGLE')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('An input field for the user to enter an angle.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=372');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['field_dropdown'] = {
  // Dropdown menu.
  init: function() {
    this.appendDummyInput()
        .appendField('dropdown')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.optionList_ = ['text', 'text', 'text'];
    this.updateShape_();
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setMutator(new Blockly.Mutator(['field_dropdown_option_text',
                                         'field_dropdown_option_image']));
    this.setColour(160);
    this.setTooltip('Dropdown menu with a list of options.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=386');
  },
  mutationToDom: function(workspace) {
    // Create XML to represent menu options.
    var container = document.createElement('mutation');
    container.setAttribute('options', JSON.stringify(this.optionList_));
    return container;
  },
  domToMutation: function(container) {
    // Parse XML to restore the menu options.
    var value = JSON.parse(container.getAttribute('options'));
    if (typeof value == 'number') {
      // Old format from before images were added.  November 2016.
      this.optionList_ = [];
      for (var i = 0; i < value; i++) {
        this.optionList_.push('text');
      }
    } else {
      this.optionList_ = value;
    }
    this.updateShape_();
  },
  decompose: function(workspace) {
    // Populate the mutator's dialog with this block's components.
    var containerBlock = workspace.newBlock('field_dropdown_container');
    containerBlock.initSvg();
    var connection = containerBlock.getInput('STACK').connection;
    for (var i = 0; i < this.optionList_.length; i++) {
      var optionBlock = workspace.newBlock(
          'field_dropdown_option_' + this.optionList_[i]);
      optionBlock.initSvg();
      connection.connect(optionBlock.previousConnection);
      connection = optionBlock.nextConnection;
    }
    return containerBlock;
  },
  compose: function(containerBlock) {
    // Reconfigure this block based on the mutator dialog's components.
    var optionBlock = containerBlock.getInputTargetBlock('STACK');
    // Count number of inputs.
    this.optionList_.length = 0;
    var data = [];
    while (optionBlock) {
      if (optionBlock.type == 'field_dropdown_option_text') {
        this.optionList_.push('text');
      } else if (optionBlock.type == 'field_dropdown_option_image') {
        this.optionList_.push('image');
      }
      data.push([optionBlock.userData_, optionBlock.cpuData_]);
      optionBlock = optionBlock.nextConnection &&
          optionBlock.nextConnection.targetBlock();
    }
    this.updateShape_();
    // Restore any data.
    for (var i = 0; i < this.optionList_.length; i++) {
      var userData = data[i][0];
      if (userData !== undefined) {
        if (typeof userData == 'string') {
          this.setFieldValue(userData || 'option', 'USER' + i);
        } else {
          this.setFieldValue(userData.src, 'SRC' + i);
          this.setFieldValue(userData.width, 'WIDTH' + i);
          this.setFieldValue(userData.height, 'HEIGHT' + i);
          this.setFieldValue(userData.alt, 'ALT' + i);
        }
        this.setFieldValue(data[i][1] || 'OPTIONNAME', 'CPU' + i);
      }
    }
  },
  saveConnections: function(containerBlock) {
    // Store all data for each option.
    var optionBlock = containerBlock.getInputTargetBlock('STACK');
    var i = 0;
    while (optionBlock) {
      optionBlock.userData_ = this.getUserData(i);
      optionBlock.cpuData_ = this.getFieldValue('CPU' + i);
      i++;
      optionBlock = optionBlock.nextConnection &&
          optionBlock.nextConnection.targetBlock();
    }
  },
  updateShape_: function() {
    // Delete everything.
    var i = 0;
    while (this.getInput('OPTION' + i)) {
      this.removeInput('OPTION' + i);
      this.removeInput('OPTION_IMAGE' + i, true);
      i++;
    }
    // Rebuild block.
    var src = 'https://www.gstatic.com/codesite/ph/images/star_on.gif';
    for (var i = 0; i <= this.optionList_.length; i++) {
      var type = this.optionList_[i];
      if (type == 'text') {
        this.appendDummyInput('OPTION' + i)
            .appendField('•')
            .appendField(new Blockly.FieldTextInput('option'), 'USER' + i)
            .appendField(',')
            .appendField(new Blockly.FieldTextInput('OPTIONNAME'), 'CPU' + i);
      } else if (type == 'image') {
        this.appendDummyInput('OPTION' + i)
            .appendField('•')
            .appendField('image')
            .appendField(new Blockly.FieldTextInput(src), 'SRC' + i);
        this.appendDummyInput('OPTION_IMAGE' + i)
            .appendField(' ')
            .appendField('width')
            .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'WIDTH' + i)
            .appendField('height')
            .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'HEIGHT' + i)
            .appendField('alt text')
            .appendField(new Blockly.FieldTextInput('*'), 'ALT' + i)
            .appendField(',')
            .appendField(new Blockly.FieldTextInput('OPTIONNAME'), 'CPU' + i);
      }
    }
  },
  onchange: function() {
    if (this.workspace && this.optionList_.length < 1) {
      this.setWarningText('Drop down menu must\nhave at least one option.');
    } else {
      fieldNameCheck(this);
    }
  },
  getUserData: function(n) {
    if (this.optionList_[n] == 'text') {
      return this.getFieldValue('USER' + n);
    }
    if (this.optionList_[n] == 'image') {
      return {
        src: this.getFieldValue('SRC' + n),
        width: Number(this.getFieldValue('WIDTH' + n)),
        height: Number(this.getFieldValue('HEIGHT' + n)),
        alt: this.getFieldValue('ALT' + n)
      };
    }
    throw 'Unknown dropdown type';
  }
};

Blockly.Blocks['field_dropdown_container'] = {
  // Container.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('add options');
    this.appendStatementInput('STACK');
    this.setTooltip('Add, remove, or reorder options\n' +
                    'to reconfigure this dropdown menu.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=386');
    this.contextMenu = false;
  }
};

Blockly.Blocks['field_dropdown_option_text'] = {
  // Add text option.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('text option');
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('Add a new text option to the dropdown menu.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=386');
    this.contextMenu = false;
  }
};

Blockly.Blocks['field_dropdown_option_image'] = {
  // Add image option.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('image option');
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('Add a new image option to the dropdown menu.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=386');
    this.contextMenu = false;
  }
};

Blockly.Blocks['field_checkbox'] = {
  // Checkbox.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('チェックBOX')
        .appendField(new Blockly.FieldCheckbox('TRUE'), 'CHECKED')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('Checkbox field.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=485');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['field_colour'] = {
  // Colour input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('colour')
        .appendField(new Blockly.FieldColour('#ff0000'), 'COLOUR')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('Colour input field.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=495');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['field_date'] = {
  // Date input.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('date')
        .appendField(new Blockly.FieldDate(), 'DATE')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('Date input field.');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['field_variable'] = {
  // Dropdown for variables.
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('variable')
        .appendField(new Blockly.FieldTextInput('item'), 'TEXT')
        .appendField(',')
        .appendField(new Blockly.FieldTextInput('NAME'), 'FIELDNAME');
    this.setPreviousStatement(true, 'Field');
    this.setNextStatement(true, 'Field');
    this.setTooltip('Dropdown menu for variable names.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=510');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['OUT_IMG'] = {
  init: function() {
    this.setColour(160);
    var src = ' ';
    this.appendDummyInput()
        .appendField('イメージアドレス')
        .appendField(new Blockly.FieldTextInput(src),'OUT_SRC');
    this.setPreviousStatement(true, 'CheckEdit');
    this.setNextStatement(true, 'CheckEdit');
  }
};
Blockly.Blocks['OUT_TXT'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('テキスト')
        .appendField(new Blockly.FieldTextInput(''),'OUT_TXT');
    this.setPreviousStatement(true, 'CheckEdit');
    this.setNextStatement(true, 'CheckEdit');
  }
};

Blockly.Blocks['collection'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('イメージ')
        .appendField(new Blockly.FieldTextInput(''),'COLLECTION_SRC');
    this.appendDummyInput()
        .appendField('コレクション')
        .appendField(new Blockly.FieldTextInput(''),'COLLECTION');
    this.setPreviousStatement(true, 'CheckEdit');
    this.setNextStatement(true, 'CheckEdit');
  }
};
Blockly.Blocks['toast'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('TOAST')
        .appendField(new Blockly.FieldTextInput(''),'TOAST');
    this.setPreviousStatement(true, 'CheckEdit');
    this.setNextStatement(true, 'CheckEdit');
  }
};

Blockly.Blocks['quest'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('クエスト内容')
        .appendField(new Blockly.FieldTextInput('クエスト内容入力'),'QUEST');
    this.setPreviousStatement(true, 'CheckEdit');
    this.setNextStatement(true, 'CheckEdit');
  }
};

Blockly.Blocks['bingo'] = {
  init: function() {
    this.jsonInit({
    "message0" : BINGO_MESSAGE,
    "args0" : BINGO_ARGS,
    "colour": 210,
  });
  this.setPreviousStatement(true, 'CheckEdit');
  this.setNextStatement(true, 'CheckEdit');
  },
};




Blockly.Blocks['EDIT'] = {
  init: function() {
    this.setColour(160);
    this.appendDummyInput()
        .appendField('テキスト')
        .appendField(new Blockly.FieldTextInput(''), 'TEXT');
    this.appendDummyInput()
        .appendField('ヒント')
        .appendField(new Blockly.FieldTextInput('ヒントを入力'), 'HINT');
    this.appendDummyInput()
        .appendField('サイズ')
        .appendField(new Blockly.FieldNumber(0), 'SIZE');
    this.setPreviousStatement(true, 'Edit');
    this.setNextStatement(true, 'Edit');
  }
}
Blockly.Blocks['image_1'] = {
  // Image.
  init: function() {
    this.setColour(160);
    var src = ' ';
    this.appendDummyInput()
        .appendField('イメージ1');
    this.appendDummyInput()
        .appendField('イメージアドレス')
        .appendField(new Blockly.FieldTextInput(src), 'SRC');
    this.appendDummyInput()
        .appendField('イメージ名')
        .appendField(new Blockly.FieldTextInput(src),'IMGNAME');
    this.appendDummyInput()
        .appendField('横')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'WIDTH')
        .appendField('縦')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'HEIGHT')
    this.setPreviousStatement(true, 'Image');
    this.setNextStatement(true, 'Image');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['image_2'] = {
  // Image.
  init: function() {
    this.setColour(160);
    var src = ' ';
    this.appendDummyInput()
        .appendField('イメージ2');
    this.appendDummyInput()
        .appendField('イメージアドレス')
        .appendField(new Blockly.FieldTextInput(src), 'SRC');
    this.appendDummyInput()
        .appendField('イメージ名')
        .appendField(new Blockly.FieldTextInput(src),'IMGNAME');
    this.appendDummyInput()
        .appendField('横')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'WIDTH')
        .appendField('縦')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'HEIGHT')
    this.setPreviousStatement(true, 'Image');
    this.setNextStatement(true, 'Image');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['image_3'] = {
  // Image.

  init: function() {
    this.setColour(160);
    var src = ' ';
    this.appendDummyInput()
        .appendField('イメージ3');
    this.appendDummyInput()
        .appendField('イメージアドレス')
        .appendField(new Blockly.FieldTextInput(src), 'SRC');
    this.appendDummyInput()
        .appendField('イメージ名')
        .appendField(new Blockly.FieldTextInput(src),'IMGNAME');
    this.appendDummyInput()
        .appendField('横')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'WIDTH')
        .appendField('縦')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'HEIGHT')
    this.setPreviousStatement(true, 'Image');
    this.setNextStatement(true, 'Image');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};
Blockly.Blocks['image_4'] = {
  // Image.
  init: function() {
    this.setColour(160);
    var src = ' ';
    this.appendDummyInput()
        .appendField('イメージ4');
    this.appendDummyInput()
        .appendField('イメージアドレス')
        .appendField(new Blockly.FieldTextInput('default'), 'IMGNAME');
    this.appendDummyInput()
        .appendField('イメージ名')
        .appendField(new Blockly.FieldTextInput(src),'IMGNAME');
    this.appendDummyInput()
        .appendField('横')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'WIDTH')
        .appendField('縦')
        .appendField(new Blockly.FieldNumber('15', 0, NaN, 1), 'HEIGHT')
        this.setPreviousStatement(true, 'Image');
        this.setNextStatement(true, 'Image');
  },
  onchange: function() {
    fieldNameCheck(this);
  }
};

Blockly.Blocks['type_group_container'] = {
  // Container.
  init: function() {
    this.jsonInit({
      "message0": "add types %1 %2",
      "args0": [
        {"type": "input_dummy"},
        {"type": "input_statement", "name": "STACK"}
      ],
      "colour": 230,
      "tooltip": "Add, or remove allowed type.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=677"
    });
  }
};

Blockly.Blocks['type_group_item'] = {
  // Add type.
  init: function() {
    this.jsonInit({
      "message0": "type",
      "previousStatement": null,
      "nextStatement": null,
      "colour": 230,
      "tooltip": "Add a new allowed type.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=677"
    });
  }
};

Blockly.Blocks['type_null'] = {
  // Null type.
  valueType: null,
  init: function() {
    this.jsonInit({
      "message0": "any",
      "output": "Type",
      "colour": 230,
      "tooltip": "Any type is allowed.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=602"
    });
  }
};

Blockly.Blocks['type_boolean'] = {
  // Boolean type.
  valueType: 'Boolean',
  init: function() {
    this.jsonInit({
      "message0": "Boolean",
      "output": "Type",
      "colour": 230,
      "tooltip": "Booleans (true/false) are allowed.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=602"
    });
  }
};


Blockly.Blocks['type_number'] = {
  // Number type.
  valueType: 'Number',
  init: function() {
    this.jsonInit({
      "message0": "Number",
      "output": "Type",
      "colour": 230,
      "tooltip": "Numbers (int/float) are allowed.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=602"
    });
  }
};

Blockly.Blocks['type_string'] = {
  // String type.
  valueType: 'String',
  init: function() {
    this.jsonInit({
      "message0": "String",
      "output": "Type",
      "colour": 230,
      "tooltip": "Strings (text) are allowed.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=602"
    });
  }
};

Blockly.Blocks['type_list'] = {
  // List type.
  valueType: 'Array',
  init: function() {
    this.jsonInit({
      "message0": "Array",
      "output": "Type",
      "colour": 230,
      "tooltip": "Arrays (lists) are allowed.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=602"
    });
  }
};

Blockly.Blocks['type_other'] = {
  // Other type.
  init: function() {
    this.jsonInit({
      "message0": "other %1",
      "args0": [{"type": "field_input", "name": "TYPE", "text":""}],
      "output": "Type",
      "colour": 230,
      "tooltip": "Custom type to allow.",
      "helpUrl": "https://www.youtube.com/watch?v=s2_xaEvcVI0#t=702"
    });
  }
};

Blockly.Blocks['colour_hue'] = {
  // Set the colour of the block.
  init: function() {

    this.appendDummyInput()
        .appendField('hue')
        .appendField(new Blockly.FieldAngle('0', this.validator), 'HUE');
    this.setOutput(true, 'Colour');
    this.setTooltip('Paint the block with this colour.');
    this.setHelpUrl('https://www.youtube.com/watch?v=s2_xaEvcVI0#t=55');

  },
  validator: function(text) {
    // Update the current block's colour to match.
    var hue = parseInt(text, 10);
    if (!isNaN(hue)) {
      this.sourceBlock_.setColour(hue);
    }
  },
  mutationToDom: function(workspace) {
    var container = document.createElement('mutation');
    container.setAttribute('colour', this.getColour());
    return container;
  },
  domToMutation: function(container) {
    console.log("412");
    this.setColour(container.getAttribute('colour'));
  }
};

/**
 * Check to see if more than one field has this name.
 * Highly inefficient (On^2), but n is small.
 * @param {!Blockly.Block} referenceBlock Block to check.
 */
function fieldNameCheck(referenceBlock) {
  if (!referenceBlock.workspace) {
    // Block has been deleted.
    return;
  }
  var name = referenceBlock.getFieldValue('FIELDNAME').toLowerCase();
  var count = 0;
  var blocks = referenceBlock.workspace.getAllBlocks();
  for (var i = 0, block; block = blocks[i]; i++) {
    var otherName = block.getFieldValue('FIELDNAME');
    if (!block.disabled && !block.getInheritedDisabled() &&
        otherName && otherName.toLowerCase() == name) {
      count++;
    }
  }
  var msg = (count > 1) ?
      'There are ' + count + ' field blocks\n with this name.' : null;
  referenceBlock.setWarningText(msg);
}

/**
 * Check to see if more than one input has this name.
 * Highly inefficient (On^2), but n is small.
 * @param {!Blockly.Block} referenceBlock Block to check.
 */
function inputNameCheck(referenceBlock) {
  if (!referenceBlock.workspace) {
    // Block has been deleted.
    return;
  }
  var name = referenceBlock.getFieldValue('INPUTNAME').toLowerCase();
  var count = 0;
  var blocks = referenceBlock.workspace.getAllBlocks();
  for (var i = 0, block; block = blocks[i]; i++) {
    var otherName = block.getFieldValue('INPUTNAME');
    if (!block.disabled && !block.getInheritedDisabled() &&
        otherName && otherName.toLowerCase() == name) {
      count++;
    }
  }
  var msg = (count > 1) ?
      'There are ' + count + ' input blocks\n with this name.' : null;
  referenceBlock.setWarningText(msg);
}
