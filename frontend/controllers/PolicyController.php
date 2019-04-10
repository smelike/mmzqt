<?php

	namespace frontend\controllers;
	
	use yii\rest\ActiveController;
	
	class PolicyController extends ActiveController
	{
		
		public $modelClass = 'common\models\Policy';
		
		public function actionIndex() {
			
			$return = ['code' => 111, 'data' => 12342423];
			echo json_encode($return);
			
		}
	}