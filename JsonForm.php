<?php

namespace keygenqt\jsonForm;

use \yii\base\Widget;
use yii\helpers\Json;

class JsonForm extends Widget
{
    public $model;
    public $attribute;
    public $array = false;

    public $placeholder = [
        'key' => '',
        'value' => '',
    ];

    public function run()
    {
        FontAwesomeAsset::register($this->getView());
        ActiveAssets::register($this->getView());

        return  $this->getView()->render('@keygenqt/jsonForm/views/view', ['widget' => $this]);
    }

    public static function parseArrayToJson($array)
    {
        $result = [];
        if (isset($array['key'])) {
            foreach ($array['key'] as $key => $item) {
                if (!$item) {
                    continue;
                }
                if (!empty($result[$item])) {
                    return false;
                }
                $result[$item] = $array['value'][$key];
            }
            ksort($result);
        }
        return Json::encode($result);
    }
}


