<?php

	namespace frontend\controllers;
	
	use yii\rest\ActiveController;
	use yii\filters\VerbFilter;
	
	class PolicyController extends ActiveController
	{
		
		public $modelClass = 'common\models\Policy';
		
		/**
		 * @inheritdoc
		*/
		protected function verbs()
		{
			return [
				'index' => ['GET', 'HEAD', 'POST'],
				'view' => ['GET', 'HEAD'],
				'create' => ['POST'],
				'update' => ['PUT', 'PATCH'],
				'delete' => ['DELETE'],
			];
		}
		public function actionIndex() {
				
				$return = ['code' => 111, 'data' => 12342423];
				echo json_encode($return);
				
			}
		}