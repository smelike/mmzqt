<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Policy;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    public $modelClass = '';
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $banners = Yii::$app->params['banners'];
        $navs = Yii::$app->params['navs'];
        $notice = Yii::$app->params['notice'];

        $data = ['banners' => $banners, 'navs' => $navs, 'notice' => $notice];
        return $data;
    }

    /**
     * Recommanded Policies
     * @return json
     */
    public function actionRecommendPolicy()
    {
        $policies = Policy::find()->where(['status' => 0, 'is_recommend' => 1])->all();

        return $policies;
    }

    /**
     * Popular activities
     * @return json
     */
    public function actionPopActivity()
    {
        $activities = [];

        return $activities;
    }

    /**
     * Math the policy for user
     */
    public function actionMatchPolicy()
    {
        $matchPolicy = [];

        return $matchPolicy;
    }

    public function actionError()
    {
        throw new NotFoundHttpException('Hmm, something is wrong,The requested page does not exist.');
    }
}
