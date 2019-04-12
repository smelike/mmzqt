<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type_set".
 *
 * @property int $type_id 主键ID
 * @property string $name 类型名称
 * @property string $alias 别名，最新服务、政策头条、最新活动etc
 * @property int $status 状态
 * @property int $create_time 创建时间
 * @property int $update_time 更新时间
 */
class TypeSet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_set';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => '类型名称不能为空'],
            ['alias', 'required', 'message' => '类型别名不能为空'],
            [['name', 'alias'], 'string', 'max' => 32],
            [['status', 'create_time', 'update_time'], 'integer'],
            [['create_time', 'update_time'], 'default', 'value' => time()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => Yii::t('app', '主键ID'),
            'name' => Yii::t('app', '类型名称'),
            'alias' => Yii::t('app', '别名，最新服务、政策头条、最新活动etc'),
            'status' => Yii::t('app', '状态'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '更新时间'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TypeSetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeSetQuery(get_called_class());
    }
}
