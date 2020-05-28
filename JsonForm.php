<?php
/*
 * Copyright 2020 Vitaliy Zarubin
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace keygenqt\jsonForm;

use \yii\base\Widget;
use yii\helpers\Json;

class JsonForm extends Widget
{
    public $model;
    public $attribute;
    public $array = false;
    public $unique = true;

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


