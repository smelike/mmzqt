<?php

namespace frontend\controllers;

//use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use common\models\Policy;
use yii\filters\VerbFilter;

class PolicyController extends Controller
{
	
	public $modelClass = 'common\models\Policy';
	
	/**
     * {@inheritdoc}
     */
	 /*
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'index' => ['get'],
					'view' => ['get']
				]
			]
		];
	}
	*/
	protected function verbs()
	{
		return [
			'index' => ['get'],
			'view' => ['get']
		];
	}
	
	/**
     * {@inhe
     */
	public function actionIndex()
	{
		return new ActiveDataProvider([
			'query' => Policy::find(),
			]);
	}
	
	public function actionView($id)
	{
		return new ActiveDataProvider([
			'query' => Policy::find($id),
		]);
	}
}