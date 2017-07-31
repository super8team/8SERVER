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
 * @fileoverview Contains the code for Block Library Controller, which
 * depends on Block Library Storage and Block Library UI. Provides the
 * interfaces for the user to
 *  - save their blocks to the browser
 *  - re-open and edit saved blocks
 *  - delete blocks
 *  - clear their block library
 * Depends on BlockFactory functions defined in factory.js.
 *
 * @author quachtina96 (Tina Quach)
 */
'use strict';

goog.provide('BlockLibraryController');

goog.require('BlockLibraryStorage');
goog.require('BlockLibraryView');
goog.require('BlockFactory');


/**
 * Block Library Controller Class
 * @param {string} blockLibraryName Desired name of Block Library, also used
 *    to create the key for where it's stored in local storage.
 * @param {!BlockLibraryStorage} opt_blockLibraryStorage Optional storage
 *    object that allows user to import a block library.
 * @constructor
 */
BlockLibraryController = function(blockLibraryName, opt_blockLibraryStorage) {
  this.name = blockLibraryName;
  // Create a new, empty Block Library Storage object, or load existing one.
  this.storage = opt_blockLibraryStorage || new BlockLibraryStorage(this.name);
  // The BlockLibraryView object handles the proper updating and formatting of
  // the block library dropdown.
  this.view = new BlockLibraryView();
  this.packageName = document.getElementById('packageDiv');
  // this.primaryPackagenum = 1;

  this.packageBasket = new Array();
  this.packageNumber = 0;
  this.packageArrayKey = 0;
  this.current_xml;
  // this.test();
};

/**
 * Returns the block type of the block the user is building.
 * @return {string} The current block's type.
 * @private
 */
 var contents_name;
BlockLibraryController.prototype.getCurrentBlockType = function() {
  var rootBlock = FactoryUtils.getRootBlock(BlockFactory.mainWorkspace);
  var blockType = rootBlock.getFieldValue('NAME').trim().toLowerCase();
  contents_name = blockType;
  console.log('커런트타입');
  console.log(blockType);
  // Replace invalid characters.
  return FactoryUtils.cleanBlockType(blockType);
};
BlockLibraryController.prototype.getCurrentBlockName = function() {
  return contents_name;
};
/**
 * Removes current block from Block Library and updates the save and delete
 * buttons so that user may save block to library and but not delete.
 * @param {string} blockType Type of block.
 */
BlockLibraryController.prototype.removeFromBlockLibrary = function() {
  var blockType = this.getCurrentBlockType();
  console.log(blockType);
  var parent        =  document.getElementById('dropdownDiv_blockLib');
  var child_node    =  document.getElementById('dropdownDiv_blockLib').childNodes;
  var del;
  for(var i = 0 ; i<child_node.length ; i++){
      console.log(child_node[i]);
      if(child_node[i].textContent == blockType){
        console.log(child_node[i]);
        sessionStorage.removeItem(blockType);
        this.storage.removeBlock(child_node[i],blockType);
      }
  }

  console.log('삭제!!');
  // this.storage.removeBlock(blockType);
  this.storage.saveToLocalStorage();
  this.view.updateButtons(blockType, false, false);
  window.href='/block1';
};

/**
 * Updates the workspace to show the block user selected from library
 * @param {string} blockType Block to edit on block factory.
 */
 BlockLibraryController.prototype.openBlock2 = function(xml) {
   console.log(xml);
   console.log('여기176');
   var xmlDoc = $.parseXML(xml);
   var mainXml = xmlDoc.firstChild;
   var xmlText         = new XMLSerializer().serializeToString(mainXml);
   this.current_xml         = xmlText;
   var content_xml     = document.createElement("INPUT");
   content_xml.setAttribute("type","text");
   content_xml.setAttribute("class","contents_xml");
   content_xml.setAttribute("value",xmlText);
   content_xml.setAttribute("hidden",true);

   var parentDiv       = document.getElementById('packageList');
   parentDiv.appendChild(content_xml);

   BlockFactory.mainWorkspace.clear();
   Blockly.Xml.domToWorkspace(mainXml, BlockFactory.mainWorkspace)
   BlockFactory.mainWorkspace.clearUndo();
  //  FactoryUtils.getBlockCode();
 }
