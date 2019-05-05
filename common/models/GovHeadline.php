<?php

namespace common\models;

use Yii;
use common\models\TypeSet;

/**
 * This is the model class for table "gov_headline".
 *
 * @property int $top_id 主键ID
 * @property int $type_id 服务类型ID
 * @property string $title 标题
 * @property string $detail 头条详细内容
 * @property int $favor_num 收藏数
 * @property int $page_view 浏览数
 * @property int $create_time 创建时间
 * @property int $update_time 更新时间
 */
class GovHeadline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gov_headline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'favor_num', 'page_view', 'create_time', 'update_time'], 'integer'],
            [['detail'], 'string'],
            [['title'], 'string', 'max' => 128],
            [['thumb'], 'string', 'max' => 128],
            [['create_time', 'update_time'], 'default', 'value' => time()],
            [['favor_num', 'page_view'], 'default', 'value' => 0],
            ['title', 'required', 'message' => '标题不能为空'],
            ['title', 'unique', 'message' => '该标题存在'],
            ['detail', 'required', 'message' => '具体内容不能为空'],
            ['thumb', 'required', 'message' => '缩略图不能为空'],
            ['type_id', 'required', 'message' => '类型不能为空'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'top_id' => Yii::t('app', '主键ID'),
            'type_id' => Yii::t('app', '类型ID'),
            'title' => Yii::t('app', '标题'),
            'thumb' => Yii::t('app', '缩略图'),
            'detail' => Yii::t('app', '具体内容'),
            'favor_num' => Yii::t('app', '收藏数'),
            'page_view' => Yii::t('app', '浏览数'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '更新时间'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return GovHeadlineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GovHeadlineQuery(get_called_class());
    }

    public function fields()
    {
        switch ($this->scenario) {
            case 'update':
                return [
                    'top_id', 
                    'title', 
                    'type_id', 
                    'thumb', 
                    'detail',                     'favor_num' => function () {
                        return $this->favor_num ? $this->favor_num : 0;
                    },
                    'page_view' => function () {
                        return $this->page_view ? $this->page_view : 0;
                    }
                ];
            default: 
                return [
                    'top_id',
                    'title',
                    'type_id',
                    'type_name' => function () {
                        $typeSet = TypeSet::findOne($this->type_id);
                        return $typeSet ? $typeSet->name : '-';
                    },
                    'thumb' => function() {
                        return Yii::$app->params['imageDomain'] . '/' . $this->thumb;
                    },
                    'create_time' => function() {
                        return date('Y-m-d', $this->create_time);
                    }
                ];
        }
    }
}
