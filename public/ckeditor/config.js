/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles'},
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
	];
	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Strike,Subscript,Superscript';
	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
	config.height = 500; //高度
	
	//config.protectedSource.push( /<\?php[\s\S]*?\?>/g ); // PHP code
	
	config.extraPlugins = 'panel,listblock,button,floatpanel,richcombo,format,autosave,simage';
	config.format_tags = 'h1;h2;h3;h4;p';
	//config.imageUploadURL = "/home/resizeimage";
	config.dataParser=function(data){
	 	if (data){
	 		return data.url
	 	}
	}
	config.allowedContent=true;//关闭标签过滤，
	config.autosave = { 
		// Auto save Key - The Default autosavekey can be overridden from the config ...
		Savekey : 'autosave_' + window.location + "_" + $('#' + editor.name).attr('name'),

		// Ignore Content older then X
		//The Default Minutes (Default is 1440 which is one day) after the auto saved content is ignored can be overidden from the config ...
		NotOlderThen : 1440,

		// Save Content on Destroy - Setting to Save content on editor destroy (Default is false) ...
		saveOnDestroy : false,

		// Setting to set the Save button to inform the plugin when the content is saved by the user and doesn't need to be stored temporary ...
		saveDetectionSelectors : "a[href^='javascript:__doPostBack'][id*='Save'],a[id*='Cancel']",

		// Notification Type - Setting to set the if you want to show the "Auto Saved" message, and if yes you can show as Notification or as Message in the Status bar (Default is "notification")
		messageType : "notification",

		// Show in the Status Bar
		//messageType : "statusbar",

		// Show no Message
		//messageType : "no",

		// Delay
		delay : 30,

		// The Default Diff Type for the Compare Dialog, you can choose between "sideBySide" or "inline". Default is "sideBySide"
		diffType : "sideBySide",

		// autoLoad when enabled it directly loads the saved content
		autoLoad: false
	};
};
