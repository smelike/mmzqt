<?php

namespace common\models;

use Yii;
use common\models\TypeSet;

/**
 * This is the model class for table "policy".
 *
 * @property int $policy_id 政策ID
 * @property int $type_id 政策类型
 * @property string $thumb 缩略图
 * @property string $title 政策标题
 * @property int $open_time 申报开始时间
 * @property int $end_time 申报结束时间
 * @property int $support_way 扶持方式
 * @property int $charge_depart 归口部门
 * @property int $industry 所属行业
 * @property int $scale 规模
 * @property string $age 成立年限
 * @property string $brief 摘要
 * @property string $requirement 申报条件
 * @property string $support_content 扶持内容
 * @property string $material 申报材料
 * @property string $original_info 原文
 * @property string $manual 操作指南
 * @property int $rank 级别
 * @property int $status 状态
 * @property int $is_recommend 是否推荐
 * @property int $create_time 创建时间
 * @property int $update_time 更新时间
 *
 * @property Quest[] $quests
 */
class Policy extends Base
{
    /**
     * {@inheritdoc}
     */
    CONST STATUS_ACTIVE = 0;
    CONST IS_RECOMMEND = 1;
    public static function tableName()
    {
        return 'policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'support_way', 'charge_depart', 'industry', 'age', 'scale', 'rank', 'status', 'is_recommend', 'create_time', 'update_time'], 'integer'],
            [['title', 'open_time', 'end_time'], 'required'],
            [['create_time', 'update_time'], 'default', 'value' => time()],
			[['status', 'is_recommend'], 'default', 'value' => 0],
            [['requirement', 'support_content', 'material', 'original_info', 'manual'], 'string'],
            ['title', 'string', 'max' => 128],
            ['thumb', 'image', 'extensions' => 'png, jpg, jpeg'],
            [['brief'], 'string', 'max' => 256],
            [['title'], 'unique', 'message' => '该标题存在'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'policy_id' => Yii::t('app', '政策ID'),
            'type_id' => Yii::t('app', '政策类型'),
            'thumb' => Yii::t('app', '缩略图'),
            'title' => Yii::t('app', '政策标题'),
            'open_time' => Yii::t('app', '申报开始时间'),
            'end_time' => Yii::t('app', '申报结束时间'),
            'support_way' => Yii::t('app', '扶持方式'),
            'charge_depart' => Yii::t('app', '归口部门'),
            'industry' => Yii::t('app', '所属行业'),
            'scale' => Yii::t('app', '规模'),
            'age' => Yii::t('app', '成立年限'),
            'brief' => Yii::t('app', '摘要'),
            'requirement' => Yii::t('app', '申报条件'),
            'support_content' => Yii::t('app', '扶持内容'),
            'material' => Yii::t('app', '申报材料'),
            'original_info' => Yii::t('app', '原文'),
            'manual' => Yii::t('app', '操作指南'),
            'rank' => Yii::t('app', '级别'),
            'status' => Yii::t('app', '状态'),
            'is_recommend' => Yii::t('app', '是否推荐'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '更新时间'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuests()
    {
        return $this->hasMany(Quest::className(), ['policy_id' => 'policy_id']);
    }

    /**
     * {@inheritdoc}
     * @return PolicyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PolicyQuery(get_called_class());
    }

    public static function  policyStatus($slice_offset = 0)
    {
        $statusText = [
            ['name' => '正常', 'value' => 0],
            ['name' => '已被删除', 'value' => 1],
            ['name' => '申报预告', 'value' => 2],
            ['name' => '申报中', 'value' => 3],
            ['name' => '申报结束', 'value' => 4]
        ];
        return $slice_offset ? array_slice($statusText, $slice_offset) : $statusText;
    }

    public static function getStatusText($status_key)
    {
       $statusText = self::policyStatus();

        return array_key_exists($status_key, $statusText) ? $statusText[$status_key] : 'unknown';
    }

    public static function recommendedPolicy()
    {
        $where = ['status' => self::STATUS_ACTIVE, 'is_recommend' => self::IS_RECOMMEND];
        return self::find()->where($where);
    }
    public static function searchPolicyByKeyWord($keyword)
    {
        $where ='title LIKE :query';
        return self::find()->where($where)->addParams($keyword);
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            if ($insert) {
                $this->create_time = time();
                $this->update_time = time();
                $this->open_time = strtotime($this->open_time);
                $this->end_time = strtotime($this->end_time);
            } else {
                $this->update_time = time();
            }
            $this->original_info = $this->imageDomain($this->original_info);
            $this->manual = $this->imageDomain($this->manual);
            return true;
        } else {
            return false;
        }
    }
    public function getDate()
    {
        return [date('Y-m-d', $this->open_time), date('Y-m-d', $this->end_time)];
    }
    public function getOpenTime()
    {
        return date('Y-m-d', $this->open_time);
    }
    public function getEndTime()
    {
        return date('Y-m-d', $this->end_time);
    }
    public function getScaleWay()
    {
        return $this->hasOne(TypeSet::className(), ['type_id' => 'scale']);
    }
    public function getSupportWay() {
        return $this->hasOne(TypeSet::className(), ['type_id' => 'support_way']);
    }
    public function getIndustryWay() {
        return $this->hasOne(TypeSet::className(), ['type_id' => 'industry']);
    }
    public function getChargeDepart() {
        return $this->hasOne(TypeSet::className(), ['type_id' => 'charge_depart']);
    }
    public function getNoticeMsg()
    {
        $less = $this->end_time - strtotime(date('Y-m-d', time()));
        $less = $less/3600/24;
        $msg = "离申报结束{$less}天";
        return $msg;
    }
    public function getTag()
    {
        return ['减税', '品牌', '转型'];
    }
    /**
     * {@inheritdoc}
     * @return the list of fields 
     */
    public function fields()
    {   
		switch ($this->scenario) {

			case 'update':
				return [
                    'policy_id', 'type_id', 'title', 'thumb', 'age', 'rank',
                    'brief' => function($model) {
                        return $model->imageDomain($this->brief, true);
                    },
                    'requirement' => function($model) {
                        return $model->imageDomain($this->requirement, true);
                    },
                    'support_content' =>  function($model) {
                        return $model->imageDomain($this->support_content, true);
                    },
                    'material' => function($model) {
                        return $model->imageDomain($this->material, true);
                    }, 
                    'original_info' => function($model) {
                        return $model->imageDomain($this->original_info, true);
                    },
                    'manual' => function($model) {
                        return $model->imageDomain($this->manual, true);
                    },
                    'full_thumb' => function () {
                        return Yii::$app->params['imageDomain'] . '/' . $this->thumb;
                    },
					'open_time' => function() {
						return date('Y-m-d', $this->open_time);
					},
					'end_time' => function() {
						return date('Y-m-d', $this->end_time);
					},
                    'support_way',
                    'support_way_name' => function ($model) {
						return $model->supportWay->name;
					},
                    'charge_depart',
                    'charge_depart_name' => function ($model) {
                        return $model->chargeDepart->name;
                    },
                    'industry',
                    'industry_name' => function ($model) {
                        return $model->industryWay->name;
                    },
                    'scale',
                    'scale_name' => function ($model) {
                       return $model->scaleWay->name;
                    },
                    'status',
					'is_recommend',
					'date' => function() {
                        return $this->Date;
					}
				];
			
			default: 
				return [
					'policy_id', 'title', 'thumb', 'type_id',
                    'full_thumb' => function () {
                        return Yii::$app->params['imageDomain'] . '/' . $this->thumb;
                    },
					'support_way' => function () {
						$typeSet = TypeSet::findOne($this->support_way);
						return $typeSet ? $typeSet->name : '-';
					},
					'open_time' => function() {
						return $this->OpenTime;
					},
					'end_time' => function() {
						return $this->EndTime;
                    },
                    'end_time_msg' => function() {
                        return $this->NoticeMsg;
                    },
                    'tags' => function () {
                        return  $this->Tag;
                    },
                    'is_recommend'
				];
		}
    }
}
