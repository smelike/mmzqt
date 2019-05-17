<?php

namespace backend\controllers;

use Yii;
use common\models\TypeSet;
use common\models\TypeSetSearch;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

/**
 * TypeSetController implements the CRUD actions for TypeSet model.
 */
class TypeSetController extends BaseController
{
    public $modelClass = "common\models\TypeSet";

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
     * Lists all TypeSet models.
     * @return mixed
     */
    public function actionIndex(string $alias = '', $offset = 10)
    {

		if ($alias) {
			$query = TypeSet::find()->where(['status' => 0, 'alias' => $alias]);
            $provider = new ActiveDataProvider(
                [
                    'query' => $query,
                    'pagination' => ['pageSize' => $offset],
                    'sort' => [
                    'defaultOrder' => [
                            'type_id' => SORT_DESC,
                        ]
                    ]
                ]
            );
            $data = [
            'set' => $provider->getModels(),
            'count' => $provider->getTotalCount()
            ];
            return $data;
		} else {
            throw new \yii\web\HttpException(402, '分类别名不能为空');
        }
    }

    /**
     * Displays a single TypeSet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        $typeSet = $this->findModel($id);
		return $typeSet;
    }

    /**
     * Creates a new TypeSet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeSet();

        if ($model->load(Yii::$app->getRequest()->getBodyParams()) && $model->save()) {
            $data = ['id' => $model->primaryKey, 'msg' => '创建成功'];
            return $data;
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			throw new \yii\web\HttpException(402, $validateError);
        }
    }

    /**
     * Updates an existing TypeSet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
        if ($model->load(Yii::$app->getRequest()->getBodyParams()) && $model->save()) {
            $data = ['id' => $model->primaryKey, 'msg' => '更新成功'];
            return $data;
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			throw new \yii\web\HttpException(402, $validateError);
        }
    }

    /**
     * Deletes an existing TypeSet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $delete = $this->findModel($id)->delete();
        //$update = $model->updateAttributes(['status' => 1, 'update_time' => time()]);
        if ($delete) {
            return [
                'id' => $model->primaryKey,
                'msg' => '删除成功'
            ];
        } else {
            throw new \yii\web\HttpException(402, '删除失败');
        }
    }

    /**
     * Finds the TypeSet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TypeSet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypeSet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
