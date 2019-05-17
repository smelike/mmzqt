<?php

namespace backend\controllers;

use Yii;
use common\models\TypeGroup;
use common\models\TypeSet;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

/**
 * TypeGroupController implements the CRUD actions for TypeGroup model.
 */
class TypeGroupController extends BaseController
{
    public $modelClass = "common\models\TypeGroup";
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['view']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }
    /**
     * Lists all TypeGroup models.
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $offset = 10)
    {
        $modelClass = $this->modelClass;
        $provider = new ActiveDataProvider(
            [
                'query' => $modelClass::find(),
                'pagination' => ['pageSize' => $offset],
                'sort' => [
                'defaultOrder' => [
                        'tg_id' => SORT_DESC,
                    ]
                ]
            ]
        );
        $data = [
        'set' => $provider->getModels(),
        'count' => $provider->getTotalCount()
        ];
        return $data;
    }

    /**
     * Displays a single TypeGroup model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $typeGroup = $this->findModel($id);
		
		return $typeGroup;  
    }

    /**
     * Creates a new TypeGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeGroup();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            $data = ['id' => $model->primaryKey, 'msg' => '类型分组创建成功'];
            return $data;
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			throw new \yii\web\HttpException(402, $validateError);
        }
    }

    /**
     * Updates an existing TypeGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$model = $this->findModel($id);
		$post = Yii::$app->request->post();
        $post = array_filter($post);
        
		if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            $data =  ['id' => $model->primaryKey, 'msg' => '更新成功'];
            return $data;
		} else {

            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			throw new \yii\web\HttpException(402, $validateError);
        }
    }

    /**
     * Deletes an existing TypeGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (empty($model->typeSet) && $model->delete()) {
            $data = ['id' => $model->primaryKey, 'msg' => '删除成功'];
            return $data;
        } else {
            throw new \yii\web\HttpException(402, '必须先将类型清空，才能删除分组。');
        }
    }

    /**
     * Finds the TypeGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TypeGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypeGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