BlockLibraryController.prototype.clickBlock = function(blockType) {
  if (blockType) {
    console.log(blockType);
    var xml = this.storage.getBlockXml(blockType);      // xml - object
    console.log(xml);
    var xmlText         = new XMLSerializer().serializeToString(xml);
    // content_xml.setAttribute("hidden",true);

    //string -> object 로 변환하는 과정  // mainworkspace에는 xml이 객체 형태로 들어가야 됨!!!
    xmlText = $.parseXML(xmlText);
    xmlText = xmlText.firstChild;
    BlockFactory.mainWorkspace.clear();
    Blockly.Xml.domToWorkspace(xmlText, BlockFactory.mainWorkspace);
    BlockFactory.mainWorkspace.clearUndo();
  }
}

BlockLibraryController.prototype.openBlock = function(blockType) {
  if (blockType) {
    console.log(blockType);
    var xml = this.storage.getBlockXml(blockType);      // xml - object
    console.log(xml);
    console.log('여기open');
    // var xmlText = new XMLSerializer().serializeToString(xml);
    // var xmlTextNode = document.createTextNode(xmlText);
    // var parentDiv = document.getElementById('xmlinfor');
    // console.log(typeof(xmlTextNode));
    // parentDiv.appendChild(xmlTextNode);

    //현재 콘텐츠의 xml명세를 dom input 추가하는 코드
    var xmlText         = new XMLSerializer().serializeToString(xml);
    var content_xml     = document.createElement("INPUT");
    content_xml.setAttribute("type","text");
    content_xml.setAttribute("class","contents_xml");
    content_xml.setAttribute("value",xmlText);
    content_xml.setAttribute("name","contents_xml");
    content_xml.setAttribute("hidden",true);

    var parentDiv       = document.getElementById('dropdown_'+blockType);
    // var parentDiv       = document.getElementById('dropdownDiv_blockLib');
    console.log(parentDiv);
    parentDiv.appendChild(content_xml);
    console.log(content_xml);
    console.log(typeof(xmlText));

    //string -> object 로 변환하는 과정  // mainworkspace에는 xml이 객체 형태로 들어가야 됨!!!
    xmlText = $.parseXML(xmlText);
    xmlText = xmlText.firstChild;
    console.log(xmlText);

    console.log('여기');

    console.log(typeof(xml));
    console.log(typeof(xmlText));

    // var xmltest2 = String(xmlTextNode);
    // console.log(xmltest2);
    // console.log(typeof(xmltest2));
    // document.getElementById('xmlinfor').value = this.storage.getBlockXml(blockType);

    // var xml3 =
    // '<xml xmlns="http://www.w3.org/1999/xhtml">'+
    // '<block type="factory_base" id="jsJbcVlNT:#E9,M-7V(1" deletable="false" movable="false" x="0" y="0">'+
    // '<mutation connections="null"></mutation>'+
    // '<field name="NAME">fef</field>'+
    // '<value name="VERTICAL">'+
    //   '<block type="vertical" id="5VQix4TOuX6BV_lv^#;r" deletable="false">'+
    //     '<field name="VERTICAL"></field>'+
    //   '</block>'+
    // '</value>'+
    // '<value name="HORIZONTAL">'+
    //   '<block type="horizontal" id="C)e#DB8cz`+Bo-9o4~0[" deletable="false">'+
    //     '<field name="HORIZONTAL"></field>'+
    //   '</block>'+
    // '</value>'+
    // '<value name="VISIONABLE">'+
    //   '<block type="logic_boolean" id="e@4|/*}pCo~#aYE8Fr15" deletable="false">'+
    //     '<field name="BOOL">TRUE</field>'+
    //   '</block>'+
    // '</value>'+
    // '<value name="CLICKABLE">'+
    //   '<block type="logic_boolean" id="d[._igq{x2w7zubn4[Af" deletable="false">'+
    //     '<field name="BOOL">FALSE</field>'+
    //   '</block>'+
    // '</value>'+
    // '<value name="DISABLE">'+
    //   '<block type="logic_boolean" id="nDYlY2Z{v$2K|XI`c5T^">'+
    //     '<field name="BOOL">TRUE</field>'+
    //   '</block>'+
    // '</value>'+
    // '</block>'+
    // '</xml>';
    // var xmlDoc = $.parseXML(xml3);
    // console.log(typeof(xmlDoc));
    // var mainXml = xmlDoc.firstChild;
    // console.log(typeof(mainXml));

    BlockFactory.mainWorkspace.clear();
    Blockly.Xml.domToWorkspace(xmlText, BlockFactory.mainWorkspace);
    BlockFactory.mainWorkspace.clearUndo();
    FactoryUtils.getBlockCode(blockType);
  } else {
    BlockFactory.showStarterBlock();
    this.view.setSelectedBlockType(null);
  }
};

