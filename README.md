yii2-json-form
===================

Json form edit for yii2

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-json-form": "*"
}
```

of your `composer.json` file.

## Latest Release

The latest version of the module is v0.5.0 `BETA`.

## Usage

View:

```php
<?= $form->field($model, 'json_text')->widget(JsonForm::classname()) ?>
```

## License

**yii2-json-form** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.


