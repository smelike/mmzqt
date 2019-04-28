<?php

namespace backend\controllers;

use Yii;
use yii\rest\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;

class UploadController extends BaseController
{
    public function actionIndex()
    {
		$data = ['imgUrl' => '', 'msg' => '上传内容不能为空'];
        if (Yii::$app->request->isPost) {
			$model = new UploadForm();
            $model->imageFile = UploadedFile::getInstanceByName('imageFile');
			
            $data = ['msg' => '只允许 png,jpg 图片类型'];
			if ($newName = $model->upload()) {
                // file is uploaded successfully
				$data = ['imgUrl' => $newName];
            }
        }
		return $this->response($data);
    }
}
