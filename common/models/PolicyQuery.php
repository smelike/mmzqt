<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Policy]].
 *
 * @see Policy
 */
class PolicyQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return Policy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Policy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
