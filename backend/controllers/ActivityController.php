<?php

namespace backend\controllers;

use Yii;
use common\models\Activity;
use common\models\ActivityQuery;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends BaseController
{
    public $modelClass = 'common\models\Activity';
    public function actions()
	{
		$actions = parent::actions();
		unset($actions['index']);
		unset($actions['create']);
		unset($actions['update']);
		unset($actions['view']);
		unset($actions['delete']);
		return $actions;
	}
    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $limit = 10)
    {
        $query = Activity::find()->where(['status' => 0]);
        $provider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => ['pageSize' => $limit],
                'sort' => [
                    'defaultOrder' => [
                        'act_id' => SORT_DESC
                    ]
                ]
            ]
        );
        $data = ['set' => $provider->getModels(), 'count' => $provider->getTotalCount()];
        return $data;
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $activity = $this->findModel($id);
        $activity->setScenario('view');
        return $activity;
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();
        
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
           $data = ['id' => $model->primaryKey, 'msg' => '活动创建成功'];
           return $data;
        } else {
            $validateError = $model->getErrorSummary(false);
            $validateError = (is_array($validateError) && $validateError) ? join(',', $validateError) : '验证没有通过';
            
            throw new \yii\web\HttpException(402, $validateError);
        }

    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            $data = ['id' => $model->primaryKey, 'msg' => '更新成功'];
            return $data;
        } else {
            throw new \yii\Web\HttpException(402, '更新失败');
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $data = ['id' => $model->primaryKey, 'msg' => '删除成功'];
            return $data;
        } else {
            throw new \yii\web\HttpException(402, '删除失败');
        }
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('服务器找不到请求的资源');
    }
}
