<?php

namespace backend\controllers;

use Yii;
use common\models\TypeSet;
use common\models\Policy;

class SortController extends BaseController
{
		protected $_type = null;
		public $modelClass = 'common\models\Sort';

		public function init()
		{
			parent::init();
			$this->_type =  Yii::$app->request->get('_t');
		}
		public function actions()
		{
			$actions = parent::actions();
			unset($actions['index']);
			unset($actions['create']);
			unset($actions['update']);
			unset($actions['view']);
			unset($actions['delete']);
			return $actions;
		}
		protected function selectTypeSet($type = false)
		{
			$columns = ['name', 'value' => 'type_id'];
			if ($type) {
				$condition = ['alias' => $type];
				//$condion = ['id' => 10];
			}
			$typeSet = TypeSet::queryTypeset($columns, ['alias' => 'policy_industry']);
			return $typeSet;
		}
    public function actionIndex()
    {
			$data = [
				[
					'label' => '分类', 
					'type'  => 'type_id',
					'option' => $this->selectTypeSet($this->_type)
				],
				[
					'label' => '时间',
					'type' => 'create_time', 
					'option' => [
						['name' => '按时间顺序', 'value' => 'ASC'],
						['name' => '按时间倒叙', 'value' => 'DESC']
					]
				],
				[
					'label' => '热度',
					'type' => 'page_view', 
					'option' => [
						['name' => '按热度顺序', 'value' => 'ASC'],
						['name' => '按热度倒叙', 'value' => 'DESC']
					]
				]
			];		
			return $data;
    }
	
	public function actionPolicy()
	{
		$data = [
			['label' => '支持方式',  'type' => 'support_way', 'option' => $this->selectTypeSet('support_way')],
			[	'label' => '归口部门', 'type' => 'charge_depart', 'option' => $this->selectTypeSet('charge_depart')],
			['label' => '状态', 'type' => 'status', 'option' => Policy::policyStatus($slice_offset = 2)]
		];

		return $data;
	}

	public function actionPolicyMore()
	{
		$data = [
			['label' => '扶持行业',  'type' => 'indusctry', 'option' => $this->selectTypeSet('policy_industry')],
			[	'label' => '企业规模', 'type' => 'scale', 'option' => $this->selectTypeSet('company_scale')],
			['label' => '设立年限', 'type' => 'age', 'option' => $this->selectTypeSet('company_age')]
		];
		
		return $data;
	}
}
