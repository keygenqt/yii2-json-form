$(function() {
    $('.yii2-json-form').on('click', '.btn-danger', function() {
        $(this).closest('.block').remove();
    });
    $('.yii2-json-form .btn-success').click(function() {
        $(this)
            .closest('.yii2-json-form')
            .find('.empty')
            .clone()
            .addClass('block')
            .removeClass('empty')
            .insertBefore('.yii2-json-form .add-block');
    });
    $('.yii2-json-form').closest('form').submit(function() {
        var blocks = $(this).find('.yii2-json-form .block');
        var data = {};
        for (var i = 0; i<blocks.size(); i++) {
            var inputs = $(blocks[i]).find('input');
            data[$(inputs[0]).val()] = $(inputs[1]).val();
        }
        if (Object.keys(data).length === 0) {
            $('#<?= \yii\helpers\BaseHtml::getInputId($widget->model, $widget->attribute) ?>').val('');
        } else {
            $('#<?= \yii\helpers\BaseHtml::getInputId($widget->model, $widget->attribute) ?>').val(JSON.stringify(data));
        }
    });
});