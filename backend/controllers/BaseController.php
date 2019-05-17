<?php

namespace backend\controllers;

use Yii;
use yii\filters\auth\QueryParamAuth;

class BaseController extends \yii\rest\ActiveController
{
	public $enableCsrfValidation = false;

	public function behaviors()
	{
		$behaviors = parent::behaviors();
		
		$behaviors['authenticator'] = [
			'class' => QueryParamAuth::className(),
			'except' => ['login','logout']
		];

		return $behaviors;
	}

	/**
	 *  Paginate the query result
	 *  @return array ('set' => , 'count' => )
	*/
	protected function paginateQueryResult($query, $page = 1, $offset = 5)
	{
			$count = $query->count();
			// $pagination = new Pagination(['totalCount' => $count]);
			$start = ($page - 1) * $offset;
			$rows = $query->offset($start)->limit($offset)->all();

			return ['set' => $rows, 'count' => $count];
	}
}