<?php

namespace keygenqt\jsonForm;

use \yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 */
class ActiveAssets extends AssetBundle
{
	public $sourcePath = '@keygenqt/jsonForm/assets';

	public $depends = [
		'yii\web\JqueryAsset'
	];

	public $css = [
		'css/yii2-json-form.css'
	];
}
