<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeGroup */

$this->title = Yii::t('app', 'Create Type Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
