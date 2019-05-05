<?php

namespace backend\controllers;

use Yii;
use common\models\GovHeadline;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * GovHeadlineController implements the CRUD actions for GovHeadline model.
 */
class GovHeadlineController extends BaseController
{

    /**
     * Lists all GovHeadline models.
     * @param integer $page - the page number
     * @param integer $offset - the length of each page
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $offset = 10)
    {

        $query = GovHeadline::find()->where(['status' => 0])->orderBy(['top_id' => SORT_DESC]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $start = ($page - 1) * $offset;

        $headlines = $query->offset($start)->limit($offset)->all();
        $data = ['set' => $headlines, 'count' => $count];
        return $this->response($data);
    }

    /**
     * Displays a single GovHeadline model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $headline = $this->findModel($id);
        $headline->setScenario('update');
        $headline->updateCounters(['page_view' => 1]);
        $data = $headline;
        return $this->response($data);
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
        $pieces = explode('/', $post['thumb']);
        $post['thumb'] = array_pop($pieces);
        $post['detail'] = $this->imageDomain($post['detail']);
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
        $post = Yii::$app->request->post();
        $pieces = explode('/', $post['thumb']);
        $post['thumb'] = array_pop($pieces);
        $post['detail'] = $this->imageDomain($post['detail']);
        $model->load($post);
        $data = ['msg' => '头条更新失败'];

        if ($model->validate()) {
            $post['update_time'] = time();
            $model->attributes = $post;
            $update = $model->save();
            $update ? $data = ['id' => $model->primaryKey] : '';
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			$data['msg'] = $validateError;
        }

        return $this->response($data);
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
        $model = $this->findModel($id);
        $update = $model->updateAttributes(['status' => 1, 'update_time' => time()]);
        
        $data = ['msg' => '删除失败'];
        if ($update) {
            $data = ['id' => $model->primaryKey, 'count' => GovHeadline::find()->where(['status' => 0])->count()];
        }
        
        return $this->response($data);
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