/**
 * Returns type of block selected from library.
 * @return {string} Type of block selected.
 */
BlockLibraryController.prototype.getSelectedBlockType = function() {
  return this.view.getSelectedBlockType();
};

/**
 * Confirms with user before clearing the block library in local storage and
 * updating the dropdown and displaying the starter block (factory_base).
 */
BlockLibraryController.prototype.clearBlockLibrary = function() {
  var check = confirm('Delete all blocks from library?');
  if (check) {
    // Clear Block Library Storage.
    this.storage.clear();
    this.storage.saveToLocalStorage();
    // Update dropdown.
    this.view.clearOptions();
    // Show default block.
    BlockFactory.showStarterBlock();
    // User may not save the starter block, but will get explicit instructions
    // upon clicking the red save button.
    this.view.updateButtons(null);
  }
};

/**
 * Saves current block to local storage and updates dropdown.
 */
BlockLibraryController.prototype.makeNewPackage = function() {

  if(this.packageBasket.length<5){
    var packageName = prompt("패키지 이름을 입력하여 주세요");
    if(!packageName)
    {
      return;
    }

    // input으로 넣기
    // document.getElementById('packageDiv').innerHTML = packageName;
    // this.packageName = packageName;

    packageName = packageName

    var packageObject = goog.dom.createDom('button', {
      'type': 'button',
      'class':'package_button',
      'display': 'block'
      // disabled: 'false'
    },packageName);

    // var packageObject = goog.dom.createDom('input', {
    //   'id':this.primaryPackagenum,
    //   'class':'package7',
    //   'type':'submit',
    //   'value':packageName,
    //   'display': 'block'
    //   // disabled: 'false'
    // });

    this.packageName.appendChild(packageObject);
    this.packageBasket[this.packageArrayKey] = packageObject;
    console.log(this.packageBasket[0].id);
    console.log(this.packageBasket);
    // this.primaryPackagenum++;
    this.packageArrayKey++;
    return ;
  }else{
    alert('패키지는 5개이하로만 가능합니다');
    return;
  }
}


BlockLibraryController.prototype.saveToBlockLibrary = function() {
  var blockType = this.getCurrentBlockType();
  blockType = this.getCurrentBlockName();
  console.log('콘이름');
  console.log(blockType);
  // If user has not changed the name of the starter block.
  // if(this.packageBasket.length === 0) {
  //   alert("패키지를 생성 한 후 콘텐츠를 생성해 주세요");
  //   return;
  // }else if (blockType == 'block_type') {
  //   alert('다른 이름으로 입력 해주세요');
  //   return;
  // }
  // Create block XML.
  var xmlElement = goog.dom.createDom('xml');
  var block      = FactoryUtils.getRootBlock(BlockFactory.mainWorkspace);
  xmlElement.appendChild(Blockly.Xml.blockToDomWithXY(block));

  // Do not add option again if block type is already in library.
  if (!this.has(blockType)) {
    console.log('call addoption');
    this.view.addOption(blockType, true, false);
  }

  // Save block.
  this.storage.addBlock(blockType, xmlElement);
  this.storage.saveToLocalStorage();

  // Show saved block without other stray blocks sitting in Block Factory's
  // main workspace.
  console.log('call openblock');
  this.openBlock(blockType);

  // Add select handler to the new option.
  this.addOptionSelectHandler(blockType);
};

/**
 * Checks to see if the given blockType is already in Block Library
 * @param {string} blockType Type of block.
 * @return {boolean} Boolean indicating whether or not block is in the library.
 */
BlockLibraryController.prototype.has = function(blockType) {
  var blockLibrary = this.storage.blocks;
  return (blockType in blockLibrary && blockLibrary[blockType] != null);
};

/**
 * Populates the dropdown menu.
 */
