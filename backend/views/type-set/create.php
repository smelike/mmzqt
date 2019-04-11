<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypeSet */

$this->title = Yii::t('app', '创建类型');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '类型管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
