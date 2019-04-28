<?php

namespace common\controllers;

use Yii;
use yii\rest\Controller;

class RestController extends Controller 
{
	public $enableCsrfValidation = false;
	
	public function __construct($id, $module, $config = []) {
		
		parent::__construct($id, $module, $config);
		$token = Yii::$app->request->headers->get('X-Token');
		$user = Yii::$app->user->getIdentity();
		return $this->serializeData(['code' => 1, 'response' => ['msg' => 'token 对不上']]);
	}
}

?>