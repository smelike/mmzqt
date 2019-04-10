<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PolicySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Policies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Policy'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'policy_id',
            'type_id',
            'thumb',
            'title',
            'open_time:datetime',
            //'end_time:datetime',
            //'support_way',
            //'charge_depart',
            //'industry',
            //'scale',
            //'age',
            //'brief',
            //'requirement:ntext',
            //'support_content:ntext',
            //'material:ntext',
            //'original_info:ntext',
            //'manual:ntext',
            //'rank',
            //'status',
            //'is_recommend',
            //'create_time:datetime',
            //'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
