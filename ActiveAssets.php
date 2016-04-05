<?php

namespace keygenqt\autocompleteAjax;

use \yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 */
class ActiveAssets extends AssetBundle
{
	public $sourcePath = '@keygenqt/jsonForm/assets';

	public $js = [
		'js/yii2-json-form.js'
	];

	public $depends = [
		'yii\web\JqueryAsset'
	];

	public $css = [
		'css/yii2-json-form.css'
	];
}
