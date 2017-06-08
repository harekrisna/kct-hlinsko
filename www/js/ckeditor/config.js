/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.height = 400;
	config.allowedContent = true;
	config.language = 'cs';
	config.filebrowserBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../../js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../../js/kcfinder/upload.php?opener=ckeditor&type=flash';

	// Define the toolbar: http://docs.ckeditor.com/#!/guide/dev_toolbar
	// The standard preset from CDN which we used as a base provides more features than we need.
	// Also by default it comes with a 2-line toolbar. Here we put all buttons in a single row.
	config.toolbar = [
		{ name: 'clipboard', items: ['Undo', 'Redo', 'Save' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'CopyFormatting', 'RemoveFormat', '-', 'TextColor', 'BGColor' ] },
		{ name: 'justify', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'HorizontalRule' ] },
		{ name: 'insert', items: [ 'Image', 'Table' ] },
		{ name: 'tools', items: [ 'Maximize' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font','FontSize'] },
		{ name: 'editing', items: [ 'Scayt' ] },
		{ name: 'source', items: [ 'ShowBlocks', 'Source' ] }
	];
	// Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
	// One HTTP request less will result in a faster startup time.
	// For more information check http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-customConfig

	// Enabling extra plugins, available in the standard-all preset: http://ckeditor.com/presets-all
	/*********************** File management support ***********************/
	// In order to turn on support for file uploads, CKEditor has to be configured to use some server side
	// solution with file upload/management capabilities, like for example CKFinder.
	// For more information see http://docs.ckeditor.com/#!/guide/dev_ckfinder_integration
	// Uncomment and correct these lines after you setup your local CKFinder instance.
	// filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
	// filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	/*********************** File management support ***********************/
	// Remove the default image plugin because image2, which offers captions for images, was enabled above.
	// Make the editing area bigger than default.
	config.height = 650;
	config.width = '100%';
	config.extraPlugins = 'codemirror';
	// An array of stylesheets to style the WYSIWYG area.
	// Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
	config.contentsCss = [ 'https://cdn.ckeditor.com/4.6.1/standard-all/contents.css'];
};
