<?php

namespace backend\controllers;

use Yii;
use common\models\Policy;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * PolicyController implements the CRUD actions for Policy model.
 */
class PolicyController extends BaseController
{
	
    /**
     * Lists all Policy models.
	 * @param integer $page 
	 * @param integer $offset
     * @return mixed
     */
	public function behaviors() {
		return array_merge( parent::behaviors(), [
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						//'logout' => ['get'],
					],
				]
			]
		);
	}
	
    public function actionIndex(int $page = 1, int $offset = 10)
    {
		
			$query = Policy::find()->where(['status' => 0])->orderBy(['policy_id' => SORT_DESC]);
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count]);
			$start = ($page - 1) * $offset;
			$policies = $query->offset($start)->limit($offset)->all();
			
			$data = ['set' => $policies, 'count' => $count];
			return $this->response($data);
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
			$policy->original_info = $this->imageDomain($policy->original_info, true);
			$policy->manual = $this->imageDomain($policy->manual, true);

			return $this->response($policy->toArray());
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
			
			if ($model->validate()) {
				$insert = $model->insert();
				$data = $insert ? ['id' => $model->primaryKey] : ['msg' => '政策创建失败'];
			} else {
				$validateError = $model->getFirstErrors();
				$validateError = is_array($validateError) ? join(',', $validateError) : '';
				$data['msg'] = $validateError;
			}
			return $this->response($data);
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
		$model->original_info = $this->imageDomain($post['original_info']);
		$model->manual = $this->imageDomain($post['manual']);
		$model->rank = $post['rank'];
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
			
			$post['original_info'] = $this->imageDomain($post['original_info']);
			$post['manual'] = $this->imageDomain($post['manual']);
			$model->attributes = $post;
			
			$data = [];
			if ($model->validate()) {
				$update = $model->save();
				$time = ['update_time' => time(), 'open_time' => strtotime($post['date'][0]), 'end_time' => strtotime($post['date'][1])];
				$model->attributes = $time;
				$update = $model->save();
				$data = $update ? ['id' => $model->primaryKey] : ['msg' => '政策更新失败，请稍后尝试'];
			} else {
				$validateError = $model->getFirstErrors();
				$validateError = is_array($validateError) ? join(',', $validateError) : '';
				$data['msg'] = $validateError;
			}
			return $this->response($data);
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
			$data = ['msg' => '政策删除失败'];

			if ($update) {
				$data = ['id' => $model->primaryKey, 'count' => GovHeadline::find()->where(['status' => 0])->count()];
			}
      return $this->response($data);
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