BlockLibraryController.prototype.populateBlockLibrary = function() {
  this.view.clearOptions();
  // Add an unselected option for each saved block.
  var blockLibrary = this.storage.blocks;
  console.log(blockLibrary);
  for (var blockType in blockLibrary) {

    console.log(blockLibrary[blockType]);
    console.log(typeof(blockLibrary[blockType]));
    this.view.addOption(blockType, false,blockLibrary[blockType]);
    var parent   = document.getElementById('dropdown_'+blockType);
    var myungse  = document.createElement("INPUT");
    myungse.setAttribute("type","text");
    myungse.setAttribute("class","block_myungse");
    //명세
    myungse.setAttribute("value",sessionStorage.getItem(blockType));
    myungse.setAttribute("name",'block_myungse');
    myungse.setAttribute("hidden",true);
    parent.appendChild(myungse);

    console.log('세션');
    // sessionStorage.setItem(blockType, this.block_code);
    console.log(sessionStorage.getItem(blockType));
    // var rootBlock = FactoryUtils.getRootBlock(BlockFactory.mainWorkspace);
    // var code      = FactoryUtils.formatJson_(blockType, rootBlock);
    // console.log(code);
  }

  console.log("call addOptionSelectHandlers");
  this.addOptionSelectHandlers();
};

/**
 * Return block library mapping block type to XML.
 * @return {Object} Object mapping block type to XML text.
 */
BlockLibraryController.prototype.getBlockLibrary = function() {
  return this.storage.getBlockXmlTextMap();
};

/**
 * Return stored XML of a given block type.
 * @param {string} blockType The type of block.
 * @return {!Element} XML element of a given block type or null.
 */
BlockLibraryController.prototype.getBlockXml = function(blockType) {
  return this.storage.getBlockXml(blockType);
};

/**
 * Set the block library storage object from which exporter exports.
 * @param {!BlockLibraryStorage} blockLibStorage Block Library Storage object.
 */
BlockLibraryController.prototype.setBlockLibraryStorage
    = function(blockLibStorage) {
  this.storage = blockLibStorage;
  console.log("this.storage"+this.storage);
};

/**
 * Get the block library storage object from which exporter exports.
 * @return {!BlockLibraryStorage} blockLibStorage Block Library Storage object
 *    that stores the blocks.
 */
BlockLibraryController.prototype.getBlockLibraryStorage = function() {
  return this.blockLibStorage;
};

/**
 * Get the block library storage object from which exporter exports.
 * @return {boolean} True if the Block Library is empty, false otherwise.
 */
BlockLibraryController.prototype.hasEmptyBlockLibrary = function() {
  return this.storage.isEmpty();
};

/**
 * Get all block types stored in block library.
 * @return {!Array.<string>} Array of block types.
 */
BlockLibraryController.prototype.getStoredBlockTypes = function() {
  return this.storage.getBlockTypes();
};

/**
 * Sets the currently selected block option to none.
 */
BlockLibraryController.prototype.setNoneSelected = function() {
  this.view.setSelectedBlockType(null);
};

/**
 * If there are unsaved changes to the block in open in Block Factory
 * and the block is not the starter block, check if user wants to proceed,
 * knowing that it will cause them to lose their changes.
 * @return {boolean} Whether or not to proceed.
 */
 BlockLibraryController.prototype.viewContent = function(value) {
   // Assign a click handler to each block option.
  //  var proceedWithUnsavedChanges = this.warnIfUnsavedChanges();
  //  if (!proceedWithUnsavedChanges) {
  //    return;
  //  }
   this.setSelectedAndOpen_(value);

 };
 BlockLibraryController.prototype.viewContent_2 = function(value,obj) {
   // Assign a click handler to each block option.
  //  var proceedWithUnsavedChanges = this.warnIfUnsavedChanges();
  //  if (!proceedWithUnsavedChanges) {
  //    return;
  //  }
  console.log('테스트');
  console.log(value);
  console.log(obj);
   this.setSelectedAndOpen_2(value,obj);

 };
BlockLibraryController.prototype.warnIfUnsavedChanges = function() {
  if (!FactoryUtils.savedBlockChanges(this)) {
    return confirm('정말로 바꾸시겠어요?');
  }
  return true;
};

/**
 * Add select handler for an option of a given block type. The handler will to
 * update the view and the selected block accordingly.
 * @param {string} blockType The type of block represented by the option is for.
 */
