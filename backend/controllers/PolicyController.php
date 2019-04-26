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
		
		$query = Policy::find()->where(['status' => 0])->orderBy(['policy_id' => SORT_DESC]);
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
    public function actionView($id)
    {	
        $policy = $this->findModel($id);
		$policy->setScenario('update');
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
		$this->packFormData($post, $model);
		$response = ['code' => 1, 'msg' => '不符合规则'];
		if ($model->validate()) {
			$insert = $model->insert();
			$msg = $insert ? '政策创建成功' : '政策创建失败，请稍后尝试';
			$response = ['code' => (int)!$insert, 'id' => $model->policy_id, 'msg' => $msg];
		} else {
			$validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			$response['msg'] = $validateError;
		}
		return $this->serializeData($response);
    }
	
	protected function packFormData($post, &$model)
	{
		$model->title = $post['title'];
		$model->thumb = empty($post['thumb']) ? 'default.png' : $post['thumb'];
		$model->open_time = strtotime($post['date'][0]);
		$model->end_time = strtotime($post['date'][1]);;
		$model->type_id = empty($post['type_id']) ? 0 : $post['type_id'];
		$model->support_way = $post['support_way'];
		$model->charge_depart = $post['charge_depart'];
		$model->industry = $post['industry'];
		$model->scale = $post['scale'];
		$model->age = $post['age'];
		$model->brief = $post['brief'];
		$model->requirement = $post['requirement'];
		$model->material = $post['material'];
		$model->support_content = $post['support_content'];
		$model->original_info = $post['original_info'];
		$model->manual = $post['manual'];
		$model->rank = $post['rank'];
	}
	
	/*
	 * filter the url-path in rich-text content. 
	 *
	*/
	protected function imageDomain($richText)
	{
		$pattern = "/src=\"(http|https):\/\/\w+.?\w+\.(com|cn|net):?[0-9]+/i";

		$replacement = "src=\"{ES668_IMAGE_DOMAIN}";
	
		$richText = preg_replace($pattern, $replacement, $richText);
		
		return $richText;
		
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
		$post = Yii::$app->request->post();
		$response = ['code' => 1, 'msg' => '不符合规则'];
		$model->attributes = $post;
		// $time = ['update_time' => time(), 'open_time' => strtotime($post['date'][0]), 'end_time' => strtotime($post['date'][1])];
		// $model->setAttributes($time);
        if ($model->validate()) {
			$update = $model->save();
			$time = ['update_time' => time(), 'open_time' => strtotime($post['date'][0]), 'end_time' => strtotime($post['date'][1])];
			$model->attributes = $time;
			$updateTime = $model->save();
			$msg = $update ? '政策更新成功' : '政策更新失败，请稍后尝试';
			$response = ['code' => (int)!$update, 'id' => $model->policy_id, 'msg' => $msg];
		} else {
			$validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			$response['msg'] = $validateError;
		}
		return $this->serializeData($response);
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
		$msg = $update ? '删除成功' : '删除失败，稍后尝试';
        return $this->serializeData(['code' => (int)!$update, 'id' => $id, 'msg' => $msg]);
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
