<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type_group".
 *
 * @property int $tg_id 主键ID
 * @property string $alias 分组英文别名
 * @property string $group_name 分组中文名
 */
class TypeGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'string', 'max' => 64],
            [['group_name'], 'string', 'max' => 128],
			[['status'], 'default', 'value' => 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tg_id' => Yii::t('app', '主键ID'),
            'alias' => Yii::t('app', '分组英文别名'),
            'group_name' => Yii::t('app', '分组中文名'),
            'status' => Yii::t('app', '状态'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TypeGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeGroupQuery(get_called_class());
    }
}