BlockLibraryController.prototype.addOptionSelectHandler = function(blockType) {
  var self = this;

  // Click handler for a block option. Sets the block option as the selected
  // option and opens the block for edit in Block Factory.
  var setSelectedAndOpen_ = function(blockOption) {
    var blockType = blockOption.textContent;
    self.view.setSelectedBlockType(blockType);
    console.log("setSelectedAndOpen_");
    self.clickBlock(blockType);
    // The block is saved in the block library and all changes have been saved
    // when the user opens a block from the block library dropdown.
    // Thus, the buttons show up as a disabled update button and an enabled
    // delete.
    console.log("setSelectedAndOpen_ AFTER");
    console.log(blockType);
    self.view.updateButtons(blockType, true, true);
    blocklyFactory.closeModal();
  };


  // Returns a block option select handler.
    // var viewContent_ = function(value) {
    //   return function() {
    //     // If there are unsaved changes warn user, check if they'd like to
    //     // proceed with unsaved changes, and act accordingly.
    //     var proceedWithUnsavedChanges = self.warnIfUnsavedChanges();
    //     if (!proceedWithUnsavedChanges) {
    //       return;
    //     }
    //     // var value = document.getElementById('content').value;
    //     self.openBlock2(value);
    //   };
    // };

  var makeOptionSelectHandler_ = function(blockOption) {
    return function() {
      // If there are unsaved changes warn user, check if they'd like to
      // proceed with unsaved changes, and act accordingly.
      // var proceedWithUnsavedChanges = self.warnIfUnsavedChanges();
      // if (!proceedWithUnsavedChanges) {
      //   return;
      // }
      setSelectedAndOpen_(blockOption);
    };
  };

  // Assign a click handler to the block option.
  var blockOption = this.view.optionMap[blockType];
  console.log(this.view.optionMap);
  console.log(blockOption);
  // Use an additional closure to correctly assign the tab callback.

   // viewContent_(blockType));
  // document.getElementById('dropdownDiv_blockLib').addEventListener('click',
  //   function(e){
  //       var click_content = e.target.getAttribute('id');
  //       console.log(click_content);
  //       console.log(e.target);
  //       // var click_content_sibling = document.getElementById(click_content).nextSibling.nextSibling;
  //       // var xmlValue = click_content_sibling.value;
  //       var xmlValue = e.target.value;
  //       var xmlDoc = $.parseXML(xmlValue);
  //       var mainXml = xmlDoc.firstChild;
  //       console.log(typeof(mainXml));
  //       // var xmlDoc = $.parseXML(xmlValue);
  //       // var mainXml = xmlDoc.firstChild;
  //       self.openBlock2(mainXml);
  //   }
  // );

  // document.getElementById('content').addEventListener('click',function(){
  //   alert("gg");
  // });

  blockOption.addEventListener(
      'click', makeOptionSelectHandler_(blockOption));
};

/**
 * Add select handlers to each option to update the view and the selected
 * blocks accordingly.
 */
 BlockLibraryController.prototype.setSelectedAndOpen_ = function(blockType) {
  //  var blockType = blockOption.textContent;
   this.view.setSelectedBlockType(blockType);
   console.log("setSelectedAndOpen_");
   this.clickBlock(blockType);
   // The block is saved in the block library and all changes have been saved
   // when the user opens a block from the block library dropdown.
   // Thus, the buttons show up as a disabled update button and an enabled
   // delete.
   console.log("setSelectedAndOpen_ AFTER");
   console.log(blockType);
   this.view.updateButtons(blockType, true, true);
   blocklyFactory.closeModal();
 };
BlockLibraryController.prototype.setSelectedAndOpen_2 = function(blockOption,value) {
  var blockType = value.textContent;
  console.log(blockType);
  this.view.setSelectedBlockType(blockType);
  this.openBlock2(blockOption);
  this.view.updateButtons(blockType,true,true);
  blocklyFactory.closeModal();
}
BlockLibraryController.prototype.addOptionSelectHandlers = function() {
  // Assign a click handler to each block option.
  for (var blockType in this.view.optionMap) {
    console.log(blockType);
    this.addOptionSelectHandler(blockType);
  }
};

/**
 * Update the save and delete buttons based on the current block type of the
 * block the user is currently editing.
 * @param {boolean} Whether changes to the block have been saved.
 */
BlockLibraryController.prototype.updateButtons = function(savedChanges) {
  var blockType = this.getCurrentBlockType();
  var isInLibrary = this.has(blockType);
  this.view.updateButtons(blockType, isInLibrary, savedChanges);
};
