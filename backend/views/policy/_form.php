<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\bootstrap\Modal;
use yii\bootstrap\widget;

/* @var $this yii\web\View */
/* @var $model common\models\Policy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policy-form">

    <?php $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
    ]); ?>

    <?= $form->field($model, 'type_id')->dropdownList([
        1 => 'item1',
        2 => 'item2'
    ],['prompt' => '请选择政策类型']) ?>

    <?= $form->field($model, 'thumb')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_time')->input('date'); ?>

    <?= $form->field($model, 'end_time')->input('date') ?>

    <?= $form->field($model, 'support_way')->dropdownList([
        1 => '给资金',
        2 => '给人',
        3 => '给技术'
    ], ['prompt' => '请选择扶持方式']) ?>

    <?= $form->field($model, 'charge_depart')->dropdownList([
        1 => '茂名市中小企业中心',
        2 => '茂名工业和信息化局',
        3 => '茂名市教育局',
        4 => '茂名市市场监督管理局'
    ], ['prompt' => '请选择归口部门']) ?>

    <?= $form->field($model, 'industry')->dropdownList([
         1 => '行业1',
         2 => '行业2',
         3 => '行业3',
         4 => '行业4'
    ]) ?>

    <?= $form->field($model, 'scale')->textInput() ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requirement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'material')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'original_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'manual')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rank')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => 'Say hello...',
    ]);
    ?>

<?php
Modal::begin([
    'header' => '<h2>选择类型</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

echo 'Say hello...';

Modal::end();
?>
</div>
