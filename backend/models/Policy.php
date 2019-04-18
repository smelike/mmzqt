<?php

namespace app\models;

use Yii;

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
class Policy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['type_id', 'open_time', 'end_time', 'support_id', 'charge_depart', 'industry', 'scale', 'rank', 'status', 'is_recommend', 'create_time', 'update_time'], 'integer'],
            [['title', 'open_time', 'end_time'], 'required'],
            [['requirement', 'support_content', 'material', 'original_info', 'manual'], 'string'],
            [['thumb', 'title'], 'string', 'max' => 128],
            [['age'], 'string', 'max' => 4],
            [['brief'], 'string', 'max' => 256],
            [['title'], 'unique'],
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
}
