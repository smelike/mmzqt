<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Policy */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Policies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="policy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->policy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->policy_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'policy_id',
            'type_id',
            'thumb',
            'title',
            'open_time:datetime',
            'end_time:datetime',
            'support_way',
            'charge_depart',
            'industry',
            'scale',
            'age',
            'brief',
            'requirement:ntext',
            'support_content:ntext',
            'material:ntext',
            'original_info:ntext',
            'manual:ntext',
            'rank',
            'status',
            'is_recommend',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
