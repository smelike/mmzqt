<?php

namespace common\controllers;

use yii\rest\Controller;

class RestController extends Controller 
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
					'Access-Control-Allow-Credentials' => false,
					'Access-Control-Max-Age'           => 3600
				],
			],
		]);
    }
	
}

?>