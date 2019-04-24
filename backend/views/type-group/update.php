<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeGroup */

$this->title = Yii::t('app', 'Update Type Group: {name}', [
    'name' => $model->tg_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tg_id, 'url' => ['view', 'id' => $model->tg_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="type-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
