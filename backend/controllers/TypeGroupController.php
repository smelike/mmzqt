<?php

namespace backend\controllers;

use Yii;
use yii\rest\Controller;
use common\models\TypeGroup;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * TypeGroupController implements the CRUD actions for TypeGroup model.
 */
class TypeGroupController extends Controller
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
     * Lists all TypeGroup models.
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $offset = 10)
    {
		$query = TypeGroup::find()->orderBy(['tg_id' => SORT_DESC]);
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$start = ($page - 1) * $offset;
		$offset = ($offset > 0) ? $offset : 10;
		$typeGroup = $query->offset($start)->limit($offset)->all();
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
        $typeGroup = $this->findModel($id);
		return $this->serializeData($typeGroup);  
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
        if ($model->alias && $model->group_name && $model->save()) {
            $response = ['code' => 0, 'id' => $model->tg_id, 'msg' => '类型分组创建成功'];
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
		$post = Yii::$app->request->post();
		$post = array_filter($post);
		
		$response = ['code' => 1, 'msg' => '更新内容不能为空'];
		if (isset($post['alias'], $post['group_name'])) {
			$updateData = ['alias' => $post['alias'], 'group_name' => $post['group_name']];
			$updateData = array_filter($updateData);
			$response = ['code' => 1, 'msg' => '更新内容失败'];
			if (!empty($updateData)) {
				$update = $model->updateAttributes(array_merge($updateData, array('update_time' => time())));
			}
		}
		
		return $this->serializeData($response);
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
		$update = $model->updateAttributes(['status' => 1, 'update_time' => time()]);
        return $this->serializeData(['code' => !$update, 'policy_id' => $id]);
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
