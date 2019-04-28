<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends BaseController
{
	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge( parent::behaviors(), [
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
		//echo '后台首页';
        //return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
		$model = new LoginForm();
		$model->login_name = $post['login_name'];
		$model->password = $post['password'];
		
        if ($model->login()) {
			$user = Yii::$app->user->getIdentity();
			$data = ['token' => $user->token, 'login_name' => $user->login_name];
        } else {
			$model->password = '';
			$errors = $model->getFirstErrors();
			$data = ['msg' => array_shift($errors)];
        }
		return $this->response($data);
    }
	
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $return = Yii::$app->user->logout();
		// 退出之后，需要更新用户 token
		$data = $return ? [] : ['msg' => '退出失败'];
        return $this->response($data);
    }
    
}
