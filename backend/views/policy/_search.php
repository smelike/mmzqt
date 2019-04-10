<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PolicySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'policy_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'thumb') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'open_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'support_way') ?>

    <?php // echo $form->field($model, 'charge_depart') ?>

    <?php // echo $form->field($model, 'industry') ?>

    <?php // echo $form->field($model, 'scale') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'requirement') ?>

    <?php // echo $form->field($model, 'support_content') ?>

    <?php // echo $form->field($model, 'material') ?>

    <?php // echo $form->field($model, 'original_info') ?>

    <?php // echo $form->field($model, 'manual') ?>

    <?php // echo $form->field($model, 'rank') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_recommend') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
