<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;

    class FileController extends Controller 
    {
        
        /**
         * actionIndex
         *
         * @return void
         */
        public function actionIndex()
        {
            echo __CLASS__ . "=" . __FUNCTION__;
        }

        public function actionGoHome()
        {
            echo time();
        }

    }
