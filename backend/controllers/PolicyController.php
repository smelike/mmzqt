<?php

namespace backend\controllers;

use Yii;
use common\models\Policy;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * PolicyController implements the CRUD actions for Policy model.
 */
class PolicyController extends BaseController
{
	
	public $modelClass = "common\models\Policy";
  
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
		* Lists all Policy models.
		* @param integer $page 
		* @param integer $offset
		* @return mixed
	*/	
	public function actionIndex(int $page = 1, int $limit = 10)
	{
		$provider = new ActiveDataProvider(
				[
					'query' => $this->sortByFilters(),
					'pagination' => ['pageSize' => $limit],
					'sort' => [
					'defaultOrder' => [
								'policy_id' => SORT_DESC,
						]
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
	 *  Filter the policies by request filterParams
	 * 
	 */
	protected function sortByFilters()
	{
		$gets = Yii::$app->request->get();
		
		$where = [];
		$orderBy = ['policy_id' => SORT_DESC];
		if (empty($gets['support_way']) && empty($gets['charge_depart']) && empty($gets['status']) && empty($gets['industry']) && empty($gets['scale']) && empty($gets['age'])) {
			$where = ['<>', 'status', 1];
		}

		if (!empty($gets['support_way'])) {
			$where['support_way'] = $gets['support_way'];
		}
		if (!empty($gets['charge_depart'])) {
			$where['charge_depart'] = $gets['charge_depart'];
		}
		if (!empty($gets['status'])) {
			$where['status'] = $gets['status'];
		}
		if (!empty($gets['industry'])) {
			$where['industry'] = $gets['industry'];
		}
		if (!empty($gets['scale'])) {
			$where['scale'] = $gets['scale'];
		}
		if (!empty($gets['age'])) {
			$where['age'] = $gets['age'];
		}

		$query = Policy::find()->where($where)->orderBy($orderBy);
		// echo $query->createCommand()->sql;
		// echo $query->createCommand()->getRawSql();
		return $query;
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
		return $policy;
	}

	/**
	 *  Search policies by keywords 
	 *  match the title with user input keywords 
	 *  for weapp
	 */
	public function actionSearch($page = 1, $offset = 10)
	{
			$keyword = Yii::$app->request->get('_kp');

			if ($keyword) {
					$params = [':query' => "%{$keyword}%"];
					$query =  Policy::searchPolicyByKeyWord($params);
					$provider = new ActiveDataProvider(
						[
							'query' => $query,
							'pagination' => ['pageSize' => $offset],
							'sort' => [
								'defaultOrder' => [
									'create_time' => SORT_DESC
								]
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
	 * Creates a new Policy model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$post = Yii::$app->request->post();
		$model = new Policy;
		// $this->packFormData($post, $model);
		//if ($model->validate() && $model->insert()) {
		if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
			$data = ['id' => $model->primaryKey, 'msg' => '政策添加成功'];
			return $data;
		} else {
			$validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : 'So sorry. Something is wrong.';
			throw new \yii\web\HttpException(402, $validateError);
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

		if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
			$data = ['id' => $model->primaryKey, 'msg' => '更新成功'];
			return $data;
		} else {
			$validateError = $model->getFirstErrors();
			$validateError = is_array($validateError) ? join(',', $validateError) : '';
			throw new \yii\web\HttpException(402, $validateError);
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
		
		if ($model->delete()) {
			$data = ['id' => $model->primaryKey, 'msg' => '删除成功'];
			return $data;
		} else {
			throw new \yii\web\HttpException(402, '政策删除操作异常');
		}
	}
	
	/**
	 * Set the policy to be recommended
	 *  @param $unset [0 - setRecommend, 1 - unsetRecommend]
	 */
	public function actionRecommend(int $id, int $unset = 0) 
	{
		
			$msg = '推荐或取消推荐政策失败，请稍后重试';

			if (empty($id)) { throw new \yii\web\HttpException(402, $msg);}
			
			$recommendCount = Policy::recommendedPolicy()->count();
			$policy = $this->findModel($id);
			$recommand = false;
			// 设置推荐
			if (empty($unset)) {
				if ($recommendCount < 4) {
					$msg = "设置推荐成功";
					$recommand = $policy->updateAttributes(['is_recommend' => 1, 'update_time' => time()]);	
				} else {
					$msg = '不允许超过 4 条推荐政策，请先取消推荐，再操作。';
					throw new \yii\web\HttpException(402, $msg);
				}
			} else {
				// 取消推荐
				$msg = "取消推荐成功";
				$recommand = $policy->updateAttributes(['is_recommend' => 0, 'update_time' => time()]);	
			}
			if ($recommand) {
				return ['id' => $policy->primaryKey, 'msg' => $msg];
			} else {
				throw new \yii\web\HttpException(402, $msg);
			}
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
