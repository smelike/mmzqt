<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\Policy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->dropdownList([
        1 => 'item1',
        2 => 'item2'
    ],['prompt' => '请选择政策类型']) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_time')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    <?= $form->field($model, 'support_way')->textInput() ?>

    <?= $form->field($model, 'charge_depart')->textInput() ?>

    <?= $form->field($model, 'industry')->textInput() ?>

    <?= $form->field($model, 'scale')->textInput() ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requirement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'material')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'original_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'manual')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rank')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

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
