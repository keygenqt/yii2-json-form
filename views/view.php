<?php
    /* @var $widget keygenqt\jsonForm\JsonForm */

    use \yii\helpers\Html;

    $values = \yii\helpers\Json::decode($widget->model->{$widget->attribute});
    if (empty($values)) {
        $values = [];
    }
?>

<div id="<?= $widget->getId() ?>" class="yii2-json-form">

    <div class="empty">
        <?= Html::input('text', preg_replace('/.+\\\(.+)/ui', '$1', get_class($widget->model)). "[{$widget->attribute}]" . '[key][]', '', [
            'class' => 'form-control'
        ]) ?>
        <div class="spinner"></div>
        <?= Html::input('text', preg_replace('/.+\\\(.+)/ui', '$1', get_class($widget->model)). "[{$widget->attribute}]" . '[value][]', '', [
            'class' => 'form-control'
        ]) ?>
        <div class="spinner"></div>
        <div class="btn btn-danger"><i class="fa fa-minus-square"></i></div>
    </div>

    <?php foreach ($values as $key => $value): ?>

        <div class="block">
                <?= Html::input('text', preg_replace('/.+\\\(.+)/ui', '$1', get_class($widget->model)). "[{$widget->attribute}]" . '[key][]', $key, [
                    'class' => 'form-control'
                ]) ?>
                <div class="spinner"></div>
            <?= Html::input('text', preg_replace('/.+\\\(.+)/ui', '$1', get_class($widget->model)). "[{$widget->attribute}]" . '[value][]', $value, [
                'class' => 'form-control'
            ]) ?>

            <div class="spinner"></div>
            <div class="btn btn-danger"><i class="fa fa-minus-square"></i></div>
        </div>
    <?php endforeach; ?>

    <div class="add-block">
        <div class="btn btn-success"><i class="fa fa-plus-square"></i></div>
    </div>

    <?= Html::activeHiddenInput($widget->model, $widget->attribute) ?>

</div>
