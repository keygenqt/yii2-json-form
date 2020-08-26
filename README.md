[Json Form](https://keygenqt.com/work/yii2-json-form)
===================

![GitHub](https://img.shields.io/github/license/keygenqt/yii2-json-form)
![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-json-form)

Modification json object in form

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-json-form": "*"
}
```

of your `composer.json` file.

## Usage

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