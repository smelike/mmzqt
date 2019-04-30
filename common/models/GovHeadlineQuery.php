<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GovHeadline]].
 *
 * @see GovHeadline
 */
class GovHeadlineQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GovHeadline[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GovHeadline|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
