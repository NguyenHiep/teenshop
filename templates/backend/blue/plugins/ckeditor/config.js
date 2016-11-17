/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
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
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.extraPlugins = 'syntaxhighlight';
    config.syntaxhighlight_hideGutter = false;
    config.syntaxhighlight_hideControls = false;
    config.syntaxhighlight_collapse = false;
    //config.syntaxhighlight_codeTitle = '';
    config.syntaxhighlight_showColumns = false;
    config.syntaxhighlight_noWrap = false;
    config.syntaxhighlight_firstLine = 0; // default 0
    config.syntaxhighlight_highlight = 1;
     config.syntaxhighlight_lang = 'bash', 'shell', 'cpp', 'c', 'c#', 'c-sharp', 'csharp', 'css', 'delphi', 'pascal', 'pas', 'diff', 'java', 'jfx', 'javafx', 'js', 'jscript', 'javascript', 'pl', 'php', 'text', 'sass', 'scss', 'scala', 'sql', 'tap', 'Tap', 'TAP', 'ts', 'vb', 'vbnet', 'xml', 'xhtml', 'xslt', 'html'; // default null
    // config.syntaxhighlight_code = '<?php';
};