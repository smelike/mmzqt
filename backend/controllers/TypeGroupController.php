<?php

namespace backend\controllers;

use Yii;
use common\controllers\RestController;
use common\models\TypeGroup;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * TypeGroupController implements the CRUD actions for TypeGroup model.
 */
class TypeGroupController extends RestController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    /**
     * Lists all TypeGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
		$query = TypeGroup::find();
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$typeGroup = $query->offset($pagination->offset)->limit(10)->all();
		return $this->serializeData(['set' => $typeGroup, 'count' => $count]);
    }

    /**
     * Displays a single TypeGroup model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TypeGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeGroup();
		$response = ['code' => 1, 'msg' => '填写内容不能为空'];
		$post = Yii::$app->request->post();
		$model->alias = isset($post['alias']) ? $post['alias'] : '';
		$model->group_name = isset($post['group_name']) ? $post['group_name'] : '';
        if ($post && $model->save()) {
            $response = ['code' => 0, 'id' => $model->tg_id];
        }

        return $this->serializeData($response);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tg_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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