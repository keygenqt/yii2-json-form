<?php
/* @var $widget keygenqt\jsonForm\JsonForm */

use \yii\helpers\Html;
use \yii\helpers\BaseHtml;

try {
    $values = \yii\helpers\Json::decode($widget->model->{$widget->attribute});
} catch (\yii\base\InvalidParamException $ex) {
    $values = [];
}
if (empty($values)) {
    $values = [];
}

?>

<div id="<?= $widget->getId() ?>" class="yii2-json-form">

    <div class="empty">
        <?= Html::input('text', BaseHtml::getInputName($widget->model, $widget->attribute) . '[key][]', '', [
            'class' => 'form-control',
            'placeholder' => $widget->placeholder['key']
        ]) ?>
        <div class="spinner"></div>
        <?= Html::input('text', BaseHtml::getInputName($widget->model, $widget->attribute) . '[value][]', '', [
            'class' => 'form-control',
            'placeholder' => $widget->placeholder['value']
        ]) ?>
        <div class="spinner"></div>
        <div class="btn btn-danger"><i class="fa fa-minus-square"></i></div>
    </div>

    <?php foreach ($values as $key => $value): ?>

        <div class="block">
            <?= Html::input('text', BaseHtml::getInputName($widget->model, $widget->attribute) . '[key][]', empty($value['key']) ? $key : $value['key'], [
                'class' => 'form-control',
                'placeholder' => $widget->placeholder['key']
            ]) ?>
            <div class="spinner"></div>
            <?= Html::input('text', BaseHtml::getInputName($widget->model, $widget->attribute) . '[value][]', empty($value['value']) ? $value : $value['value'], [
                'class' => 'form-control',
                'placeholder' => $widget->placeholder['value']
            ]) ?>
            <div class="spinner"></div>
            <div class="btn btn-danger"><i class="fa fa-minus-square"></i></div>
        </div>
    <?php endforeach; ?>

    <div class="add-block">
        <div class="btn btn-success"><i class="fa fa-plus-square"></i></div>
    </div>

</div>

<?= Html::activeHiddenInput($widget->model, $widget->attribute); ?>

<script>
    $(function () {
        $('#<?= $widget->getId() ?>').on('click', '.btn-danger', function () {
            $(this).closest('.block').remove();
        });
        $('#<?= $widget->getId() ?> .btn-success').click(function () {
            $(this).closest('.form-group').removeClass('has-error')

            $(this)
                .closest('#<?= $widget->getId() ?>')
                .find('.empty')
                .clone()
                .addClass('block')
                .removeClass('empty')
                .insertBefore('#<?= $widget->getId() ?> .add-block')
                <?php if ($widget->autoincrement): ?>
                .find('input:first-child').val($('#<?= $widget->getId() ?>').find('.block').length - 1);
                <?php endif; ?>
        });

        function addslashes(string) {
            return string.replace(/"/g, '\\"');
        }

        $('#<?= $widget->getId() ?>').closest('form').submit(function () {
            var blocks = $(this).find('#<?= $widget->getId() ?> .block');
            var text = '';
            for (var i = 0; i < blocks.length; i++) {
                var inputs = $(blocks[i]).find('input');
                if ($(inputs[0]).val() == '') {
                    continue;
                }
                text += '"' + addslashes($(inputs[0]).val()) + '": "' + addslashes($(inputs[1]).val()) + '",';
            }
            text = (text == '' ? '' : "{" + text.substr(0, text.length - 1) + '}');

            if (text != '') {
                var count = 0;
                var obj = JSON.parse(text);
                for (var key in obj) {
                    count++;
                }
                if (count != blocks.length) {
                    $('#<?= BaseHtml::getInputId($widget->model, $widget->attribute) ?>').closest('.form-group').addClass('has-error-json')
                    return false;
                } else {
                    $('#<?= BaseHtml::getInputId($widget->model, $widget->attribute) ?>').closest('.form-group').removeClass('has-error-json')
                }
                $('#<?= BaseHtml::getInputId($widget->model, $widget->attribute) ?>').val(JSON.stringify(obj));
            }

        });
    });
</script>
