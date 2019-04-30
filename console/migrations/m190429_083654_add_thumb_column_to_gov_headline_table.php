<?php

use yii\db\Migration;

/**
 * Handles adding thumb to table `{{%gov_headline}}`.
 */
class m190429_083654_add_thumb_column_to_gov_headline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_headline";
		$this->addColumn($tableName, 'thumb', $this->string(128));
		$this->addCommentOnColumn($tableName, 'thumb', '缩略图');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropColumn('gov_headline', 'thumb');
    }
}
