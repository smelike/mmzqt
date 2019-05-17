<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $act_id 主键ID
 * @property int $type_id 活动类型ID
 * @property string $title 活动标题
 * @property int $act_start_time 活动开始时间
 * @property int $act_end_time 活动结束时间
 * @property int $sign_start_time 报名开始时间
 * @property int $sign_end_time 报名截止时间
 * @property string $act_city 活动区域
 * @property string $act_addr 活动地址
 * @property string $act_organizer 活动举办方
 * @property string $act_info 活动详情
 * @property string $tag 活动标签
 * @property int $page_view 浏览次数
 * @property int $favor_num 收藏量
 * @property int $create_time 创建时间
 * @property int $update_time 更新时间
 * @property string $thumb
 * @property int $status
 */
class Activity extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id',  'page_view', 'favor_num', 'create_time', 'update_time', 'status'], 'integer'],
            [['act_start_time', 'act_end_time', 'sign_start_time', 'sign_end_time'], 'date', 'format' => 'yyyy-mm-d'],
            [['title', 'type_id', 'act_start_time', 'act_end_time', 'sign_start_time', 'sign_end_time', 'act_city', 'act_organizer', 'act_info'], 'required'],
            [['act_info'], 'string'],
            [['create_time', 'update_time'], 'default', 'value' => time()],
            [['title', 'tag', 'thumb'], 'string', 'max' => 128],
            [['act_city', 'act_organizer'], 'string', 'max' => 32],
            [['act_addr'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'act_id' => Yii::t('app', '活动ID'),
            'type_id' => Yii::t('app', '活动类型'),
            'title' => Yii::t('app', '活动标题'),
            'act_start_time' => Yii::t('app', '活动开始日期'),
            'act_end_time' => Yii::t('app', '活动结束日期'),
            'sign_start_time' => Yii::t('app', '报名开放日期'),
            'sign_end_time' => Yii::t('app', '报名结束日期'),
            'act_city' => Yii::t('app', '活动举办城市'),
            'act_addr' => Yii::t('app', '活动具体地址'),
            'act_organizer' => Yii::t('app', '活动举办者'),
            'act_info' => Yii::t('app', '活动具体内容'),
            'tag' => Yii::t('app', '标签'),
            'page_view' => Yii::t('app', 'Page View'),
            'favor_num' => Yii::t('app', 'Favor Num'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'thumb' => Yii::t('app', '缩略图'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->act_start_time = strtotime($this->act_start_time);
                $this->act_end_time = strtotime($this->act_end_time);
                $this->sign_start_time = strtotime($this->sign_start_time);
                $this->sign_end_time = strtotime($this->sign_end_time);
                $this->create_time = time();
                $this->update_time = time();
            } else {
                $this->act_start_time = strtotime($this->act_start_time);
                $this->act_end_time = strtotime($this->act_end_time);
                $this->sign_start_time = strtotime($this->sign_start_time);
                $this->sign_end_time = strtotime($this->sign_end_time);
                $this->update_time = time();
            }
            $this->act_info = $this->imageDomain($this->act_info);
            return true;
        } else {
            return false;
        }
    }
    
    public function fields()
    {
        switch ($this->scenario) {
            case 'view':
                return [
                    'act_id', 'type_id', 'title', 'thumb', 'act_city', 'act_addr', 'act_organizer', 'act_start_time' => function() {
                       return $this->ActStartTime;
                    }, 'act_end_time' => function() {
                        return $this->ActEndTime;
                    }, 'sign_start_time' => function() {
                        return $this->SignStartTime;
                    }, 'sign_end_time' => function() {
                        return $this->SignEndTime;
                    }, 
                    'act_info' => function($model) {
                        return $this->act_info = $model->imageDomain($this->act_info, true);
                    }
                ];
            default:
                return ['act_id', 'title', 'thumb', 'act_organizer'];
        }
    }
    public function getActStartTime()
    {
        return date('Y-m-d', $this->act_start_time);
    }
    public function getActEndTime()
    {
        return date('Y-m-d', $this->act_end_time);
    }
    public function getSignStartTime()
    {
        return date('Y-m-d', $this->sign_start_time);
    }
    public function getSignEndTime()
    {
        return date('Y-m-d', $this->sign_end_time);
    }
    /**
     * {@inheritdoc}
     * @return ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityQuery(get_called_class());
    }
}
