<?php
namespace backend\controllers;

use Yii;
use yii\rest\Controller;
use common\controllers\RestController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends RestController
{
	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge( parent::behaviors(), [
				'access' => [
					'class' => AccessControl::className(),
					'rules' => [
						['actions' => ['login', 'error'], 'allow' => true],
						['actions' => ['logout', 'index'], 'allow' => true, 'roles' => ['@']],
					],
				],
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'logout' => ['get'],
					],
				]
			]
		);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		echo '后台首页';
        //return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
		//var_dump(Yii::$app->request->post());
		/*
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
        }
		*/
        $post = Yii::$app->request->post();
		$model = new LoginForm();
		$model->login_name = $post['login_name'];
		$model->password = $post['password'];
		
        if ($model->login()) {
			$user = Yii::$app->user->getIdentity();
			$msg = "登录成功";
			
			/*
			Yii::$app->response->cookies->add([
				'name' => 'token',
				'value'=> $user->token
			]);
			*/
			//$this->sendCookies();
			$response = ['code' => 0, 'token' => $user->token, 'msg' => $msg];
        } else {
			$model->password = '';
			$errors = $model->getFirstErrors();
			$response = ['code' => 1, 'msg' => array_shift($errors)];
        }
		return $this->serializeData($response);
    }
	public function actionSendCookies() {
		$cookies = Yii::$app->response->cookies; 
	   // add a new cookie to the response to be sent 
	   $cookies->add(new \yii\web\Cookie([ 
		  'name' => 'language', 
		  'value' => 'ru-RU', 
	   ])); 
	   $cookies->add(new \yii\web\Cookie([
		  'name' => 'username', 
		  'value' => 'John', 
	   ])); 
	   $cookies->add(new \yii\web\Cookie([ 
		  'name' => 'country', 
		  'value' => 'USA', 
	   ])); 
	}

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
		// 退出之后，需要更新用户 token
		$response = ['code' => 0, 'msg' => '成功退出'];
        return $this->serializeData($response);
    }
    
}
