<?php

namespace backend\controllers;

use Yii;
use common\models\GovHeadline;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * GovHeadlineController implements the CRUD actions for GovHeadline model.
 */
class GovHeadlineController extends BaseController
{
    public $modelClass = "common\models\GovHeadline";
    
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
     * Lists all GovHeadline models.
     * @param integer $page - the page number
     * @param integer $offset - the length of each page
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $limit = 10)
    {
        $provider = new ActiveDataProvider(
            [
                'query' => $this->sortByFilters(),
                'pagination' => ['pageSize' => $limit],
                'sort' => [
                    'defaultOrder' => ['top_id' => SORT_DESC]
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
     * Sort headlines by request get params
     */
    private function sortByFilters()
    {
        $gets = Yii::$app->request->get();
        
        if (empty($gets['type_id']) && empty($gets['create_time']) && empty($gets['page_view'])) {
            $orderBy = ['top_id' => SORT_DESC];
        }
        
        $where = ['status' => 0];
        if (isset($gets['type_id']) && $gets['type_id']) {
            $where['type_id'] = $gets['type_id'];
        }

        if (isset($gets['create_time']) && $gets['create_time']) {
            $orderBy['create_time'] = ($gets['create_time'] == 'DESC') ? SORT_DESC : SORT_ASC;
        }

        if (isset($gets['page_view']) && $gets['page_view']) {
            $orderBy['page_view']  = ($gets['page_view'] == 'DESC') ? SORT_DESC : SORT_ASC;
        }
        $query =  GovHeadline::find()->where($where)->orderBy($orderBy);
        return $query;
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
        return $headline;
    }

    /**
     * Creates a new GovHeadline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelClass = $this->modelClass;
        $model = new $modelClass;
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            $data = ['id' => $model->primaryKey, 'msg' => '头条创建成功'];
            return $data;
        } else {
            $validateError = $model->getFirstErrors();
            $validateError = is_array($validateError) ? join(',', $validateError) : '头条创建失败';
            throw new \yii\web\HttpException(402, $validateError);
        }
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
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            return $data = ['id' => $model->primaryKey, 'msg' => '头条更新成功'];
        } else {
            $validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '头条更新失败';
            throw new \yii\web\HttpException(402, $validateError);
        }
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

        if ($update) {
            $data = ['id' => $model->primaryKey, 'msg' => '政府头条删除成功'];
            return $data;
        } else {
            throw new \yii\web\HttpException(402, '删除失败');
        }
    }

    /**
     *  Search headlines by keywords 
     *  match the title with user input keywords 
     *  for weapp
     */
    public function actionSearch()
    {
        $page = 1;
        $offset = 5;

        $keyword = Yii::$app->request->get('_kp');

        if ($keyword) {
            $query = [':query' => "%{$keyword}%"];
            $query = GovHeadline::searchHeadlineByKeyword($query);
            $provider = new ActiveDataProvider(
                [
                    'query' => $query,
                    'pagination' => ['pageSize' => $offset],
                    'sort' => [
                        'defaultOrder' => ['create_time' => SORT_DESC]
                    ]
                ]
            );
            $data = ['set' => $provider->getModels(), 'count' => $provider->getTotalCount()];
            return $data;
        } else {
            throw new \yii\web\HttpException(402, '搜索关键词不能为空');
        }
    }

    /**
     *  Favorite the headline
     * 
     */
    public function actionFavorite()
    {
        $data = ['id' => 23242];
        // more logic code to be writed 
        return $data;
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
