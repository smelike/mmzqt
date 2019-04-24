<?php

namespace backend\controllers;

use Yii;
use common\models\Policy;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
/**
 * PolicyController implements the CRUD actions for Policy model.
 */
class PolicyController extends Controller
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
     * Lists all Policy models.
	 * @param integer $page 
	 * @param integer $offset
     * @return mixed
     */
    public function actionIndex(int $page = 1, int $offset = 10)
    {
		$query = Policy::find()->where(['status' => 0]);
		$count = $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$start = ($page - 1) * $offset;
		$policies = $query->offset($start)->limit($offset)->all();
		return $this->serializeData(['set' => $policies, 'count' => $count]);
    }

    /**
     * Displays a single Policy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        
        $policy = $this->findModel($id);
		
		return $this->serializeData($policy);
       
    }

    /**
     * Creates a new Policy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$post = Yii::$app->request->post();
		
        $model = new Policy;
		
		$model->title = $post['title'];
		$model->thumb = $post['thumb'];
		$dateTime = explode(",", $post['date']);
		$model->open_time = array_shift($dateTime);
		$model->end_time = array_pop($dateTime);
		$model->type_id = $post['typeId'];
		$model->support_way = $post['supportId'];
		$model->charge_depart = $post['chargeId'];
		$model->industry = $post['industryId'];
		$model->scale = $post['scale'];
		$model->age = $post['age'];
		$model->brief = $post['brief'];
		$model->requirement = $post['requirement'];
		$model->original_info = $post['content'];
		$model->insert();
		
        if ($model->policy_id) {
			return $this->serializeData(['code' => 0, 'policy_id' => $model->policy_id]);
        }
    }
	
    /**
     * Updates an existing Policy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->serializeData(['code' => 0, 'policy_id' => $model->policy_id]);
        }
    }

    /**
     * Deletes an existing Policy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel(['policy_id' => $id]);
		$update = $model->updateAttributes(['status' => 2, 'update_time' => time()]);
        return $this->serializeData(['code' => $update, 'policy_id' => $id]);
    }

    /**
     * Finds the Policy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Policy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Policy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
