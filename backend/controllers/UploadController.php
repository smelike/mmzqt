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
		$response = ['code' => 9, 'imgUrl' => '', 'msg' => '上传内容不能为空'];
        if (Yii::$app->request->isPost) {
			$model = new UploadForm();
            $model->imageFile = UploadedFile::getInstanceByName('imageFile');
			
            $response = ['code' => 1, 'imgUrl' => '', 'msg' => '只允许 png,jpg 图片类型'];
			if ($model->upload()) {
                // file is uploaded successfully
				$response = ['code' => 0, 'imgUrl' => $model->imageFile->name, 'msg' => '上传成功'];
            }
        }
		return $this->serializeData($response);
    }
	
	

}
