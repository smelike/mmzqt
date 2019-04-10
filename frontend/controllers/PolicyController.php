<?php

namespace frontend\controllers;

//use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use common\models\Policy;
use yii\filters\VerbFilter;

class PolicyController extends Controller
{
	
	// start the cross-site-?-?-attack-validate
	public $enableCsrfValidation = true;
	
	
	/**
     * {@inheritdoc}
     */
	protected function verbs()
	{
		return [
			'index' => ['get'],
			'view' => ['get'],
			'recommend' => ['get']
		];
	}
	
	/**
     * query all the policy
     */
	public function actionIndex()
	{	
		return new ActiveDataProvider([
			'query' => Policy::find()
		]);
	}
	
	/**
     * query a policy by the primary key $id.
	 * primary key's field name is policy_id.
     */
	public function actionView($id)
	{
		return new ActiveDataProvider([
			'query' => Policy::find()->where(['policy_id' => $id]),
		]);
		/*
		$policy = Policy::findOne($id);
		return $this->serializeData($policy);
		*/
	}
	
	/**
     * query  the policy is recommand by the condition "is_recommend equals 1".
	 * is_recommend equals 1 
     */
	public function actionRecommend()
	{
		/*
		$recommend_policies = Policy::findAll(['is_recommend' => 1]);
		return $this->serializeData($recommend_policies);
		*/
		
		/*
		return new ActiveDataProvider([
			'query' => Policy::find()->where(['is_recommend' => 1])->orderBy('policy_id desc')->limit(0,3),
		]);*/
		
		$recommended_policies = Policy::find()->where(['is_recommend' => 1])->orderBy('policy_id desc')->limit(4)->all();
		return $this->serializeData($recommended_policies);
	}
	
}