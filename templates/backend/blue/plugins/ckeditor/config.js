/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
     var url = "/templates/backend/blue/plugins/";
    config.filebrowserBrowseUrl = url + 'ckfinder/ckfinder.html';
     
    config.filebrowserImageBrowseUrl = url + 'ckfinder/ckfinder.html?type=Images';
     
    config.filebrowserFlashBrowseUrl = url + 'ckfinder/ckfinder.html?type=Flash';
     
    config.filebrowserUploadUrl = url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
     
    config.filebrowserImageUploadUrl = url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
     
    config.filebrowserFlashUploadUrl = url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		//{ name: 'about' }
	];
    
	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;h4;h5;pre';

	// Simplify the dialog windows.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
	config.extraPlugins = 'syntaxhighlight';
    config.extraPlugins = 'eqneditor';
    //config.extraPlugins = 'watermark';
    config.syntaxhighlight_hideGutter = false;
    config.syntaxhighlight_hideControls = false;
    config.syntaxhighlight_collapse = false;
    //config.syntaxhighlight_codeTitle = '';
    config.syntaxhighlight_showColumns = false;
    config.syntaxhighlight_noWrap = false;
    config.syntaxhighlight_firstLine = 0; // default 0
    config.syntaxhighlight_highlight = 1;
    config.syntaxhighlight_lang = 'cpp', 'shell', 'php', 'c', 'c#', 'c-sharp', 'csharp', 'css',  'pascal', 'pas',  'java', 'jfx', 'javafx', 'js', 'jscript', 'javascript', 'pl', 'text', 'sass', 'scss', 'scala', 'sql','ts', 'vb', 'vbnet', 'xml', 'xhtml', 'xslt', 'html'; // default null
    // config.syntaxhighlight_code = '<?php';
};