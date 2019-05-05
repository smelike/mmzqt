<?php

namespace backend\controllers;

use Yii;
use common\models\TypeGroup;
use common\models\TypeSet;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * TypeGroupController implements the CRUD actions for TypeGroup model.
 */
class TypeGroupController extends BaseController
{
    /**
     * Lists all TypeGroup models.
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $offset = 10)
    {
		$query = TypeGroup::find()->where(['status' => 0])->orderBy(['tg_id' => SORT_DESC]);
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$start = ($page - 1) * $offset;
		$offset = ($offset > 0) ? $offset : 10;
		$typeGroup = $query->offset($start)->limit($offset)->all();
		$data = $typeGroup ? ['set' => $typeGroup, 'count' => $count] : ['msg' => '暂无数据'];
		return $this->response($data);
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
		$data = $typeGroup ? $typeGroup->toArray() : ['msg' => '暂无数据'];
		
		return $this->response($data);  
    }

    /**
     * Creates a new TypeGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeGroup();
		$data = ['msg' => '填写内容不能为空'];
		$post = Yii::$app->request->post();

		$model->alias = isset($post['alias']) ? $post['alias'] : '';
		$model->group_name = isset($post['group_name']) ? $post['group_name'] : '';
        if ($model->alias && $model->group_name && $model->save()) {
            $data = ['id' => $model->primaryKey];
        }
        return $this->response($data);
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
		
		$data = ['msg' => '更新内容不能为空'];
		if (isset($post['alias'], $post['group_name'])) {
			$updateData = ['alias' => $post['alias'], 'group_name' => $post['group_name']];
			$updateData = array_filter($updateData);
			if (!empty($updateData)) {
				$update = $model->updateAttributes(array_merge($updateData, array('update_time' => time())));
				$data = $update ? ['id' => $model->primaryKey] : ['msg' => '删除失败'];
			}
		}
		
		return $this->response($data);
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
        $typeSetCount = TypeSet::find()->where(['alias' => $model->alias])->count();

        $data = ['msg' => '必须先将类型清空，才能删除分组。'];
        if (empty($typeSetCount)) {
            //$update = $model->updateAttributes(['status' => 1]);
            $delete = $model->delete();
            $data = $delete ? ['id' => $model->primaryKey] : ['msg' => '删除失败'];
        }
        return $this->response($data);
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
