<?php

namespace backend\controllers;

use Yii;
use common\models\TypeSet;
use common\models\TypeSetSearch;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

/**
 * TypeSetController implements the CRUD actions for TypeSet model.
 */
class TypeSetController extends BaseController
{
    /**
     * Lists all TypeSet models.
     * @return mixed
     */
    public function actionIndex(string $alias = '')
    {
	
		$data = ['msg' => '分类别名不能为空'];
		if (!empty($alias)) {
			$query = TypeSet::find()->where(['status' => 0, 'alias' => $alias])->orderBy(['type_id' => SORT_DESC]);
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count]);
			$typeSet = $query->offset($pagination->offset)->limit(10)->all();
			$data = ['set' => $typeSet, 'count' => $count];
		}
		return $this->response($data);
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
		return $this->response($typeSet->toArray());
    }

    /**
     * Creates a new TypeSet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeSet();
		
		$response = ['msg' => '类型创建失败，刷新尝试'];
		$post = Yii::$app->request->post();
		$model->name = isset($post['name']) ? $post['name'] : '';
		$model->alias = isset($post['alias']) ? $post['alias'] : '';
        if ($model->name && $model->alias && $model->save()) {
            $response = ['id' => $model->primaryKey];
        }
		return $this->response($response);
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

		$post = Yii::$app->request->post();
		$model->name = isset($post['name']) ? $post['name'] : '';
		//$model->alias = isset($post['alias']) ? $post['alias'] : '';
		$model->update_time = time();
		
		$response = ['msg' => '类型更新失败'];
        if ($model->name && $model->save()) {
            $response = ['id' => $model->primaryKey];
        }
		return $this->response($response);
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
        $model = $this->findModel($id);
		$update = $model->updateAttributes(['status' => 1, 'update_time' => time()]);
	
		$response = $update ? ['id' => $model->primaryKey] : ['msg' => '删除失败'];
        return $this->response($response);
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
