<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TypeSet]].
 *
 * @see TypeSet
 */
class TypeSetQuery extends \yii\db\ActiveQuery
{
	
	public $name;
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
	
    /**
     * {@inheritdoc}
     * @return TypeSet[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TypeSet|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
