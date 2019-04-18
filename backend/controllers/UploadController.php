<?php

namespace backend\controllers;

use Yii;
use yii\rest\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;

class UploadController extends Controller
{
	
	public static function allowedDomains() {
		return [
			//'*',
			'http://localhost:8080'
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		
		return array_merge(parent::behaviors(), [
			'corsFilter'  => [
				'class' => \yii\filters\Cors::className(),
				'cors'  => [
					'Origin'                           => static::allowedDomains(),
					'Access-Control-Request-Method'    => ['POST', 'OPTIONS'],
					'Access-Control-Allow-Credentials' => false,
					'Access-Control-Max-Age'           => 3600,
				],
			],
		]);
	}
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
			$model = new UploadForm();
            $model->imageFile = UploadedFile::getInstanceByName('imageFile');
			//var_dump($model->imageFile);
            if ($model->upload()) {
                // file is uploaded successfully
				$response = ['code' => 0, 'imgUrl' => $model->imageFile->name];
                return $this->serializeData($response);
            }
        }
        //return $this->render('index', ['model' => $model]);
    }
	
	

}
