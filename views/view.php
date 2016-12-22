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

<?php if (!$widget->array): ?>
    <?= Html::activeHiddenInput($widget->model, $widget->attribute); ?>
<?php endif; ?>

<script>
    $(function() {
        $('#<?= $widget->getId() ?>').on('click', '.btn-danger', function() {
            $(this).closest('.block').remove();
        });
        $('#<?= $widget->getId() ?> .btn-success').click(function() {
            $(this)
                .closest('#<?= $widget->getId() ?>')
                .find('.empty')
                .clone()
                .addClass('block')
                .removeClass('empty')
                .insertBefore('#<?= $widget->getId() ?> .add-block')
                .find('input:first-child').val($('#<?= $widget->getId() ?>').find('.block').length-1);
        });
        <?php if (!$widget->array): ?>
            function addslashes(string) {
                return string.replace(/"/g, '\\"');
            }
            $('#<?= $widget->getId() ?>').closest('form').submit(function() {
                var blocks = $(this).find('#<?= $widget->getId() ?> .block');
                var text = '';
                for (var i = 0; i<blocks.length; i++) {
                    var inputs = $(blocks[i]).find('input');
                    if ($(inputs[0]).val() == '') {
                        continue;
                    }
                    <?php if ($widget->unique): ?>
                        text += '"' + addslashes($(inputs[0]).val()) + '": "' + addslashes($(inputs[1]).val()) + '",';
                    <?php else: ?>
                        text += '{"key": "' + addslashes($(inputs[0]).val()) + '", "value": "' + addslashes($(inputs[1]).val()) + '"},';
                    <?php endif; ?>
                }

                <?php if ($widget->unique): ?>
                    text = (text == '' ? '{}' : "{" + text.substr(0, text.length-1) + '}');
                <?php else: ?>
                    text = (text == '' ? '[]' : "[" + text.substr(0, text.length-1) + ']');
                <?php endif; ?>

                $('#<?= BaseHtml::getInputId($widget->model, $widget->attribute) ?>').val(text);
            });
        <?php endif; ?>
    });
</script>
