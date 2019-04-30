<?php

namespace backend\controllers;

use Yii;
use common\models\GovHeadline;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GovHeadlineController implements the CRUD actions for GovHeadline model.
 */
class GovHeadlineController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GovHeadline models.
     * @return mixed
     */
    public function actionIndex()
    {
		$data = ['code' => 0, 'data' => 'list'];
        return $this->serializeData($data);
    }

    /**
     * Displays a single GovHeadline model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       $data = ['code' => 0, 'data' => 'view'];
        return $this->serializeData($data);
    }

    /**
     * Creates a new GovHeadline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    
        $model = new GovHeadline();
        $post = Yii::$app->request->post();
        $model->attributes = $post;

        $data = ['msg' => '头条创建失败'];
        if ($model->validate()) {
            $insert = $model->insert();
            $insert ? $data = ['id' => $model->primaryKey] : '';
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			$data['msg'] = $validateError;
        }

        return $this->response($data);
    }

    /**
     * Updates an existing GovHeadline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->top_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GovHeadline model.
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
     * Finds the GovHeadline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GovHeadline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GovHeadline::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
