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
};
