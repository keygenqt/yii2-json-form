<?php

namespace keygenqt\jsonForm;

use \yii\base\Widget;

class JsonForm extends Widget
{
    public $model;
    public $attribute;

    public function run()
    {
        FontAwesomeAsset::register($this->getView());
        ActiveAssets::register($this->getView());

        return  $this->getView()->render('@keygenqt/jsonForm/views/view', ['widget' => $this]);
    }
}


