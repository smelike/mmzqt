<?php

namespace backend\controllers;

use Yii;
use common\models\LoginForm;

class UserController extends BaseController
{
  public $modelClass = 'common\models\User';

  public function actionLogin()
  {
    $model = new LoginForm();
    if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
      $data = [
        'token' => $model->login(),
        'username' => Yii::$app->getRequest()->getBodyParam('username'),
        'message' => '登录成功' 
      ];
      return $data;
    } else {
      $data = [
      $model->getFirstErrors()
      ];
      throw new \yii\web\HttpException(402, '账户名或密码不正确');
    }
  }

  public function actionLogout()
  {
    $model = new LoginForm();
    $model->access_token = Yii::$app->request->get('access-token');
    $model->logout();
    return [
      'msg' => '登出成功'
    ];
  }
}
