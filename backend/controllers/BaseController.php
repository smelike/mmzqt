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
		return $this->asJson($response);
	}

	/*
	 * Replace the url-path in rich-text content tag-img's attribute src. 
	 * Use the identifier {ES668_IMAGE_DOMAIN} instead of the url path.
	 * Define the constant in config/params.php
	 * @param $orientation 
	 * false means replace the url-path to identifier
	 * true means 
	*/
	protected function imageDomain($richText, $orientation = false)
	{
		//$pattern = "/src=\"(http|https):\/\/\w+.?\w+\.(com|cn|net):?[0-9]+/i";
		
		$identifier = "src=\"{ES668_IMAGE_DOMAIN}";
		$richText = false;
		if ($orientation) {
			$search = $identifier;
			$replacement = "src=\"" . Yii::$app->params['imageDomain'];
			$richText = str_replace($search, $replacement, $richText);
		} else {
			$pattern = "/src=\"(http|https):\/\/\w+.?\w+\.(com|cn|net)(:?[0-9]+)?/i";		
			$richText = preg_replace($pattern, $identifier, $richText);
		}
		
		return $richText;
	}

}