Json Form
===================

![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-json-form?label=Packagist%20Downloads)

A form that allows you to edit json in the `key` -> `value` format.

<p>
    <a href="https://old.keygenqt.com/work/yii2-json-form">
        <img src="data/demo_button.gif" width="136px"/>
    </a>
</p>

#### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
"require": {
    "keygenqt/yii2-json-form": "*"
}
```

#### Usage

View:

```php
<?= $form->field($model, 'json')->widget(JsonForm::class, [
    'order' => false,
    'autoincrement' => true,
    'placeholder' => [
        'key' => 'Object key',
        'value' => 'Object value (optional)',
    ],
]) ?>
```

#### License

```
Copyright 2016-2024 Vitaliy Zarubin

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
