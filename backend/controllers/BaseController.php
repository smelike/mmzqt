<?php

namespace backend\controllers;

use Yii;

class BaseController extends \yii\rest\Controller
{
	public $enableCsrfValidation = false;
	
    public function beforeAction($action)
	{
        $token = Yii::$app->request->headers->get('X-Token');
        $uniqueId = $action->uniqueId;
        $controller = $action->controller;
        // 40001 - no-token
		// 40002 - token 匹配不上
		// 40003 - token 过时
        if (empty($token) && $uniqueId != 'site/login') {
            $this->asJson([
                'code' => 40001,
                'data' => [
					'msg' => '没有 token',
				]
            ]);

            return false;
        }

        return parent::beforeAction($action);
    }
	
	public function response($data) 
	{	
		$code = empty($data['msg']) ? 0 : 1;
		$response = ['code' => $code, 'data' => $data];
		/*
		if (!isset($data['msg'])) {
	
			$response['data'] = array_merge($response['data'], ['msg' => '']);
		}*/
		return $this->serializeData($response);
	}
	
}