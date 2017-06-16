/**
 * @license
 * Blockly Demos: Block Factory
 *
 * Copyright 2016 Google Inc.
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
 * @fileoverview Javascript for BlockLibraryView class. It manages the display
 * of the Block Library dropdown, save, and delete buttons.
 *
 * @author quachtina96 (Tina Quach)
 */

'use strict';

goog.provide('BlockLibraryView');

goog.require('goog.dom');
goog.require('goog.dom.classlist');
goog.require('FactoryUtils');

/**
 * BlockLibraryView Class
 * @constructor
 */
var BlockLibraryView = function() {
  // Div element to contain the block types to choose from.
  this.dropdown = document.getElementById('dropdownDiv_blockLib');

  // Map of block type to corresponding 'a' element that is the option in the
  // dropdown. Used to quickly and easily get a specific option.
  this.optionMap = Object.create(null);
  // Save and delete buttons.
  this.saveButton = document.getElementById('saveToBlockLibraryButton');
  this.deleteButton = document.getElementById('removeBlockFromLibraryButton');
  // Initially, user should not be able to delete a block. They must save a
  // block or select a stored block first.
  // this.deleteButton.disabled = true;

};

/**
 * Creates a node of a given element type and appends to the node with given ID.
 * @param {string} blockType Type of block.
 * @param {boolean} selected Whether or not the option should be selected on
 *    the dropdown.
 */

BlockLibraryView.prototype.addOption = function(blockType, selected,xml) {
  // Create option.
  console.log('여기');
  console.log(blockType);
  console.log(selected);
  //화면에 블럭을 추가 할때 실행되는
  if(xml){
      var option = goog.dom.createDom('button', {
        'id': 'dropdown_' + blockType,
        'class': 'content_list',
        'style': 'margin-left:8px;',
      }, blockType);

      // Add option to dropdown.
      this.dropdown.appendChild(option);

      //불러온 블럭에다가 xml 코드 불러옴!!
      var parentDiv       = document.getElementById('dropdown_'+blockType);
      var content_xml     = document.createElement("INPUT");
      content_xml.setAttribute("type","text");
      content_xml.setAttribute("class","contents_xml");
      content_xml.setAttribute("value",xml);
      content_xml.setAttribute("name",'contents_xml');
      content_xml.setAttribute("hidden",true);

      parentDiv.appendChild(content_xml);

      this.optionMap[blockType] = option;
      // var rootBlock = FactoryUtils.getRootBlock(BlockFactory.mainWorkspace);
      // var code      = FactoryUtils.formatJson_(blockType, rootBlock);
      // console.log(code);
      //불러온 블럭에다가 명세 불러옴!!
      // var myungse         = FactoryUtils.getBlockCode(blockType);
      // var block_myungse   = document.createElement("INPUT");
      // block_myungse.setAttribute("type","text");
      // block_myungse.setAttribute("class","block_myungse");
      // block_myungse.setAttribute("value",myungse);
      // parentDiv.appendChild(content_xml);
      // Select the block.
      if (selected) {
        this.setSelectedBlockType(blockType);
      }
    }else{
      var option = goog.dom.createDom('button', {
        'id': 'dropdown_' + blockType,
        'class': 'content_list',
        'style': 'margin-left:8px;',
      }, blockType);

      this.dropdown.appendChild(option);

      // this.dropdown.appendChild(content_xml);
      this.optionMap[blockType] = option;

      // Select the block.
      if (selected) {
        this.setSelectedBlockType(blockType);
      }
    }
};

/**
 * Sets a given block type to selected and all other blocks to deselected.
 * If null, deselects all blocks.
 * @param {string} blockTypeToSelect Type of block to select or null.
 */
BlockLibraryView.prototype.setSelectedBlockType = function(blockTypeToSelect) {
  // Select given block type and deselect all others. Will deselect all blocks
  // if null or invalid block type selected.
  for (var blockType in this.optionMap) {
    var option = this.optionMap[blockType];
    if (blockType == blockTypeToSelect) {
      this.selectOption_(option);
    } else {
      this.deselectOption_(option);
    }
  }
};

/**
 * Selects a given option.
 * @param {!Element} option HTML 'a' element in the dropdown that represents
 *    a particular block type.
 * @private
 */
BlockLibraryView.prototype.selectOption_ = function(option) {
  goog.dom.classlist.add(option, 'dropdown-content-selected');
};

/**
 * Deselects a given option.
 * @param {!Element} option HTML 'a' element in the dropdown that represents
 *    a particular block type.
 * @private
 */
BlockLibraryView.prototype.deselectOption_ = function(option) {
  goog.dom.classlist.remove(option, 'dropdown-content-selected');
};

/**
 * Updates the save and delete buttons to represent how the current block will
 * be saved by including the block type in the button text as well as indicating
 * whether the block is being saved or updated.
 * @param {string} blockType The type of block being edited.
 * @param {boolean} isInLibrary Whether the block type is in the library.
 * @param {boolean} savedChanges Whether changes to block have been saved.
 */
BlockLibraryView.prototype.updateButtons =
    function(blockType, isInLibrary, savedChanges) {
  if (blockType) {
    // User is editing a block.

    if (!isInLibrary) {
      // Block type has not been saved to library yet. Disable the delete button
      // and allow user to save.
      // this.saveButton.textContent = '저장 "' + blockType + '"';
      this.saveButton.textContent = '저장';
      this.saveButton.disabled = false;
      this.deleteButton.disabled = false;
      // this.updateButton.disabled = false;
    } else {
      // Block type has already been saved. Disable the save button unless the
      // there are unsaved changes (checked below).
      this.saveButton.textContent = '저장';
      this.saveButton.disabled = false;
      this.deleteButton.disabled = false;
      this.updateButton.disabled = false;
    }
    this.deleteButton.textContent = '삭제';

    // If changes to block have been made and are not saved, make button
    // green to encourage user to save the block.
    if (!savedChanges) {
      var buttonFormatClass = 'button_warn';

      // If block type is the default, 'block_type', make button red to alert
      // user.
      if (blockType == 'block_type') {
        buttonFormatClass = 'button_alert';
      }
      goog.dom.classlist.add(this.saveButton, buttonFormatClass);
      this.saveButton.disabled = false;

    } else {
      // No changes to save.
      var classesToRemove = ['button_alert', 'button_warn'];
      goog.dom.classlist.removeAll(this.saveButton, classesToRemove);
      this.saveButton.disabled = true;
    }

  }
};

/**
 * Removes option currently selected in dropdown from dropdown menu.
 */
BlockLibraryView.prototype.removeSelectedOption = function() {
  var selectedOption = this.getSelectedOption();
  this.dropdown.removeNode(selectedOption);
};

/**
 * Returns block type of selected block.
 * @return {string} Type of block selected.
 */
BlockLibraryView.prototype.getSelectedBlockType = function() {
  var selectedOption = this.getSelectedOption();
  var blockType = selectedOption.textContent;
  return blockType;
};

/**
 * Returns selected option.
 * @return {!Element} HTML 'a' element that is the option for a block type.
 */
BlockLibraryView.prototype.getSelectedOption = function() {
  return this.dropdown.getElementsByClassName('dropdown-content-selected')[0];
};

/**
 * Removes all options from dropdown.
 */
BlockLibraryView.prototype.clearOptions = function() {

  var blockOpts = this.dropdown.getElementsByClassName('blockLibOpt');
  var b = this.dropdown.getElementsByClassName('please');
  var option;
  while ((option = blockOpts[0])) {
    option.parentNode.removeChild(option);

  }
};