<?php

namespace backend\controllers;

use Yii;
use common\models\TypeSet;
use common\models\TypeSetSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;

/**
 * TypeSetController implements the CRUD actions for TypeSet model.
 */
class TypeSetController extends Controller
{
	public $enableCsrfValidation = false;
	
	public static function allowedDomains() {
		return [
			'http://localhost:8080',
		];
	}
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
		return array_merge(parent::behaviors(), [
			'corsFilter'  => [
				'class' => \yii\filters\Cors::className(),
				'cors'  => [
					'Origin'                           => static::allowedDomains(),
					'Access-Control-Request-Method'    => ['POST', 'OPTIONS'],
					'Access-Control-Allow-Credentials' => true,
					'Access-Control-Max-Age'           => 3600
				],
			],
		]);
    }

    /**
     * Lists all TypeSet models.
     * @return mixed
     */
    public function actionIndex(string $alias = '')
    {
		if (empty($alias)) {exit(false);}
		$query = TypeSet::find()->where(['status' => 0, 'alias' => $alias])->orderBy(['type_id' => SORT_DESC]);
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$typeSet = $query->offset($pagination->offset)->limit(10)->all();
		return $this->serializeData(['set' => $typeSet, 'count' => $count]);
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
		return $this->serializeData($typeSet);
    }

    /**
     * Creates a new TypeSet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypeSet();
		
		$response = ['code' => 1, 'id' => '', 'msg' => '类型创建失败，刷新尝试'];
		$post = Yii::$app->request->post();
		$model->name = isset($post['name']) ? $post['name'] : '';
		$model->alias = isset($post['alias']) ? $post['alias'] : '';
        if ($model->name && $model->alias && $model->save()) {
            $response = ['code' => 0 , 'id' => $model->type_id, 'msg' => '类型创建成功'];
        }
		return $this->serializeData($response);
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
		$model->alias = isset($post['alias']) ? $post['alias'] : '';
		$model->update_time = time();
		
		$response = ['code' => 0, 'id' => '', 'msg' => '类型更新失败'];
        if ($model->name && $model->alias && $model->save()) {
            $response = ['code' => 0 , 'id' => $model->type_id, 'msg' => '类型更新成功'];
        }
		return $this->serializeData($response);
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
		
		$response = ['code' => 1, 'msg' => '删除失败'];
		if ($update) {
			$response['msg'] = '删除成功';
			$response['code'] = 0;
		}
        return $this->serializeData($response);
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
