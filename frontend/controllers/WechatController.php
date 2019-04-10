<?php
    namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;

    class WechatController extends Controller
    {

       

        public function actionIndex() {
            echo "Index";
        }

        public function actionFooAbc() {
            echo "foooAbc";
        }

        public function actionAppleGo() {
            
            //echo __LINE__;
            echo "AppleGo";
        }
    }